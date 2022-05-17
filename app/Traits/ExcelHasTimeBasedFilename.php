<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

Trait ExcelHasTimeBasedFilename
{
    public function __construct()
    {
        $now = Carbon::now();
        $this->fileName = "$this->fileName-$now.xlsx";
    }
}
