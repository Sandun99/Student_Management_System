<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'full_name',
        'class_id',
        'code'
    ];

    protected $appends = ['full_name'];
    public function getFullNameAttribute(): string
    {
        return $this->name . '-' . ($this->class?->name ?? 'No Class');
    }
    public function class()
    {
        return $this->belongsTo(Classes::class , 'class_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
