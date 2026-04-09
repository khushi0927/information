@extends('layout.app')

@section('header', 'Manage Students')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
    <div class="p-6 border-b border-gray-200 flex flex-col md:flex-row md:items-center justify-between gap-4">
        
        <!-- Search form -->
        <form action="{{ route('students.index') }}" method="GET" class="flex w-full md:w-1/3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search students..." class="px-4 py-2 border border-gray-300 rounded-l cursor-text focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-r hover:bg-gray-700 transition">
                <i class="fas fa-search"></i>
            </button>
        </form>

        <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition whitespace-nowrap">
            <i class="fas fa-plus"></i> Add Student
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-500 uppercase text-xs font-semibold tracking-wider">
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Name</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Phone</th>
                    <th class="py-3 px-6">Course</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-gray-700">
                @forelse($students as $student)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-6">{{ $student->id }}</td>
                    <td class="py-3 px-6 font-medium">{{ $student->name }}</td>
                    <td class="py-3 px-6">{{ $student->email }}</td>
                    <td class="py-3 px-6">{{ $student->phone }}</td>
                    <td class="py-3 px-6">{{ $student->course }}</td>
                    <td class="py-3 px-6 text-center flex justify-center gap-2">
                        <a href="{{ route('students.edit', $student) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="delete-form inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="text-red-500 hover:text-red-700 delete-btn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-6 px-6 text-center text-gray-500">No students found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="p-6 border-t border-gray-200">
        {{ $students->appends(['search' => request('search')])->links('pagination::tailwind') }}
    </div>
</div>
@endsection
