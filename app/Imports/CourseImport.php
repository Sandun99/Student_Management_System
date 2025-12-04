<?php

namespace App\Imports;

use App\Models\Course;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseImport implements ToCollection , WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {

            $course = Course::where('code', $row['code'])->first();

            if ($course) {
                $course->update([
                    'name' => $row['name'],
                    'category' => $row['category'],
                    'start_date' => $row['start_date'],
                    'duration' => $row['duration'],
                    'price' => $row['price'],
                ]);
            }else{
                Course::create([
                    'name' => $row['name'],
                    'code' => $row['code'],
                    'category' => $row['category'],
                    'start_date' => $row['start_date'],
                    'duration' => $row['duration'],
                    'price' => $row['price'],
                ]);
            }

        }
    }
}
