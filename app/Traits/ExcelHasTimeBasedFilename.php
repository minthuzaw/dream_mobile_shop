<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait ExcelHasTimeBasedFilename
{
    public function __construct()
    {
        $now = Carbon::now();
        $this->fileName = "$this->fileName-$now.xlsx";
    }
}
