<?php

// =============================================
// Task #01: Course Registration System
// =============================================
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Default home route
Route::get('/', function () {
    return view('welcome');
});



// Show the registration form
Route::get('/register-course', function () {

    // If student already registered, go to dashboard
    if (session()->has('student_name')) {
        return redirect('/student-dashboard');
    }

    // Available courses and levels
    $courses = ["Embedded Systems", "Web Development", "Database Systems", "Networks"];
    $levels = ["Third Year", "Fourth Year", "Fifth Year"];

    return view('course-register', compact('courses', 'levels'));
});

// Handle form submission
Route::post('/register-course', function () {

    $student_name = request('student_name');
    $student_id = request('student_id');
    $course = request('course');
    $level = request('level');

    // Manual validation
    if (empty($student_name)) {
        return redirect()->back()->with('error', 'Student name is required')->withInput();
    }
    if (empty($student_id)) {
        return redirect()->back()->with('error', 'Student ID is required')->withInput();
    }
    if (empty($course)) {
        return redirect()->back()->with('error', 'Course is required')->withInput();
    }
    if (empty($level)) {
        return redirect()->back()->with('error', 'Level is required')->withInput();
    }

    // Store data in session
    session(['student_name' => $student_name]);
    session(['student_id' => $student_id]);
    session(['course' => $course]);
    session(['level' => $level]);

    return redirect('/student-dashboard');
});

// Show student dashboard
Route::get('/student-dashboard', function () {

    // If no student data, go back to registration
    if (!session()->has('student_name')) {
        return redirect('/register-course');
    }

    $student_name = session('student_name');
    $student_id = session('student_id');
    $course = session('course');
    $level = session('level');

    return view('student-dashboard', compact('student_name', 'student_id', 'course', 'level'));
});

// Cancel registration
Route::post('/cancel-registration', function () {

    // Remove student data from session
    session()->forget('student_name');
    session()->forget('student_id');
    session()->forget('course');
    session()->forget('level');

    return redirect('/register-course');
});
