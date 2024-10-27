<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectCourse extends Model
{
    use HasFactory;
    protected $fillable=[];
    public function subjec()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
