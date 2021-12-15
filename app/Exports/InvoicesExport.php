<?php

namespace App\Exports;

use App\Http\Resources\InvoicesResource;
use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class InvoicesExport implements FromCollection, WithHeadings, WithMultipleSheets 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return Invoice::all();  
    }

    public function headings(): array
    {
        return [
            'Cliente',
            'Valor',
            'Celular',
        ];
    }

   
}
