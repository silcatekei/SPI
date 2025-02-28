<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class Subject extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $table = 'subjects';
    protected $fillable = ['uuid', 'subject_name', 'strand', 'grade_level', 'units', 'lecturer_uuid'];
}