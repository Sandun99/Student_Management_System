<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Classes;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToCollection , WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {

            $course = Course::where('name', $row['course'])->first();

            $grade = null;
            if (!empty($row['grade'])) {
                $gradeParts = explode('-', trim($row['grade']));
                $gradeName = trim($gradeParts[0] ?? '');
                $className = trim($gradeParts[1] ?? '');

                if ($gradeName && $className) {
                    $class = Classes::where('name', $className)->first();
                    if ($class) {
                        $grade = Grade::where('name', $gradeName)
                            ->where('class_id', $class->id)
                            ->first();
                    }
                }
            }

            $student = Student::where('reg_no', $row['reg_no'])->first();
            if ($student) {
                $student->update([
                    'name' => $row['name'],
                    'dob' => $row['dob'],
                    'nic' => $row['nic'],
                    'gender' => $row['gender'],
                    'mobile' => $row['mobile'],
                    'address' => $row['address'],
                    'email' => $row['email'],
                    'grade_id' => $grade?->id,
                    'course_id' => $course?->id,
                ]);
            }else{
                Student::create([
                    'name' => $row['name'],
                    'reg_no' => $row['reg_no'],
                    'dob' => $row['dob'],
                    'nic' => $row['nic'],
                    'gender' => $row['gender'],
                    'mobile' => $row['mobile'],
                    'address' => $row['address'],
                    'email' => $row['email'],
                    'grade_id' => $grade?->id,
                    'course_id' => $course?->id,
                ]);
            }
        }
    }
}
