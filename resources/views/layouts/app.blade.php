<!DOCTYPE html>

<!--  =============================================
       Task #02: Main Layout File
     ============================================= -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Navbar --}}
    <nav class="bg-blue-600 text-white p-4 shadow">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold">Course System</a>
            <div class="space-x-4">
                <a href="/" class="hover:underline">Dashboard</a>
                <a href="/courses" class="hover:underline">Courses</a>
                <a href="/users" class="hover:underline">Users</a>
            </div>
        </div>
    </nav>

    <div class="flex flex-1">

        {{-- Sidebar --}}
        <aside class="w-56 bg-white shadow-md p-4 hidden md:block">
            <h3 class="text-gray-500 uppercase text-sm font-bold mb-4">Menu</h3>
            <ul class="space-y-2">
                <li>
                    <a href="/courses" class="block text-gray-700 hover:text-blue-600 hover:bg-gray-100 rounded px-3 py-2">
                        Courses
                    </a>
                </li>
                <li>
                    <a href="/users" class="block text-gray-700 hover:text-blue-600 hover:bg-gray-100 rounded px-3 py-2">
                        Users
                    </a>
                </li>
            </ul>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-6">

            {{-- Header --}}
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">@yield('header', 'Welcome')</h1>
                <p class="text-gray-500 mt-1">@yield('description', 'Manage your course system')</p>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error Message --}}
            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Page Content --}}
            @yield('content')

        </main>
    </div>

    {{-- Footer --}}
    <footer class="bg-white border-t p-4 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} Course System - Laravel Task #02
    </footer>

</body>
</html>
