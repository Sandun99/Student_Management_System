<?php

namespace App\Imports;

use App\Models\Grade;
use App\Models\Classes;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GradeImport implements ToCollection, WithHeadingRow
{
    public function collection($rows)
    {
        foreach ($rows as $row)
        {

            $full    = trim($row['full_name']);
            $parts   = explode('-', $full);
            $number  = trim($parts[0] ?? '');
            $letter  = trim($parts[1] ?? '');

            $class = Classes::where('name', $letter)->first();

            $grade = Grade::where('code', $row['code'])->first();

            if ($grade) {
                $grade->update([
                    'name'     => $number,
                    'class_id' => $class?->id,
                ]);
            } else {
                Grade::create([
                    'code'     => $row['code'],
                    'name'     => $number,
                    'class_id' => $class?->id,
                ]);
            }
        }
    }
}
