<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
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

    public function store(Request $request)
    {
        try {

            Teacher::query()->create([
                'name' => $request->name,
                'email' => $request->email,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'username' => $request->username,
                'password' => $request->password,
            ]);

        }
        catch (\Exception $e) {
            return $e;
        }

        return view('teacher.index');
    }
}
