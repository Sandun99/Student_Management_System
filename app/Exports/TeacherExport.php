<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class TeacherExport implements FromCollection , WithHeadings
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
        return $this->data->map(function ($teacher) {
            return [
                't_id' => $teacher->t_id,
                'name' => $teacher->name,
                'email' => $teacher->email,
                'nic' => " " . $teacher->nic,
                optional($teacher->dob)->format('Y-m-d'),
                'gender' => $teacher->gender,
                'mobile' => $teacher->mobile,
                'address' => $teacher->address,
                'subjects' => $teacher->subjects->pluck('name')->implode(', '),
                'grades' => $teacher->grades->pluck('full_name')->implode(', '),
            ];
        });
    }


//    public function map($teacher): array
//    {
//
//        $grades = $teacher->grades->pluck('full_name')->implode(', ');
//
//        $subjects = $teacher->subjects->pluck('name')->implode(', ');
//
//        return [
//            $teacher->t_id,
//            $teacher->name,
//            $teacher->email,
//            " " . $teacher->nic,
//            optional($teacher->dob)->format('Y-m-d'),
//            $teacher->gender,
//            $teacher->mobile,
//            $teacher->address,
//            $grades,
//            $subjects,
//        ];
//    }

    public function headings(): array
    {
        return [
            't_id',
            'name',
            'email',
            'nic',
            'dob',
            'gender',
            'mobile',
            'address',
            'grades',
            'subject',
        ];
    }
}
