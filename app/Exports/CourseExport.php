<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class CourseExport implements FromCollection , WithHeadings
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
        return $this->data->map(function($course){
            return [
                'code' => $course->code,
                'name' => $course->name,
                'category' => $course->category,
                'start_date' => $course->start_date?->format('Y-m-d'),
                'duration' => $course->duration,
                number_format($course->price,2),
                'subjects' => $course->subjects->pluck('name')->implode(', '),
            ];
        });
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
