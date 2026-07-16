<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'email',
        'phone',
        'gender',
        'date_of_birth',
        'address',
        'photo',
        'department_id'
    ];

    /**
     * Get the department that the student belongs to.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
