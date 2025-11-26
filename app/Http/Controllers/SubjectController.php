<?php

namespace App\Http\Controllers;

use App\Models\grade;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index' , compact('subjects'));
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store(Request $request){

        try {

            Subject::query()->create([
                'name' => $request->name,
                'sub_code' => $request->sub_code,
            ]);
            return redirect()->route('subject.index');
        }
        catch (\Exception $e) {
            return $e;
        }
    }

    public function delete(string $id)
    {
        try {
            $subject = Subject::findOrFail($id);
            $subject->delete();

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
