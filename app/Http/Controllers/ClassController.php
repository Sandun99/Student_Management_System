<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        return view('class.index');
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
            return view('class.index');
        }
        catch (\Exception $e){
            return $e;
        }
    }

}
