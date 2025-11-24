<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return view('subject.index');
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store(Request $request){

        try {

            Subject::query()->create([
                'name' => $request->name,
                'code' => $request->code,
            ]);
            return view('subject.index');
        }
        catch (\Exception $e) {
            return $e;
        }
    }
}
