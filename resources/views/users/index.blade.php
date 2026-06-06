{{--  =============================================
       Task #04: Users Management Page
     ============================================= --}}

@extends('layouts.app')

@section('header', 'Users Management')
@section('description', 'View, add, edit, update, and delete users')

@section('content')

    <div class="bg-white p-6 rounded-lg shadow-md">

        {{-- Add New User Button --}}
        <a href="/users/create"
           class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mb-4">
            + Add New User
        </a>

        {{-- Users Table --}}
        @if(count($users) > 0)
            <table class="w-full border-collapse border border-gray-300 mt-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <div class="flex space-x-2">
                                    {{-- Edit Button --}}
                                    <a href="/users/edit/{{ $user->id }}"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                        Edit
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="/users/delete/{{ $user->id }}" method="POST">
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
            <p class="text-gray-500 mt-4">No users added yet.</p>
        @endif

    </div>

@endsection
