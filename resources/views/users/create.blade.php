{{--  =============================================
       Task #04: Add New User Form
     ============================================= --}}

@extends('layouts.app')

@section('header', 'Add New User')
@section('description', 'Add a new user to the system')

@section('content')

    <div class="bg-white p-6 rounded-lg shadow-md max-w-lg">

        <form action="/users/store" method="POST">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Name</label>
                <input type="text" name="name"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                       placeholder="Enter name" required>
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input type="email" name="email"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                       placeholder="Enter email" required>
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                       placeholder="Enter password" required>
            </div>

            {{-- Buttons --}}
            <div class="flex space-x-3">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Save User
                </button>
                <a href="/users"
                   class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                    Cancel
                </a>
            </div>

        </form>

    </div>

@endsection
