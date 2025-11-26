<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sub_code',
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'subject_teacher');
    }
}
