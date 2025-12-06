<?php

namespace App\Http\Controllers;

use App\Exports\TeacherExport;
use App\Imports\TeacherImport;
use App\Models\Teacher;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class TeacherController extends Controller
{
    public function index(){

        $teachers = Teacher::with('subjects', 'grades')
            ->orderBy('t_id', 'asc')
            ->get();
        return view('teacher.index', compact('teachers'));
    }

    public function create()
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
                'password' => $request->password,
            ]);

            $teacher = Teacher::latest()->first();
            $teacher->subjects()->sync($request->subjects ?? []);
            $teacher->grades()->sync($request->grades ?? []);

            return redirect()->route('teacher.teacher.index')->with('create', 'Teacher created successfully!');
        }
        catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create teacher: ' . $e->getMessage()]);
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
                ]);

            $teacher = Teacher::find($request->id);
            $teacher->subjects()->sync($request->subjects);
            $teacher->grades()->sync($request->grades);

            return redirect()->route('teacher.teacher.index')->with('success', 'Teacher updated successfully!');
        }
        catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to update teacher: ' . $e->getMessage()]);
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
            return redirect()->back()->withErrors(['error' => 'Failed to delete teacher: ' . $e->getMessage()]);
        }
    }

    public function importExcelData(Request $request)
    {
        $request->validate([
            'import_file' =>[
                'required',
                'file',
                'mimes:xlsx,xls,csv',
                'max:10240', // 10MB max
            ]
        ]);

        try {
            Excel::import(new TeacherImport, $request->file('import_file'));
            return redirect()->back()->with('status', 'Teacher imported successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to import teachers: ' . $e->getMessage()]);
        }
    }


    public function export()
    {
        $fileName = 'teacher_list.xlsx';
        return Excel::download(new TeacherExport, $fileName);
    }

    public function pdf()
    {
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $grades = Grade::all();

        $data = [
            'title' => 'Student Management System',
            'date' => date('Y-m-d'),
            'teachers' => $teachers,
            'subjects' => $subjects,
            'grades' => $grades,
        ];

        $pdf = PDF::loadView('teacher.pdf' , $data);
        return $pdf->download('teacher.pdf');
    }
}
