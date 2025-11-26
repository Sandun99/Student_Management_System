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

    public function delete(string $id)
    {
        try {
            $grade = Grade::findOrFail($id);
            $grade->delete();

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
