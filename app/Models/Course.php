<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
use SoftDeletes;
protected $fillable=[
        'course_list_id',
        'course_number',
        'course_status_id',
        'course_start_date',
        'course_end_date',
        'user_id',
    ];
    public function courseList()
    {
        return $this->belongsTo(CourseList::class, 'course_list_id', 'id');
    }
    public function courseStatus()
    {
        return $this->belongsTo(CourseStatus::class, 'course_status_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
