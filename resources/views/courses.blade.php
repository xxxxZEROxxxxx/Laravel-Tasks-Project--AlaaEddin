{{--  =============================================
       Task #02: Courses Management Page
     ============================================= --}}

@extends('layouts.app')

@section('header', 'Courses Management')
@section('description', 'Add and manage courses in the system')

@section('content')

    <div class="bg-white p-6 rounded-lg shadow-md">

        <p class="text-gray-600 mb-4">Use this page to manage courses in the system.</p>

        <a href="/courses/create"
           class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Add New Course
        </a>

    </div>

@endsection
