<?php

namespace App\Http\Controllers;

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
}
