<?php

namespace App\Http\Controllers;

use App\Exports\TeacherExport;
use App\Imports\TeacherImport;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
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

            $request->validate([
                'profile' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nic_front' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nic_back' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->has('profile')) {
                $file = $request->file('profile');
                $extension = $file->getClientOriginalExtension();

                $filename = time() . '.' . $extension;

                $path = 'assets/img/profile/';
                $file->move($path, $filename);

            }

            if ($request->has('nic_front')) {
                $file = $request->file('nic_front');
                $extension = $file->getClientOriginalExtension();

                $filename = time() . '.' . $extension;

                $path1 = 'assets/img/nic/front/';
                $file->move($path1, $filename);
            }

            if ($request->has('nic_back')) {
                $file = $request->file('nic_back');
                $extension = $file->getClientOriginalExtension();

                $filename = time() . '.' . $extension;

                $path2 = 'assets/img/nic/back/';
                $file->move($path2, $filename);
            }

            Teacher::query()->create([
                'name' => $request->name,
                't_id' => $request->t_id,
                'email' => $request->email,
                'nic' => $request->nic,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'profile' => $path.$filename,
                'nic_front' => $path1.$filename,
                'nic_back' => $path2.$filename,
                'username' => $request->username,
                'password' => $request->password,
            ]);

            $teacher = Teacher::latest()->first();
            $teacher->subjects()->sync($request->subjects);
            $teacher->grades()->sync($request->grades);

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

    public function update(Request $request, int $id)
    {
        try {

            $request->validate([
                'profile' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nic_front' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nic_back' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $teacher = Teacher::findOrFail($id);

            if ($request->has('profile')) {
                $file = $request->file('profile');
                $extension = $file->getClientOriginalExtension();

                $filename = time() . '.' . $extension;

                $path = 'assets/img/profile/';
                $file->move($path, $filename);

                if (file::exists($teacher->profile)) {
                    File::delete($teacher->profile);
                }
            }

            if ($request->has('nic_front')) {
                $file = $request->file('nic_front');
                $extension = $file->getClientOriginalExtension();

                $filename = time() . '.' . $extension;

                $path1 = 'assets/img/nic/front/';
                $file->move($path1, $filename);

                if (file::exists($teacher->nic_front)) {
                    File::delete($teacher->nic_front);
                }
            }

            if ($request->has('nic_back')) {
                $file = $request->file('nic_back');
                $extension = $file->getClientOriginalExtension();

                $filename = time() . '.' . $extension;

                $path2 = 'assets/img/nic/back/';
                $file->move($path2, $filename);

                if (file::exists($teacher->nic_back)) {
                    File::delete($teacher->nic_back);
                }
            }

            $teacher->update([
                'name' => $request->name,
                't_id' => $request->t_id,
                'email' => $request->email,
                'nic' => $request->nic,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'profile' => $path . $filename,
                'nic_front' => $path1 . $filename,
                'nic_back' => $path2 . $filename,
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

    public function delete(int $id)
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


    public function export(Request $request)
    {
        $search = $request->get('search', '');
        $teachers = Teacher::with('subjects', 'grades')
            ->orderBy('t_id', 'asc')
            ->get();

        if ($search != ''){
            $search = strtolower($search);
            $teachers = $teachers->filter(function ($teacher) use ($search) {
                return str_contains(strtolower($teacher->t_id), $search) ||
                    str_contains(strtolower($teacher->name), $search) ||
                    str_contains(strtolower($teacher->email), $search) ||
                    str_contains(strtolower($teacher->nic), $search) ||
                    str_contains(strtolower($teacher->gender), $search) ||
                    str_contains(strtolower($teacher->mobile), $search) ||
                    str_contains(strtolower($teacher->address), $search) ||
                    str_contains(strtolower($teacher->subjects), $search) ||
                    str_contains(strtolower($teacher->grades), $search);
            });
        }

        return Excel::download(new TeacherExport($teachers->values()), 'teachers.xlsx');
    }

    public function pdf(Request $request)
    {
        $search = $request->get('search', '');
        $teachers = Teacher::with('subjects', 'grades')
            ->orderBy('t_id', 'asc')
            ->get();

        if ($search != ''){
            $search = strtolower($search);
            $teachers = $teachers->filter(function ($teacher) use ($search) {
                return str_contains(strtolower($teacher->t_id), $search) ||
                    str_contains(strtolower($teacher->name), $search) ||
                    str_contains(strtolower($teacher->email), $search) ||
                    str_contains(strtolower($teacher->nic), $search) ||
                    str_contains(strtolower($teacher->gender), $search) ||
                    str_contains(strtolower($teacher->mobile), $search) ||
                    str_contains(strtolower($teacher->address), $search) ||
                    str_contains(strtolower($teacher->subjects), $search) ||
                    str_contains(strtolower($teacher->grades), $search);
            });
        }

        $data = [
            'title' => 'Student Management System',
            'date' => date('Y-m-d'),
            'teachers' => $teachers,
        ];

        $pdf = PDF::loadView('teacher.pdf' , $data)->setPaper('A4', 'portrait');
        return $pdf->download('teacher.pdf');
    }
}
