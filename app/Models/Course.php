<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'category',
        'start_date',
        'duration',
        'price',
    ];

    protected $casts = [
        'price'      => 'decimal:2',
        'start_date' => 'date',
    ];

    public function subjects()
    {
        return $this->belongsToMany
        (Subject::class, 'course_subject');
    }

    public function getSubjectNameAttribute(): string
    {
        return $this->subject?->name;
    }
}
