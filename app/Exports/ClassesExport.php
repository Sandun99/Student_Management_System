<?php

namespace App\Exports;

use App\Models\Classes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ClassesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Classes::select('code', 'name')
            ->orderBy('code', 'asc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'code',
            'name',
        ];
    }
}
