<?php

namespace App\Imports;

use App\Models\Classes;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClassesImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $classes = Classes::where('code', $row['code'])->first();
            if($classes){
                $classes->update([
                    'name' => $row['name'],
                ]);
            } else{
                Classes::create([
                    'code' => $row['code'],
                    'name' => $row['name'],
                ]);
            }
        }
    }
}
