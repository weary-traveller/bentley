<?php

namespace App\Exports;

use App\ExcelFile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExcelFile::all();    	
    }

    public function headings(): array
    {
        return [
            'Data ID',
            'Building Name',
            'Floor Number',
            'Room Number',
            'Capacity',
        ];
    }
}
