<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection,  WithHeadings
{

    public function collection()
    {
        return Product::all([
            'id',
            'name',
            'description',
            'price',
            'image',
            'category_id',
            'created_at',
            'updated_at'
        ]);
    }
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Description',
            'Price',
            'Image',
            'Category ID',
            'Created At',
            'Updated At',
        ];
    }
}
