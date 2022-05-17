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
        $order = Order::findOrFail($id);
        $order_phones = OrderPhone::where('order_id', $id)->get();
        foreach ($order_phones as $order_phone) {
            $order_phone->phone = Phone::findOrFail($order_phone->phone_id);
        }
        return view('invoice',compact('order','order_phones'));
    }
}
