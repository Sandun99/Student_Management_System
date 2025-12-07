<?php

namespace App\Exports;

use App\Models\Grade;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GradeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;
    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data->map(function ($grade) {
            return [
                'code'      => $grade->code,
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
