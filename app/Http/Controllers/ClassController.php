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

    public function edit($id)
    {
        $classes = Classes::query()
        ->where('id', $id)
        ->first();
        return view('class.edit' , compact('classes'));
    }

    public function update(Request $request)
    {
        try {
            Classes::query()
                ->where('id', $request->id)
                ->update([
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
            Classes::query()
                ->where('id', $id)
                ->delete();

            return redirect()->route('class.index')->with('deleted', 'Class deleted successfully!');
        }
        catch (\Exception $e){
            return $e;
        }
    }

}
