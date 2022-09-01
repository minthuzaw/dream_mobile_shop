<?php

namespace App\Exports;

use App\Models\Phone;
use App\Traits\ExcelHasTimeBasedFilename;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PhonesExport implements FromCollection, WithHeadings, Responsable
{
    use Exportable, ExcelHasTimeBasedFilename;

    public string $fileName = 'phones';

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(): \Illuminate\Support\Collection
    {
        return Phone::select('id', 'model', 'name', 'stock', 'description', 'unit_price')->get();
    }

    public function headings(): array
    {
        return ['id', 'model', 'name', 'stock', 'description', 'unit_price'];
    }
}
