<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('student.index');
    }

    public function create(){
        return view('student.create');
    }

    public function edit(){
        return view('student.edit');
    }

    public function show(){
        return view('student.show');
    }
}
