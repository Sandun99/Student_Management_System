<?php

namespace App\Http\Controllers;

use App\Exports\ClassesExport;
use App\Imports\ClassesImport;
use App\Models\Classes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::orderBy('code', 'asc')->get();
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
            return redirect()->route('class.index')->with('create', 'Class created successfully!');
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
            return redirect()->route('class.index')->with('success', 'Class updated successfully!');
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

    public function importExcelData(Request $request)
    {
        $request->validate([
            'import_file' => [
                'required',
                'file',
            ]
        ]);

        Excel::import(new ClassesImport, $request->file('import_file'));

        return redirect()->back()->with('status', 'Classes Imported successfully!');

    }

    public function export()
    {
        $fileName = 'classes.xlsx';
        return Excel::download(new ClassesExport, $fileName);
    }

    public function pdf()
    {
        $classes = Classes::all();

        $data = [
            'title' => 'Student Management System',
            'date' => date('Y-m-d'),
            'classes' => $classes
        ];

        $pdf = PDF::loadView('class.pdf' , $data);
        return $pdf->download('class.pdf');
    }
}
