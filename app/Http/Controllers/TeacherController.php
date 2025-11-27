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
        $subjects = Subject::orderBy('name')->get();
        $grades = Grade::orderBy('name')->get();

        return view('teacher.create', compact('subjects', 'grades'));
    }

    public function show(){
        return view('teacher.show');
    }

    public function store(Request $request)
    {
            $validated = request()->validate([
                'name' => 'required',
                't_id' => 'required',
                'email' => 'required',
                'nic' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'mobile' => 'required',
                'address' => 'required',
                'username' => 'required',
                'password' => 'required',
                'subjects' => 'required|array|min:1',
                'subjects.*' => 'exists:subjects,id',
                'grade_id' => 'required',
            ]) ;

            $subjectIds = $validated['subjects'];
            unset($validated['subjects']);

            $teacher = Teacher::create($validated);
            $teacher->subjects()->attach($subjectIds);

            return redirect()
                ->route('teacher.teacher.index')
                ->with('success', 'Teacher created successfully!');
    }

    public function edit($id)
    {
        $teacher = Teacher::query()
        ->where('id', $id)
        ->first();

        $subjects = Subject::orderBy('name')->get();
        $grades = Grade::orderBy('name')->get();
        return view('teacher.edit', compact('teacher', 'subjects', 'grades'));
    }

    public function update(Request $request)
    {
        try {
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
                    'subjects' => $request->subjects,
                ]);
            return redirect()->route('teacher.teacher.index');
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
