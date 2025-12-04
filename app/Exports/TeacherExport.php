<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeacherExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teacher::select(
            't_id',
            'name',
            'email',
            'nic',
            'dob',
            'gender',
            'mobile',
            'address')
            ->orderBy('t_id', 'asc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'teacher_id',
            'name',
            'email',
            'nic',
            'dob',
            'gender',
            'mobile',
            'address',
        ];
    }
}
