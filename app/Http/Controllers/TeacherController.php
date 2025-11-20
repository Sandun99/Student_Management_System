<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        return view('teacher.index');
    }

    public function add()
    {
        return view('teacher.create');
    }

    public function edit(){
        return view('teacher.edit');
    }

    public function show(){
        return view('teacher.show');
    }
}
