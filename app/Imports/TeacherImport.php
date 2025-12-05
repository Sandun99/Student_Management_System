<?php

namespace App\Imports;

use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Classes;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeacherImport implements ToCollection ,WithHeadingRow
{
    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            // Skip empty rows
            if (empty($row['t_id'])) {
                continue;
            }

            $grade = null;
            if (!empty($row['grade'])) {
                $gradeParts = explode('-', trim($row['grade']));
                if (count($gradeParts) === 2) {
                    $gradeName = trim($gradeParts[0]);
                    $className = trim($gradeParts[1]);

                    if ($gradeName && $className) {
                        $class = Classes::where('name', $className)->first();
                        if ($class) {
                            $grade = Grade::where('name', $gradeName)
                                ->where('class_id', $class->id)
                                ->first();
                        }
                    }
                }
            }

            // Find subjects by name (handle comma-separated list)
            $subjectIds = [];
            if (!empty($row['subject'])) {
                $subjectNames = explode(',', trim($row['subject']));
                foreach ($subjectNames as $subjectName) {
                    $subjectName = trim($subjectName);
                    if ($subjectName) {
                        $subject = Subject::where('name', $subjectName)->first();
                        if ($subject) {
                            $subjectIds[] = $subject->id;
                        }
                    }
                }
            }

            $teacher = Teacher::where('t_id', $row['t_id'])->first();

            if($teacher){
                $teacher->update([
                    'name' => $row['name'] ?? $teacher->name,
                    'email' => $row['email'] ?? $teacher->email,
                    'nic' => $row['nic'] ?? $teacher->nic,
                    'dob' => $row['dob'] ?? $teacher->dob,
                    'gender' => $row['gender'] ?? $teacher->gender,
                    'mobile' => $row['mobile'] ?? $teacher->mobile,
                    'address' => $row['address'] ?? $teacher->address,
                    'grade_id' => $grade ? $grade->id : $teacher->grade_id,
                ]);

                $teacher->subjects()->sync($subjectIds);

            }else{
                $teacher = Teacher::create([
                    'name' => $row['name'],
                    't_id' => $row['t_id'],
                    'email' => $row['email'],
                    'nic' => $row['nic'],
                    'dob' => $row['dob'] ?? null,
                    'gender' => $row['gender'],
                    'mobile' => $row['mobile'],
                    'address' => $row['address'] ?? null,
                    'grade_id' => $grade ? $grade->id : null,
                ]);

                $teacher->subjects()->sync($subjectIds);
            }
        }
    }
}
