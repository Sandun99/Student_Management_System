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
        'username',
        'password',
    ];

    protected $casts = [
        'dob' => 'date',
    ];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class , 'subject_teacher');
    }

    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'grade_teacher');
    }
}
