<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\File;

class BrandController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $brands = Brand::all();

        return view('brands.list', compact('brands'));
    }
    //create
    public function create(){
        return view('brands.create');
    }
    //store
    public function store(){
//        request()->file('image')->store('images', 'public');
//        return 'Done';
        $data = request()->validate([
                'name' => 'required',
                'image' => ['required', 'image']
        ]);
        $imgPath = request('image')->store('images', 'public');
        Brand::create([
            'name'=>$data['name'],
            'image'=>$imgPath,
        ]);

        return redirect()->route('brands.index');
    }
    // edit
    public function edit(Brand $brand){
        return view('brands.edit', compact('brand'));
    }
    //update
    public function update(Brand $brand, Request $request){
        $data = request()->validate([
                'name' => 'required',
                'image' => ['required', 'image']
        ]);

        if (request()->hasFile('image')){
            Storage::delete('storage/'.$brand->image);
            $data['image'] = request()->file('image')->store('images', 'public');
        }
//        if(isset($data['image'])){
//            $data['image'] = request('image')->store('images', 'public');
//        }
        $brand->update($data);
        return redirect()->route('brands.index');
    }
    //delete
    public function destroy(Brand $brand){
        $brand->delete();
        return back();
    }
}
