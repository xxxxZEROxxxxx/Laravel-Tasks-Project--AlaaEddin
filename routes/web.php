<?php

// =============================================
// Task #01: Course Registration System
// =============================================
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;

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

// =============================================
// Task #02: Course Addition Feature
// =============================================

// Show courses management page (updated in Task #03 to read from database)
Route::get('/courses', function () {
    $courses = DB::table('courses')->get();
    return view('courses', compact('courses'));
});

// Show add course form
Route::get('/courses/create', function () {
    return view('add_course');
});

// Handle saving a new course to the database
Route::post('/courses/store', function () {

    $course_name = request('course_name');
    $teacher_name = request('teacher_name');
    $course_hours = request('course_hours');

    // Simple manual validation
    if (empty($course_name)) {
        return redirect()->back()->with('error', 'Course name is required');
    }
    if (empty($teacher_name)) {
        return redirect()->back()->with('error', 'Teacher name is required');
    }
    if (empty($course_hours)) {
        return redirect()->back()->with('error', 'Course hours is required');
    }

    // Insert the course into the database
    DB::table('courses')->insert([
        'course_name' => $course_name,
        'teacher_name' => $teacher_name,
        'course_hours' => $course_hours,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect('/courses')->with('success', 'Course added successfully!');
});

// =============================================
// Task #03: Display, Edit, Update, and Delete Courses
// =============================================

// Show edit course form
Route::get('/courses/edit/{id}', function ($id) {

    $course = DB::table('courses')->where('id', $id)->first();

    // If course not found, redirect with error
    if (!$course) {
        return redirect('/courses')->with('error', 'Course not found');
    }

    return view('edit_course', compact('course'));
});

// Handle updating a course
Route::post('/courses/update/{id}', function ($id) {

    $course_name = request('course_name');
    $teacher_name = request('teacher_name');
    $course_hours = request('course_hours');

    // Simple manual validation
    if (empty($course_name)) {
        return redirect()->back()->with('error', 'Course name is required');
    }
    if (empty($teacher_name)) {
        return redirect()->back()->with('error', 'Teacher name is required');
    }
    if (empty($course_hours)) {
        return redirect()->back()->with('error', 'Course hours is required');
    }

    // Update the course in the database
    DB::table('courses')->where('id', $id)->update([
        'course_name' => $course_name,
        'teacher_name' => $teacher_name,
        'course_hours' => $course_hours,
        'updated_at' => now(),
    ]);

    return redirect('/courses')->with('success', 'Course updated successfully!');
});

// Handle deleting a course
Route::post('/courses/delete/{id}', function ($id) {

    DB::table('courses')->where('id', $id)->delete();

    return redirect('/courses')->with('success', 'Course deleted successfully!');
});

// =============================================
// Task #04: User Management (using Controller)
// =============================================

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/store', [UserController::class, 'store']);
Route::get('/users/edit/{id}', [UserController::class, 'edit']);
Route::post('/users/update/{id}', [UserController::class, 'update']);
Route::post('/users/delete/{id}', [UserController::class, 'destroy']);
