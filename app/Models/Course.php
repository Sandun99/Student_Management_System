<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'course_code',
        'category',
        'start_date',
        'duration',
        'price',
        'description',
        'image',
    ];

    protected $casts = [
        'price'      => 'decimal:2',
        'start_date' => 'date',
    ];



}
