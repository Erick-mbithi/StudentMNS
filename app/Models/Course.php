<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',

        
    ];
    public function feeStructures()
{
    return $this->hasMany(FeeStructure::class);
}

    protected $casts = [
        'status' => 'boolean',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}