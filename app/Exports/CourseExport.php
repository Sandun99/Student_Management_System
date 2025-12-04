<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Ramsey\Collection\Collection;

class CourseExport implements FromCollection , WithHeadings , WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return Course::with('subjects')
            ->select(
            'code',
            'name',
            'category',
            'start_date',
            'duration',
            'price')
            ->orderBy('code' , 'asc')
            ->get();
    }

    public function map($course): array
    {
        return [
            $course->code,
            $course->name,
            $course->category,
            $course->start_date?->format('Y-m-d'),
            $course->duration,
            number_format($course->price,2),
            $course->subjects->pluck('name')->implode(', '),
        ];
    }

    public function headings(): array
    {
        return [
            'code',
            'name',
            'category',
            'start_date',
            'duration',
            'price',
            'subjects'
        ];
    }
}
