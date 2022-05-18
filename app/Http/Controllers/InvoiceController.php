<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderPhone;
use App\Models\Phone;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoice($id)
    {
        $order = Order::with(['phones.brand'])->where('id',$id)->first();
        return view('invoice',compact('order'));
    }
}
