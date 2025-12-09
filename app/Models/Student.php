<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reg_no',
        'dob',
        'nic',
        'gender',
        'mobile',
        'address',
        'email',
        'username',
        'password',
        'profile',
        'nic_front',
        'nic_back',
        'grade_id',
        'course_id'
    ];

    protected $casts = [
        'dob' => 'date',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

}
