{{--  =============================================
       Task #02: Add New Course Form
     ============================================= --}}

@extends('layouts.app')

@section('header', 'Add New Course')
@section('description', 'Add a new course to the database')

@section('content')

    <div class="bg-white p-6 rounded-lg shadow-md max-w-lg">

        <form action="/courses/store" method="POST">
            @csrf

            {{-- Course Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Course Name</label>
                <input type="text" name="course_name"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                       placeholder="Enter course name" required>
            </div>

            {{-- Teacher Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Teacher Name</label>
                <input type="text" name="teacher_name"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                       placeholder="Enter teacher name" required>
            </div>

            {{-- Course Hours --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Course Hours</label>
                <input type="number" name="course_hours"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                       placeholder="Enter course hours" required>
            </div>

            {{-- Buttons --}}
            <div class="flex space-x-3">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Save Course
                </button>
                <a href="/courses"
                   class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                    Cancel
                </a>
            </div>

        </form>

    </div>

@endsection
