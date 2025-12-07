<?php

namespace App\Http\Controllers;

use App\Exports\GradeExport;
use App\Imports\GradeImport;
use App\Models\Classes;
use App\Models\Grade;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::with('class')->orderBy('code', 'asc')->get();
        return view('grade.index' , compact('grades'));
    }

    public function create()
    {
        $classes = Classes::orderBy('name')->get();
        return view('grade.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:20',
            'class_id' => 'required|exists:classes,id',
            'code'     => 'required|string|unique:grades,code',
        ]);

        Grade::create($request->only(['name', 'class_id', 'code']));

        return redirect()->route('grade.index')->with('create', 'Grade created successfully!');
    }

    public function edit($id)
    {
        $grade = Grade::query()
            ->where('id', $id)
            ->first();

        $classes = Classes::orderBy('code', 'asc')->get();
        return view('grade.edit', compact('grade', 'classes'));
    }

    public function update(Request $request)
    {
        try {
            Grade::query()
                ->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'class_id' => $request->class_id,
                    'code' => $request->code,
                ]);
            return redirect()->route('grade.index')->with('success', 'Grade updated successfully!');
        }
        catch (\Exception $e) {
            return $e;
        }
    }

    public function delete()
    {
        try {
            Grade::query()
                ->where('id', request()->id)
                ->delete();

            return redirect()->route('grade.index')->with('deleted', 'Grade deleted successfully!');
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

        Excel::import(new GradeImport, $request->file('import_file'));

        return redirect()->back()->with('status', 'Excel Data Imported successfully!');
    }

    public function export(Request $request)
    {
        $search = $request->get('search', '');
        $grades = Grade::with('class')
            ->orderBy('code', 'asc')
            ->get();

        if ($search !== '') {
            $search = strtolower($search);
            $grades = $grades->filter(function ($g) use ($search) {
                return str_contains(strtolower($g->code), $search) ||
                    str_contains(strtolower($g->full_name), $search);
            });
        }
        return Excel::download(new GradeExport($grades->values()), 'grades.xlsx');

    }

    public function pdf(Request $request)
    {

        $search = $request->get('search', '');
        $grades = Grade::with('class')
            ->orderBy('code', 'asc')
            ->get();

        if ($search !== '') {
            $search = strtolower($search);
            $grades = $grades->filter(function ($g) use ($search) {
                return str_contains(strtolower($g->code), $search) ||
                    str_contains(strtolower($g->full_name), $search);
            });
        }

        $data = [
            'title' => 'Student Management System',
            'date' => date('d-m-Y'),
            'grades' => $grades,
        ];

        $pdf = PDF::loadView('grade.pdf' , $data)->setPaper('A4', 'portrait');
        return $pdf->download('grade.pdf');
    }

}
