{{--  =============================================
       Task #04: Edit User Form
     ============================================= --}}

@extends('layouts.app')

@section('header', 'Edit User')
@section('description', 'Update user information')

@section('content')

    <div class="bg-white p-6 rounded-lg shadow-md max-w-lg">

        <form action="/users/update/{{ $user->id }}" method="POST">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Name</label>
                <input type="text" name="name" value="{{ $user->name }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                       placeholder="Enter name" required>
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ $user->email }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                       placeholder="Enter email" required>
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                       placeholder="Enter new password">
                <p class="text-gray-400 text-sm mt-1">Leave password empty if you do not want to change it.</p>
            </div>

            {{-- Buttons --}}
            <div class="flex space-x-3">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Update User
                </button>
                <a href="/users"
                   class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                    Cancel
                </a>
            </div>

        </form>

    </div>

@endsection
