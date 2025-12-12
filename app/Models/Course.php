<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;
    protected $fillable = [
        'course_name',
        'course_code',
        'description',
        'professor_id'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
