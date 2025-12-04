<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\Subject;
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
                    'price' => (float) str_replace([',', ' '], '', $row['price']),
                ]);
            }else{
                $course = Course::create([
                    'name' => $row['name'],
                    'code' => $row['code'],
                    'category' => $row['category'],
                    'start_date' => $row['start_date'],
                    'duration' => $row['duration'],
                    'price' => (float) str_replace([',', ' '], '', $row['price']),
                ]);
            }
            if (!empty($row['subjects'])) {
                $subjectNames = explode(',', $row['subjects']);
                $subjectIds = [];

                foreach ($subjectNames as $subjectName) {
                    $subjectName = trim($subjectName);
                    if (!empty($subjectName)) {

                        $newCode = 'SB/' . strtoupper($subjectName);

                        $subject = Subject::firstOrCreate(
                            ['name' => $subjectName],
                            ['sub_code' => $newCode]
                        );
                        $subjectIds[] = $subject->id;
                    }
                }

                $course->subjects()->sync($subjectIds);
            }
        }
    }
}
