<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Admin\Category;
use DB;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithStyles;
class CategoryExcel implements FromCollection,WithHeadings,WithMapping,WithEvents,ShouldAutoSize,WithStyles
{
   use RegistersEventListeners;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $data=DB::table("categories")->select('categories_name','added_on')->get();
        return collect($data);
    }
    public function headings(): array
    {
        return [
         
            'Categories',
            'Date',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
           "A1"   => ['font' => ['bold' => true, "family"=>"Arial"]],

            // Styling a specific cell by coordinate.
            "B1"   => ['font' => ['bold' => true, "family"=>"Arial"]],

            // Styling an entire column.
          
        ];
    }


    public function map($data): array
    {
        
        return [
   
            $data->categories_name,
            date("d-F-Y",strtotime($data->added_on)),
      
        ];
    }
      
}
