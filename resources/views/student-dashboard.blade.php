<!DOCTYPE html>

<!--  =============================================
       Task #01: Student Dashboard
============================================= -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">

        <h1 class="text-2xl font-bold text-center mb-6 text-green-600">Student Dashboard</h1>

        {{-- Welcome Message --}}
        <p class="text-lg text-center mb-4">Welcome, <span class="font-bold">{{ $student_name }}</span>!</p>

        {{-- Student Info --}}
        <div class="space-y-3 mb-6">
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600 font-semibold">Student ID:</span>
                <span>{{ $student_id }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600 font-semibold">Course:</span>
                <span>{{ $course }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600 font-semibold">Level:</span>
                <span>{{ $level }}</span>
            </div>
        </div>

        {{-- Cancel Registration --}}
        <form action="/cancel-registration" method="POST">
            @csrf
            <button type="submit"
                    class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 transition">
                Cancel Registration
            </button>
        </form>

    </div>

</body>
</html>
