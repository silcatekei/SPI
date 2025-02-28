<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasUuid;

class ClassModel extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $table = 'classes';
    protected $fillable = ['uuid', 'subject_uuid', 'lecturer_uuid', 'schedule', 'room_number'];
}