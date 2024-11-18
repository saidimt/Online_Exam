<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examination extends Model
{
use SoftDeletes;
use HasFactory;
    protected $fillable=[];
    public function examType()
    {
        return $this->belongsTo(ExamType::class, 'exam_type_id', 'id');
    }
    public function subjectCourse()
    {
        return $this->belongsTo(SubjectCourse::class, 'subject_course_id', 'id');
    } 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
