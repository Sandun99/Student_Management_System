<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Grade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::select(
            'reg_no',
            'name',
            'dob',
            'nic',
            'gender',
            'mobile',
            'address',
            'email')
            ->orderBy('reg_no', 'asc')
            ->get();
    }
    public function headings(): array
    {
        return [
            'reg_no',
            'name',
            'dob',
            'nic',
            'gender',
            'mobile',
            'address',
            'email'
        ];
    }
}
