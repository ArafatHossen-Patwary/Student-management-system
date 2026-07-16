<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'designation',
        'photo',
        'department_id'
    ];

    /**
     * Get the department that the teacher belongs to.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the courses taught by this teacher.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
