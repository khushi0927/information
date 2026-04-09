@extends('layout.app')

@section('header', 'Attendance Report')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="p-6 border-b border-gray-200">
        <h4 class="text-lg font-bold text-gray-800 mb-4">Filter Reports</h4>
        <form action="{{ route('attendance.report') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-end">
            
            <div class="w-full md:w-1/3">
                <label class="block text-gray-700 font-medium mb-2" for="date">Date Filter</label>
                <input type="date" name="date" id="date" value="{{ request('date') }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 cursor-pointer">
            </div>

            <div class="w-full md:w-1/3">
                <label class="block text-gray-700 font-medium mb-2" for="student_id">Student Filter</label>
                <select name="student_id" id="student_id" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
                    <option value="">All Students</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ request('student_id') == $student->id ? 'selected' : '' }}>
                            {{ $student->name }} ({{ $student->course }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded shadow hover:bg-gray-700 transition h-10 flex items-center gap-2">
                    <i class="fas fa-filter"></i> Apply
                </button>
                <a href="{{ route('attendance.report') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded hover:bg-gray-300 transition h-10 flex items-center justify-center">
                    Reset
                </a>
            </div>
        </form>
    </div>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold tracking-wider">
                    <th class="py-3 px-6">Date</th>
                    <th class="py-3 px-6">Student ID</th>
                    <th class="py-3 px-6">Student Name</th>
                    <th class="py-3 px-6">Course</th>
                    <th class="py-3 px-6 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-gray-700">
                @forelse($records as $record)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-6 font-medium">{{ \Carbon\Carbon::parse($record->date)->format('M d, Y') }}</td>
                    <td class="py-3 px-6">{{ $record->student_id }}</td>
                    <td class="py-3 px-6">{{ $record->student->name }}</td>
                    <td class="py-3 px-6">{{ $record->student->course }}</td>
                    <td class="py-3 px-6 text-center">
                        @if($record->status == 'Present')
                            <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full w-20">Present</span>
                        @else
                            <span class="inline-block px-3 py-1 bg-red-100 text-red-800 text-xs font-bold rounded-full w-20">Absent</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-6 px-6 text-center text-gray-500">No attendance records found for the given filter.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="p-6 border-t border-gray-200">
        {{ $records->appends(['date' => request('date'), 'student_id' => request('student_id')])->links('pagination::tailwind') }}
    </div>
</div>
@endsection
