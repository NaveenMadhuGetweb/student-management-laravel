<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'department',
        'phone',
        'gender',
        'date_of_birth',
        'address',
        'photo'
    ];
}
