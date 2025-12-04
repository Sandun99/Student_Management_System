<?php

namespace App\Imports;

use App\Models\Subject;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class SubjectImport implements ToCollection, WithHeadingRow,skipsEmptyRows
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $subject = Subject::where('sub_Code', $row['sub_code'])->first();
            if($subject){
                $subject->update([
                    'name' => $row['name'],
                ]);
            } else{
                Subject::create([
                    'sub_code' => $row['sub_code'],
                    'name' => $row['name'],
                ]);
            }
        }
    }
}
