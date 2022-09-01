<?php

namespace App\Exports;

use App\Models\Brand;
use App\Traits\ExcelHasTimeBasedFilename;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BrandsExport implements FromCollection, WithHeadings, Responsable
{
    use Exportable, ExcelHasTimeBasedFilename;

    public string $fileName = 'brands';

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Brand::select('id', 'name')->get();
    }

    public function headings(): array
    {
        return ['id', 'name'];
    }
}
