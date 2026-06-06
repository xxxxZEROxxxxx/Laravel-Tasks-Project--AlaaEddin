<?php

// =============================================
// Task #05: Course Model (Eloquent ORM)
// =============================================

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'courses';

    // The attributes that are mass assignable
    protected $fillable = [
        'course_name',
        'teacher_name',
        'course_hours',
    ];
}
