<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'department_id',
        'phone',
        'gender',
        'date_of_birth',
        'address',
        'photo'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }   

}
