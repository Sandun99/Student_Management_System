<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        return view('grade.index');
    }

    public function create()
    {
        return view('grade.create');
    }

    public function store(Request $request){

        try {

            Grade::query()->create([
                'name' => $request->name,
                'remarks' => $request->remarks,
            ]);

        }catch (\Exception $e){
            return $e;
        }

        return view('grade.index');
    }
}
