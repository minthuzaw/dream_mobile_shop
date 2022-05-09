<?php

namespace App\Http\Controllers;

use App\Http\Requests\phoneCreateRequest;
use App\Http\Requests\phoneUpdateRequest;
use App\Models\Brand;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    // phones.index
    public function index(){

        $phones = Phone::latest()->filter(request(['search', 'brand']))->get();
        $brands = Brand::all();
        return view('products.index', compact('phones', 'brands'));
    }

    // phones.create
    public function create(){
        $brands = Brand::get()->pluck('name','id');
        return view('products.create', compact('brands'));
    }

    // phone store
    public function store(phoneCreateRequest $request){
        $attributes = $request->validated();

        Phone::create($attributes + [
            'user_id' => auth()->id()
        ]);

        return redirect()->route('phones.index')->with('success', 'Phone Created Successfully');
    }

    // edit
    public function edit(Phone $phone){
        $brands = Brand::get()->pluck('name','id');
        return view('products.edit', compact('phone', 'brands'));
    }

    //update
    public function update(phoneUpdateRequest $request, Phone $phone){
        $attributes = $request->validated();

        $phone->update($attributes);

        return redirect()->route('phones.index')->with('updated', 'Phone Updated Successfully');
    }

    // destroy
    public function destroy(Phone $phone){

        $phone->delete();
        return back()->with('deleted', 'Deleted Successfully');
    }

}
