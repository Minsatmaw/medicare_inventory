<?php

namespace App\Exports;

use App\Models\ItemStock;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ItemStockExport implements FromCollection , WithMapping, WithHeadings, WithStrictNullComparison, ShouldAutoSize
{


    public function headings(): array
    {
        return [
            '#',
            'Item',
            'Item Category',
            'Department',
            'Location',
            'Supplier',
            'Stock',
        ];
    }
     /**
    * @param ItemStock $itemStock
    */
    public function map($itemStock): array
    {
        static $i = 1;
        return [
            $i++,
            $itemStock->item->name,
            $itemStock->item->itemcategory->name ,
            $itemStock->item->department->name,
            $itemStock->item->location->name,
            $itemStock->item->supplier->name,
            $itemStock->stock,
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ItemStock::all();
    }
}
