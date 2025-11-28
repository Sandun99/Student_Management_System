<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::with('class')->latest()->get();
        return view('grade.index' , compact('grades'));
    }

    public function create()
    {
        $classes = Classes::orderBy('name')->get();
        return view('grade.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:20',
            'class_id' => 'required|exists:classes,id',
            'code'     => 'required|string|unique:grades,code',
        ]);

        Grade::create($request->only(['name', 'class_id', 'code']));

        return redirect()->route('grade.index')->with('success', 'Grade created successfully!');
    }

    public function edit($id)
    {
        $grade = Grade::query()
            ->where('id', $id)
            ->first();

        return view('grade.edit', compact('grade'));
    }

    public function update(Request $request)
    {
        try {
            Grade::query()
                ->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'class_id' => $request->class_id,
                    'code' => $request->code,
                ]);
            return redirect()->route('grade.index')->with('success', 'Grade updated successfully!');
        }
        catch (\Exception $e) {
            return $e;
        }
    }

    public function delete()
    {
        try {
            Grade::query()
                ->where('id', request()->id)
                ->delete();

            return redirect()->route('grade.index')->with('deleted', 'Grade deleted successfully!');
        }
        catch (\Exception $e) {
            return $e;
        }
    }


}
