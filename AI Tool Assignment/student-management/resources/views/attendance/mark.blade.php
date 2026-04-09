@extends('layout.app')

@section('header', 'Mark Attendance')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200 flex flex-col md:flex-row justify-between items-center gap-4">
        
        <form action="{{ route('attendance.mark') }}" method="GET" class="flex w-full md:w-auto items-center gap-3">
            <label class="font-medium text-gray-700">Select Date:</label>
            <input type="date" name="date" value="{{ $date }}" class="px-4 py-2 border border-gray-300 rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="this.form.submit()">
        </form>

        <div>
            <span class="text-sm px-3 py-1 bg-blue-100 text-blue-800 font-medium rounded-full">Date: {{ \Carbon\Carbon::parse($date)->format('F d, Y') }}</span>
        </div>
    </div>

    <form id="attendanceForm" action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <input type="hidden" name="date" value="{{ $date }}" id="attendanceDate">
        
        <div class="overflow-x-auto p-4">
            <table class="min-w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold tracking-wider">
                        <th class="py-3 px-6">ID</th>
                        <th class="py-3 px-6">Name</th>
                        <th class="py-3 px-6">Course</th>
                        <th class="py-3 px-6 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($students as $student)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-6 text-gray-600">{{ $student->id }}</td>
                        <td class="py-3 px-6 font-medium text-gray-800">{{ $student->name }}</td>
                        <td class="py-3 px-6 text-gray-600">{{ $student->course }}</td>
                        
                        @php
                            $status = isset($attendances[$student->id]) ? $attendances[$student->id]->status : null;
                        @endphp
                        
                        <td class="py-3 px-6 text-center">
                            <div class="flex justify-center gap-4">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="attendance[{{ $student->id }}]" value="Present" class="text-blue-600 form-radio h-5 w-5" {{ $status == 'Present' ? 'checked' : '' }} required>
                                    <span class="ml-2 text-gray-700">Present</span>
                                </label>
                                
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="attendance[{{ $student->id }}]" value="Absent" class="text-red-600 form-radio h-5 w-5" {{ $status == 'Absent' ? 'checked' : '' }} required>
                                    <span class="ml-2 text-gray-700">Absent</span>
                                </label>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-6 px-6 text-center text-gray-500">No students available for attendance.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-gray-200 flex justify-end">
            <button type="submit" id="saveBtn" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-8 rounded shadow transition flex items-center gap-2">
                <i class="fas fa-save"></i> Save Attendance
            </button>
        </div>
    </form>
</div>
@endsection
