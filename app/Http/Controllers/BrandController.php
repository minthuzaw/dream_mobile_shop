<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\File;
use Yajra\Datatables\Datatables;

class BrandController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $brands = Brand::all();

        return view('brands.index', compact('brands'));
    }

    public function ssd(){
        $brands = Brand::query(); //fetching brands

        return Datatables::of($brands)
               ->editColumn('updated_at', function($brand){
                   return Carbon::parse($brand->updated_at)->format('Y-m-d H:i:s');
               })
               ->editColumn('image', function($brand){
                   return '<img src="storage/'. $brand->image .'" alt="" class="brand-thumbnail">';
               })
               ->addColumn('action', function($brand){
                   $edit_icon = '<a href="'.route('brands.edit', $brand->id).'" class="text-warning p-2" style="font-size: 20px"><i class="far fa-edit"></i></a>';
                   $delete_icon = '<a href="#" class="text-danger delete-btn" data-id="'.$brand->id.'" style="font-size: 20px"><i class="fas fa-trash-alt"></i></a>';
                   

                   return '<div class="action-icon">' . $edit_icon . $delete_icon .'</div>';    
                })
               ->rawColumns(['image','action'])
               ->make(true);
    }

    //create
    public function create(){
        return view('brands.create');
    }
    //store
    public function store(){
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

        $brand->update($data);
        return redirect()->route('brands.index');
    }
    //delete

    public function destroy(Brand $brand){
        $brand->delete();

        return 'success';
    }


}
