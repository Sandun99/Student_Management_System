<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        't_id',
        'email',
        'nic',
        'dob',
        'gender',
        'mobile',
        'address',
        'course_id',
        'subject_id',
        'grade_id',
        'username',
        'password'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
