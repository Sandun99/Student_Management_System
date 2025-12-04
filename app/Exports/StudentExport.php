<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Grade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentExport implements FromCollection , WithHeadings , WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::orderBy('reg_no', 'asc')->get();
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

    public function map($student): array
    {
        return [
            $student->reg_no,
            $student->name,
            optional($student->dob)->format('Y-m-d'),
            $student->nic,
            $student->gender,
            $student->mobile,
            $student->address,
            $student->email
        ];
    }
}
