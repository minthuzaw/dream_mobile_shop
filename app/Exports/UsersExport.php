<?php

namespace App\Exports;

use App\Models\User;
use App\Traits\ExcelHasTimeBasedFilename;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings, Responsable
{
    use Exportable, ExcelHasTimeBasedFilename;

    public string $fileName = 'users';

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('id', 'name', 'email', 'phone_number', 'role')->get();
    }

    public function headings(): array
    {
        return ['id', 'name', 'email', 'phone_number', 'role'];
    }
}
