{{--  =============================================
       Task #02 & #03: Courses Management Page
     ============================================= --}}

@extends('layouts.app')

@section('header', 'Courses Management')
@section('description', 'View, edit, update, and delete courses')

@section('content')

    <div class="bg-white p-6 rounded-lg shadow-md">

        {{-- Add New Course Button --}}
        <a href="/courses/create"
           class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mb-4">
            + Add New Course
        </a>

        {{-- Courses Table --}}
        @if(count($courses) > 0)
            <table class="w-full border-collapse border border-gray-300 mt-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Course Name</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Teacher Name</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Course Hours</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $course->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $course->course_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $course->teacher_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $course->course_hours }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <div class="flex space-x-2">
                                    {{-- Edit Button --}}
                                    <a href="/courses/edit/{{ $course->id }}"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                        Edit
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="/courses/delete/{{ $course->id }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500 mt-4">No courses added yet.</p>
        @endif

    </div>

@endsection
