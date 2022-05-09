<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Phone;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index(){
        $phones = Phone::latest()->filter(request(['search', 'brand']))->get();
        $brands = Brand::all();
        return view('index', compact('phones', 'brands'));
    }
}
