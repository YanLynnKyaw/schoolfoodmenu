<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromArray, WithHeadings
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        // Define the column headers
        return [
            'id',
            'food_menu',
            'food_price',
            'created_at',
            'updated_at',
            'category',
            // ... Add more columns as needed
        ];
    }
}
