<?php

// =============================================
// Task #04: User Management Controller
// =============================================

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users.index', compact('users'));
    }

    // Show add user form
    public function create()
    {
        return view('users.create');
    }

    // Save new user to database
    public function store()
    {
        $name = request('name');
        $email = request('email');
        $password = request('password');

        // Simple manual validation
        if (empty($name)) {
            return redirect()->back()->with('error', 'Name is required');
        }
        if (empty($email)) {
            return redirect()->back()->with('error', 'Email is required');
        }
        if (empty($password)) {
            return redirect()->back()->with('error', 'Password is required');
        }

        // Insert the user into the database
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/users')->with('success', 'User added successfully!');
    }

    // Show edit user form
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        // If user not found, redirect with error
        if (!$user) {
            return redirect('/users')->with('error', 'User not found');
        }

        return view('users.edit', compact('user'));
    }

    // Update user in database
    public function update($id)
    {
        $name = request('name');
        $email = request('email');
        $password = request('password');

        // Simple manual validation
        if (empty($name)) {
            return redirect()->back()->with('error', 'Name is required');
        }
        if (empty($email)) {
            return redirect()->back()->with('error', 'Email is required');
        }

        // Prepare update data
        $data = [
            'name' => $name,
            'email' => $email,
            'updated_at' => now(),
        ];

        // Only update password if it is not empty
        if (!empty($password)) {
            $data['password'] = bcrypt($password);
        }

        // Update the user in the database
        DB::table('users')->where('id', $id)->update($data);

        return redirect('/users')->with('success', 'User updated successfully!');
    }

    // Delete user from database
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect('/users')->with('success', 'User deleted successfully!');
    }
}
