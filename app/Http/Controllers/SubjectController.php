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

    public function edit($id)
    {
        $subject = Subject::query()
            ->where('id', $id)
            ->first();

        return view('subject.edit', compact('subject'));
    }

    public function update(Request $request)
    {
        try {

            Subject::query()
                ->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'sub_code' => $request->sub_code,
                ]);
            return redirect()->route('subject.index')->with("success", "Subject Updated Successfully");
        }
        catch (\Exception $e) {
            return $e;
        }
    }

    public function delete()
    {
        try {
            Subject::query()
                ->where('id', request('id'))
                ->delete();
            return redirect()->route('subject.index')->with('deleted', 'Subject deleted successfully');
        }
        catch (\Exception $e) {
            return $e;
        }
    }
}
