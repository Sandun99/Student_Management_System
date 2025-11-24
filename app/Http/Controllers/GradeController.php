<?php

namespace App\Http\Controllers;

use App\Models\Classes;
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
}
