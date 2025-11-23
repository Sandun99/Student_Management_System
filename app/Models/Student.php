<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'std_name',
        'roll_no',
        'email',
        'pn_no',
        'username',
        'password'
    ];
}
