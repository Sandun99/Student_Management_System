<?php

namespace App\Http\Controllers;

use App\Models\grade;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grade.index' , compact('grades'));
    }

    public function create()
    {
        return view('grade.create' );
    }

    public function store(Request $request){

        try {

            Grade::query()->create([
                'name' => $request->name,
                'code' => $request->code,

            ]);
            return redirect()->route('grade.index');
        }catch (\Exception $e){
            return $e;
        }
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
