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

            $gradeIds = [];
            if (!empty($row['grade'])) {
                foreach (array_map('trim', explode(',', $row['grade'])) as $entry) {
                    if (str_contains($entry, '-')) {
                        [$gradeName, $className] = array_map('trim', explode('-', $entry));
                        $grade = Grade::where('name', $gradeName)
                            ->whereHas('class', fn($q) => $q->where('name', $className))
                            ->first();
                        if ($grade) $gradeIds[] = $grade->id;
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
                ]);

                $teacher->subjects()->sync($subjectIds);
                $teacher->grades()->sync($gradeIds);

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
                ]);

                $teacher->subjects()->sync($subjectIds);
                $teacher->grades()->sync($gradeIds);
            }
        }
    }
}
