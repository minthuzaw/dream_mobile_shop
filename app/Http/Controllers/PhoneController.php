<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    //show list
    public function index(){
        $phones=Phone::all();
        return view('demo',['phones'=>$phones]);
    }
    //create and store
    public function create(){
        return view('Products.create');
    }
    public function store(Request $request){
        $newProduct=Phone::create([
            'model'=>$request->model,
            'name'=>$request->name,
            'stock'=>$request->stock,
            'brand_id'=>$request->brand_id,
            'unit_price'=>$request->unit_price,
            'admin_id'=>$request->admin_id
        ]);
        return redirect()->route('demo');
    }
    //edit and update
    public function edit(Phone $phone){
        return view('Products.edit',[
            'phone'=>$phone
        ]);
    }
    public function update(Phone $phone, Request $request){
        $phone->update([
            'model'=>$request->model,
            'name'=>$request->name,
            'stock'=>$request->stock,
            'brand_id'=>$request->brand_id,
            'unit_price'=>$request->unit_price,
            'admin_id'=>$request->admin_id
        ]);
        return redirect()->route('demo');
    }
    //delete
    public function destroy(Phone $phone){
        $phone->delete();
        return redirect()->route('demo');
    }

}
