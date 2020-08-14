<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;


use App\ExcelFile;

class ExcelImport implements ToCollection, WithHeadingRow, WithValidation
{
  use SkipsFailures;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
          
        foreach ($collection as $row) 
        {
            ExcelFile::create([
           'data_id'     	=> $row['data_id'],
           'building_name'  => $row['building_name'],
           'floor_number'   => $row['floor_number'],
           'room_number'    => $row['room_number'], 
           'capacity'    	=> $row['capacity'], 
            ]);
        }	
    }

    public function rules(): array
    {
    return [
        'data_id' => 'required|unique:excel_files,data_id',
    ];
    }
}
