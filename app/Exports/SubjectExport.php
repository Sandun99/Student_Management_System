<?php

namespace App\Exports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubjectExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subject::select('sub_code', 'name')
            ->orderBy('sub_code', 'asc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'sub_code',
            'name',
        ];
    }
}
