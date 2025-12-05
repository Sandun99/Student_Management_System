<?php

namespace App\Exports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GradeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Grade::with('class')->get()->map(function ($grade) {
            return [
                'code' => $grade->code,
                'full_name' => $grade->full_name,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'code',
            'full_name',
        ];
    }
}
