@extends('layout.app')

@section('header', 'Edit Student')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200 p-8">
    
    <div class="mb-6 flex justify-between items-center">
        <h3 class="text-xl font-bold text-gray-800">Edit Student Details</h3>
        <a href="{{ route('students.index') }}" class="text-gray-500 hover:text-gray-700 text-sm font-medium"><i class="fas fa-arrow-left"></i> Back to List</a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 text-red-500 p-4 border border-red-200 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student) }}" method="POST" id="studentEditForm">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Full Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            
            <div>
                <label class="block text-gray-700 font-medium mb-2">Email Address <span class="text-red-500">*</span></label>
                <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            
            <div>
                <label class="block text-gray-700 font-medium mb-2">Phone Number <span class="text-red-500">*</span></label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $student->phone) }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Course <span class="text-red-500">*</span></label>
                <input type="text" name="course" id="course" value="{{ old('course', $student->course) }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
            <a href="{{ route('students.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition shadow">Update Student</button>
        </div>
    </form>
</div>
@endsection
