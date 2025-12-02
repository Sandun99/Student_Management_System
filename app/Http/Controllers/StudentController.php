<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Vtiful\Kernel\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with( 'grade','course')->oldest()->get();
        return view('student.index' , compact('students'));
    }

    public function create(){

        $grades  = Grade::all();
        $courses = Course::all();
        return view('student.create', compact('grades', 'courses'));

    }
    public function show(Student $student){

        return view('student.show', compact('student'));
    }
    public function store(Request $request)
    {

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
            return redirect()->route('student.index')->with('create', 'Student created successfully!');
        }
        catch (\Exception $exception){
            return redirect()->route('student.create')->with('error', $exception->getMessage());
        }
    }

    public function edit($id)
    {
        $student = Student::query()
            ->where('id', $id)
            ->first();

        $courses = Course::all();
        $grades  = Grade::all();
        return view('student.edit', compact('student', 'grades', 'courses'));
    }

    public function update(Request $request)
    {

        try {
            Student::query()
                ->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'reg_no' => $request->reg_no,
                    'dob' => $request->dob,
                    'nic' => $request->nic,
                    'gender' => $request->gender,
                    'mobile' => $request->mobile,
                    'address' => $request->address,
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => $request->password,
                    'grade_id' => $request->grade_id,
                    'course_id' => $request->course_id,
                ]);

            return redirect()->back()->with('success', 'Student updated successfully');
        }
        catch (\Exception $e){
            return $e;
        }
    }

    public function delete()
    {
        try {
            Student::query()
                ->where('id', request()->id)
                ->delete();

            return redirect()->route('student.index')->with('deleted', 'Student deleted successfully');
        }
        catch (\Exception $e){
            return $e;
        }
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
