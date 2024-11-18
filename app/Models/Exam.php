<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Exam extends Model
{
use SoftDeletes;
use HasFactory;

    protected $fillable = ['exam_name', 'question', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_answer'];
}
