<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class Student extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $table = 'students';
    protected $fillable = [
        'uuid', 'user_uuid', 'first_name', 'middle_name', 'last_name',
        'date_of_birth', 'gender', 'contact_no', 'address',
        'lrn', 'grade_level', 'strand', 'parent_guardian'
    ];
}