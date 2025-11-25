<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
