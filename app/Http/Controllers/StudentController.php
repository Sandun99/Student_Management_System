<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Course;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with( 'grade')->latest()->get();
        return view('student.index' , compact('students'));
    }

    public function create(){

        $grades  = Grade::orderBy('name')->get();
        $courses = Course::orderBy('name')->get();
        return view('student.create', compact('grades', 'courses'));

    }

    public function edit(){
        return view('student.edit');
    }

    public function show(){
        return view('student.show');
    }

    public function store(Request $request)
    {
        $validated = $request->all();

        try {

            Student::query()->create([
                'name' => $request->name,
                'reg_no' => $request->reg_no,
                'dob' => $request->dob,
                'nic' => $request->nic,
                'gender' => $request->gender,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'grade_id' => $request->grade_id,
                'course_id' => $request->course_id,
            ]);
            return redirect()->route('student.index');
        }
        catch (\Exception $exception){
            return redirect()->route('student.create')->with('error', $exception->getMessage());
        }

    }

    public function delete(string $id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();

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
