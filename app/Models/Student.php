<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'middle_name',
        'sur_name',
        'registration_no',
        'user_id',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
