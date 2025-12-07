<?php

namespace App\Exports;

use App\Models\Subject;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubjectExport implements FromCollection , WithHeadings
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
        return $this->data->map(function($subject){
            return [
                'sub_code' => $subject->sub_code,
                'name' => $subject->name,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'sub_code',
            'name',
        ];
    }
}
