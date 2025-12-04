<?php

namespace App\Imports;

use App\Models\Student;
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
                ]);
            }
        }
    }
}
