<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
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

    public function store(Request $request)
    {
        try {

            Student::query()->create([
                'name' => $request->name,
                'reg_no' => $request->reg_no,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password,
            ]);
            return view('student.index');
        }
        catch (\Exception $e) {
            return $e;
        }
    }
}
