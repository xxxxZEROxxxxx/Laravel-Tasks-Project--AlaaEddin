<?php

// =============================================
// Task #05: Course Controller (Eloquent ORM + Validation)
// =============================================

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Show all courses
    public function index()
    {
        $courses = Course::all();
        return view('courses', compact('courses'));
    }

    // Show the add course form
    public function create()
    {
        return view('add_course');
    }

    // Store a new course in the database
    public function store(Request $request)
    {
        // Server-side validation
        $request->validate([
            'course_name' => 'required',
            'teacher_name' => 'required',
            'course_hours' => 'required|integer',
        ]);

        // Create and save the course using Eloquent
        $course = new Course();
        $course->course_name = $request->course_name;
        $course->teacher_name = $request->teacher_name;
        $course->course_hours = $request->course_hours;
        $course->save();

        return redirect('/courses')->with('success', 'Course added successfully!');
    }

    // Show the edit course form
    public function edit($id)
    {
        $course = Course::find($id);

        // If course not found, redirect with error
        if (!$course) {
            return redirect('/courses')->with('error', 'Course not found');
        }

        return view('edit_course', compact('course'));
    }

    // Update an existing course
    public function update(Request $request, $id)
    {
        // Server-side validation
        $request->validate([
            'course_name' => 'required',
            'teacher_name' => 'required',
            'course_hours' => 'required|integer',
        ]);

        $course = Course::find($id);

        // If course not found, redirect with error
        if (!$course) {
            return redirect('/courses')->with('error', 'Course not found');
        }

        // Update course data using Eloquent
        $course->course_name = $request->course_name;
        $course->teacher_name = $request->teacher_name;
        $course->course_hours = $request->course_hours;
        $course->save();

        return redirect('/courses')->with('success', 'Course updated successfully!');
    }

    // Delete a course
    public function destroy($id)
    {
        $course = Course::find($id);

        // If course not found, redirect with error
        if (!$course) {
            return redirect('/courses')->with('error', 'Course not found');
        }

        $course->delete();

        return redirect('/courses')->with('success', 'Course deleted successfully!');
    }
}
