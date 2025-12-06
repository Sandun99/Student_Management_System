<?php

namespace App\Http\Controllers;

use App\Exports\CourseExport;
use App\Imports\CourseImport;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Course;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('subjects')
            ->orderBy('code', 'asc')
            ->get();
        return view('course.index' , compact('courses'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('course.create' , compact('subjects'));
    }

    public function show(Course $course)
    {
        return view('course.show', compact('course'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'code'       => 'required|string|max:20|unique:courses,code',
            'category'   => 'nullable|string|max:100',
            'start_date' => 'required|date',
            'duration'   => 'required|string|max:50',
            'price'      => 'required|numeric|min:0',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'subjects'   => 'required|array|min:1',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $course = Course::query()->create([
            'name' => $request->name,
            'code' => $request->code,
            'category' => $request->category,
            'start_date' => $request->start_date,
            'duration' => $request->duration,
            'price' => $request->price,
        ]);

        $course->subjects()->attach($request->subjects);
        return redirect()->route('course.index')->with('create', 'Course created successfully!');
    }

    public function edit($id)
    {
        $course = Course::query()
            ->with('subjects')
            ->where('id', $id)
            ->first();

        return view('course.edit' , compact('course'));
    }

    public function update(Request $request , $id)
    {
        try {
            $course = Course::findOrFail($id);

            Course::query()
                ->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'code' => $request->code,
                    'category' => $request->category,
                    'start_date' => $request->start_date,
                    'duration' => $request->duration,
                    'price' => $request->price,
                ]);

            $course->subjects()->sync($request->subjects ?? []);
            return redirect()->route('course.index', compact('course'))->with('success', 'Course has been updated');
        }
        catch (\Exception $e) {
            return $e;
        }
    }
    public function delete()
    {
        try {
            Course::query()
                ->where('id', request('id'))
                ->delete();

            return redirect()->route('course.index')->with('deleted', 'Course deleted successfully');

        }
        catch (\Exception $e) {
            return $e;
        }
    }

    public function importExcelData(Request $request)
    {
        $request->validate([
            'import_file' => [
                'required',
                'file',
            ]
        ]);
        Excel::import(new CourseImport, $request->file('import_file'));

        return redirect()->back()->with('success', 'Course imported successfully');
    }

    public function export()
    {
        $fileName = 'courses.xlsx';
        return Excel::download(new CourseExport, 'courses.xlsx');
    }

    public function pdf()
    {
        $courses = Course::all();
        $subjects = Subject::all();
        $data = [
            'title' => 'Student Management System',
            'date' => date('Y-m-d'),
            'courses' => $courses,
            'subjects' => $subjects,
        ];

        $pdf = PDF::loadView('course.pdf' , $data);
        return $pdf->download('courses.pdf');
    }
}
