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

    public function edit(){
        return view('teacher.edit');
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

    public function delete(string $id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->delete();

            return response()->json([
                'success' => true,
                'message' => 'Grade deleted successfully!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete Garde.'
            ], 500);
        }
    }
}
