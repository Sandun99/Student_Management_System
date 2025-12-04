<?php

namespace App\Http\Controllers;

use App\Exports\SubjectExport;
use App\Imports\SubjectImport;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::orderBy('sub_code', 'asc')->get();
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
            return redirect()->route('subject.index')->with('create', 'Subject created successfully!');
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

    public function importExcelData(Request $request)
    {
        $request->validate([
            'import_file' =>[
                'required',
                'file',
            ]
        ]);

        Excel::import(new SubjectImport, $request->file('import_file'));

        return redirect()->back()->with('status', 'Subject imported successfully');
    }

    public function export()
    {
        $fileName = 'subject.xlsx';
        return Excel::download(new SubjectExport,$fileName);
    }
}
