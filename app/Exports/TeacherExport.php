<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TeacherExport implements FromCollection , WithHeadings , WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teacher::with('subjects' , 'grade')
            ->orderBy('t_id', 'asc')
            ->get();
    }


    public function map($teacher): array
    {
        return [
            $teacher->t_id,
            $teacher->name,
            $teacher->email,
            $teacher->nic,
            optional($teacher->dob)->format('Y-m-d'),
            $teacher->gender,
            $teacher->mobile,
            $teacher->address,
            $teacher->grade?->full_name,
            $teacher->subjects->pluck('name')->implode(', '),
        ];
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
            'grade',
            'subject',
        ];
    }
}
