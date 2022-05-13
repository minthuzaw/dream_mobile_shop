<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPhone extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
    public function phone(){
        return $this->belongsToMany(Phone::class);
    }
}
