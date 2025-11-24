<?php

namespace App\Http\Controllers;

use App\Models\Classes;
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

}
