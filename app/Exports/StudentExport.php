<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection , WithHeadings
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
        return $this->data->map(function ($student) {
            return [
                'reg_no' => $student->reg_no,
                'name' => $student->name,
                optional($student->dob)->format('Y-m-d'),
                'nic' => " " . $student->nic,
                'gender' => $student->gender,
                'mobile' => $student->mobile,
                'address' => $student->address,
                'email' => $student->email,
                'course' => $student->course?->name,
                'grade' => $student->grade?->full_name,
            ];
        });
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
            'email',
            'course',
            'grade',
        ];
    }
}
