<?php

namespace App\Http\Controllers;

use App\Models\Subject;
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
        $subjects = Subject::orderBy('name')->get();
        return view('course.create' , compact('subjects'));
    }

    public function edit()
    {
        return view('course.edit');
    }

    public function show()
    {
        return view('course.show');
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

        $course = Course::create($validated);
        $course->subjects()->attach($request->subjects);

        return redirect()->route('course.index');
    }

}
