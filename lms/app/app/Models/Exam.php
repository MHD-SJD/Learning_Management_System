<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
     protected $fillable = [
    'course_id',
    'exam_date',
    'total_marks'
];
}
