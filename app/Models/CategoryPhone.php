<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryPhone extends Pivot
{
    use HasFactory;
    protected $table = 'category_phone';
    public function categories()
    {
        return $this->belongsToMany(Phone::class);
    }
    public function phones(){
        return $this->belongsToMany(Category::class);
    }
}
