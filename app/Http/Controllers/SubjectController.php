<?php

namespace App\Http\Controllers;

use App\Exports\SubjectExport;
use App\Imports\SubjectImport;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function export(Request $request)
    {
        $search = $request->get('search', '');
        $subjects = Subject::orderBy('sub_code', 'asc')->get();

        if ($search != '') {
            $search = strtolower($search);
            $subjects = $subjects->filter(function ($subject) use ($search) {
                return str_contains(strtolower($subject->sub_code), $search) ||
                    str_contains(strtolower($subject->name), $search);
            });
        }

        return Excel::download(new SubjectExport($subjects->values()), 'subjects.xlsx');
    }

    public function pdf(Request $request)
    {
        $subjects = Subject::orderBy('sub_code', 'asc')->get();
        $search = $request->get('search', '');
        if ($search != '') {
            $search = strtolower($search);
            $subjects = $subjects->filter(function ($subject) use ($search) {
                return str_contains(strtolower($subject->sub_code), $search) ||
                    str_contains(strtolower($subject->name), $search);
            });
        }

        $data = [
            'title' => 'Student Management System',
            'date' => date('d-m-Y'),
            'subjects' => $subjects
        ];

        $pdf = Pdf::loadView('subject.pdf', $data);
        return $pdf->download('subjects.pdf');
    }
}
