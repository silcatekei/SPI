<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'student_type',  // Add student_type
        'full_name',
        'address',
        'email',
        'number',
        'school_level',
        'strand',
        'course',
        'student_picture_path',
        'student_picture_name',
        'grades_copy_path',
        'grades_copy_name',
    ];
}