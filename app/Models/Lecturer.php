<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class Lecturer extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $table = 'lecturers';
    protected $fillable = ['uuid', 'name', 'email', 'contact_number', 'address'];
}