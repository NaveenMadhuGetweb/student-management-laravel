<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    protected $fillable = [
        'department_id',
        'name',
        'code',
        'duration',
        'fees',
        'level',
        'description',
        'status',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);				# - This tells Laravel: A Course belongs to one Department.
    }
}
