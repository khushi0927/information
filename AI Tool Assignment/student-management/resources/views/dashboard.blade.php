@extends('layout.app')

@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 flex items-center justify-between">
        <div>
            <h4 class="text-gray-500 text-sm uppercase tracking-wide">Total Students</h4>
            <h2 class="text-3xl font-bold text-gray-800">{{ \App\Models\Student::count() }}</h2>
        </div>
        <div class="text-blue-500 text-4xl">
            <i class="fas fa-users"></i>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 flex items-center justify-between">
        <div>
            <h4 class="text-gray-500 text-sm uppercase tracking-wide">Present Today</h4>
            <h2 class="text-3xl font-bold text-gray-800">
                {{ \App\Models\Attendance::where('date', \Carbon\Carbon::today())->where('status', 'Present')->count() }}
            </h2>
        </div>
        <div class="text-green-500 text-4xl">
            <i class="fas fa-user-check"></i>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 flex items-center justify-between">
        <div>
            <h4 class="text-gray-500 text-sm uppercase tracking-wide">Absent Today</h4>
            <h2 class="text-3xl font-bold text-gray-800">
                {{ \App\Models\Attendance::where('date', \Carbon\Carbon::today())->where('status', 'Absent')->count() }}
            </h2>
        </div>
        <div class="text-red-500 text-4xl">
            <i class="fas fa-user-times"></i>
        </div>
    </div>
</div>

<div class="mt-8 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-4">Welcome to Student Management System</h3>
    <p class="text-gray-600">Use the sidebar to navigate through adding students, marking daily attendance, and viewing reports. All core operations use efficient AJAX submissions and Laravel best practices.</p>
</div>
@endsection
