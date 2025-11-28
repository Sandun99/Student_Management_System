<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('subjects')->latest()->get();
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

        return redirect()->route('course.index');
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
            return redirect()->route('course.index', compact('course'));
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
}
