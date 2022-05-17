<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPhone extends Model
{
    use HasFactory;
    protected $table = 'order_phone';
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function phones(){
        return $this->belongsToMany(Phone::class);
    }
}
