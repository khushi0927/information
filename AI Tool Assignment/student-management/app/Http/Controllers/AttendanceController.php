<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function markForm(Request $request)
    {
        $date = $request->date ?? Carbon::today()->format('Y-m-d');
        $students = Student::orderBy('name')->get();
        
        $attendances = Attendance::where('date', $date)->get()->keyBy('student_id');

        return view('attendance.mark', compact('students', 'date', 'attendances'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'attendance' => 'required|array',
            'attendance.*' => 'in:Present,Absent',
        ]);

        $date = $request->date;

        foreach ($request->attendance as $student_id => $status) {
            Attendance::updateOrCreate(
                ['student_id' => $student_id, 'date' => $date],
                ['status' => $status]
            );
        }

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Attendance saved successfully.']);
        }

        return redirect()->route('attendance.mark', ['date' => $date])->with('success', 'Attendance recorded successfully.');
    }

    public function report(Request $request)
    {
        $query = Attendance::with('student')->latest('date');

        if ($request->has('date') && $request->date != '') {
            $query->where('date', $request->date);
        }

        if ($request->has('student_id') && $request->student_id != '') {
            $query->where('student_id', $request->student_id);
        }

        $records = $query->paginate(20);
        $students = Student::orderBy('name')->get();

        return view('attendance.report', compact('records', 'students'));
    }
}
