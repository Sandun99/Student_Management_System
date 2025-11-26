<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\grade;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        return view('class.index' , compact('classes'));
    }

    public function create()
    {
        return view('class.create');
    }

    public function store(Request $request){

        try {

            Classes::query()->create([
                'name' => $request->name,
                'code' => $request->code,
            ]);
            return redirect()->route('class.index');
        }
        catch (\Exception $e){
            return $e;
        }
    }

    public function delete($id)
    {
        try {
            $class = Classes::findOrFail($id);
            $class->delete();

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
