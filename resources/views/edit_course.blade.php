{{--  =============================================
       Task #05: Edit Course Form (with Validation)
     ============================================= --}}

@extends('layouts.app')

@section('header', 'Edit Course')
@section('description', 'Update course information')

@section('content')

    <div class="bg-white p-6 rounded-lg shadow-md max-w-lg">

        <form action="/courses/update/{{ $course->id }}" method="POST">
            @csrf

            {{-- Course Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Course Name</label>
                <input type="text" name="course_name" value="{{ old('course_name', $course->course_name) }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('course_name') border-red-500 bg-red-50 @else border-gray-300 @enderror"
                       placeholder="Enter course name" required>
                @error('course_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Teacher Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Teacher Name</label>
                <input type="text" name="teacher_name" value="{{ old('teacher_name', $course->teacher_name) }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('teacher_name') border-red-500 bg-red-50 @else border-gray-300 @enderror"
                       placeholder="Enter teacher name" required>
                @error('teacher_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Course Hours --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Course Hours</label>
                <input type="number" name="course_hours" value="{{ old('course_hours', $course->course_hours) }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('course_hours') border-red-500 bg-red-50 @else border-gray-300 @enderror"
                       placeholder="Enter course hours" required>
                @error('course_hours')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex space-x-3">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Update Course
                </button>
                <a href="/courses"
                   class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                    Cancel
                </a>
            </div>

        </form>

    </div>

@endsection
