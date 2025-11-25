<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Grade;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index(){

        $teachers = Teacher::with('course','subject','grade')->get();
        return view('teacher.index' , compact('teachers'));
    }

    public function add()
    {
        $courses = Course::orderBy('name')->get();
        $subjects = Subject::orderBy('name')->get();
        $grades = Grade::orderBy('name')->get();
        return view('teacher.create', compact('courses', 'subjects', 'grades'));
    }

    public function edit(){
        return view('teacher.edit');
    }

    public function show(){
        return view('teacher.show');
    }

    public function store(Request $request)
    {
        $validatedData = $request->all();

        try {

            Teacher::query()->create([
                'name' => $request->name,
                "t_id" => $request->t_id,
                'email' => $request->email,
                'nic' => $request->nic,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                "course_id" => $request->course_id,
                "subject_id" => $request->subject_id,
                "grade_id" => $request->grade_id,
            ]);

            return redirect()->route('teacher.teacher.index')->with('success', 'Teacher created successfully.');
        }
        catch (\Exception $e) {

            return redirect()->route('teacher.teacher.index')->with('error', $e->getMessage());
        }
    }
}
