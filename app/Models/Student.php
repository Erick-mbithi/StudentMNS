<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $fillable = [
        'admission_number',
        'first_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'date_of_birth',
        'address',
        'course',
        'status',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    public function payments(): HasMany
{
    return $this->hasMany(Payment::class);
}

}
