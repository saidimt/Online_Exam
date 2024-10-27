<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationQuestion extends Model
{
    use HasFactory;
    protected $fillable=[];
   
    public function examination()
    {
        return $this->belongsTo(Examination::class, 'examination_id', 'id');
    } 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
