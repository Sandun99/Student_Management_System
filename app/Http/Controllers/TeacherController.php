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

        $teachers = Teacher::with('subjects', 'grade')->get();
        return view('teacher.index', compact('teachers'));
    }

    public function add()
    {
        $subjects = Subject::all();
        $grades = Grade::all();

        return view('teacher.create', compact('subjects', 'grades'));
    }

    public function show(Teacher $teacher){
        return view('teacher.show', compact('teacher'));
    }
    public function store(Request $request)
    {

        try {
            Teacher::query()->create([
                'name' => $request->name,
                't_id' => $request->t_id,
                'email' => $request->email,
                'nic' => $request->nic,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'grade_id' => $request->grade_id,
            ]);

            $teacher = Teacher::latest()->first();
            $teacher->subjects()->attach($request->subjects);

            return redirect()->route('teacher.teacher.index')->with('create', 'Teacher created successfully!');
        }
        catch (\Exception $e) {
            return $e;
        }
    }

    public function edit($id)
    {
        $teacher = Teacher::query()
        ->where('id', $id)
        ->first();

        $subjects = Subject::all();
        $grades = Grade::all();
        return view('teacher.edit', compact('teacher', 'subjects', 'grades'));
    }

    public function update(Request $request)
    {
        try {
            $teacher = Teacher::findOrFail($request->id);
            Teacher::query()
                ->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    't_id' => $request->t_id,
                    'email' => $request->email,
                    'nic' => $request->nic,
                    'dob' => $request->dob,
                    'gender' => $request->gender,
                    'mobile' => $request->mobile,
                    'address' => $request->address,
                    'username' => $request->username,
                    'password' => $request->password,
                    'grade_id' => $request->grade_id,
                ]);

            $teacher = Teacher::find($request->id);
            $teacher->subjects()->sync($request->subjects ?? []);

            return redirect()->route('teacher.teacher.index')->with('success', 'Teacher updated successfully!');
        }
        catch (\Exception $e) {
            return $e;
        }
    }

    public function delete()
    {
        try {
            Teacher::query()
            ->where('id', request('id'))
            ->delete();

            return redirect()->route('teacher.teacher.index')->with('deleted', 'Teacher deleted successfully!');
        }
        catch (\Exception $e) {
            return $e;
        }
    }
}
