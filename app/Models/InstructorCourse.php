<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorCourse extends Model
{
    use HasFactory;
    protected $fillable=[];
    public function subjectCouse()
    {
        return $this->belongsTo(SubjectCourse::class, 'subject_course_id', 'id');
    }
    public function instructor()
    {
        return $this->belongsTo(instructor::class, 'instructor_id', 'id');
    }
}
