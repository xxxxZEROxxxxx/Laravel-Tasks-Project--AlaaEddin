<!DOCTYPE html>

<!--  =============================================
       Task #01: Course Registration System
    ============================================= -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">

        <h1 class="text-2xl font-bold text-center mb-6 text-blue-600">Course Registration</h1>

        {{-- Show error message if there is one --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="/register-course" method="POST">
            @csrf

            {{-- Student Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Student Name</label>
                <input type="text" name="student_name" value="{{ old('student_name') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                       placeholder="Enter your name">
            </div>

            {{-- Student ID --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Student ID</label>
                <input type="text" name="student_id" value="{{ old('student_id') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                       placeholder="Enter your ID">
            </div>

            {{-- Course Dropdown --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Course</label>
                <select name="course"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                    <option value="">-- Select Course --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course }}" {{ old('course') == $course ? 'selected' : '' }}>
                            {{ $course }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Level Dropdown --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Level</label>
                <select name="level"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                    <option value="">-- Select Level --</option>
                    @foreach($levels as $level)
                        <option value="{{ $level }}" {{ old('level') == $level ? 'selected' : '' }}>
                            {{ $level }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Submit Button --}}
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Register
            </button>
        </form>

    </div>

</body>
</html>
