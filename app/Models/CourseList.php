<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseList extends Model
{
    use HasFactory;
    protected $fillable=[];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
