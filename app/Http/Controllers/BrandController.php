<?php

namespace App\Http\Controllers;

use App\Exports\BrandsExport;
use App\Http\Requests\BrandCreateRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\File;
use Yajra\Datatables\Datatables;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $brands = Brand::query(); //fetching brands

            return Datatables::of($brands)
                ->editColumn('updated_at', function($brand){
                    return Carbon::parse($brand->updated_at)->format('Y-m-d');
                })
                ->editColumn('image', function($brand){
                    return '<img src="storage/'. $brand->image .'" alt="" style="width: 20%;height: 20%">';
                })
                ->addColumn('action', function($brand){
                    $editIcon = '<a href="'.route('brands.edit', $brand->id).'" class="text-warning p-2" style="font-size: 20px"><i class="far fa-edit"></i></a>';
                    $deleteIcon = '<a href="#" class="text-danger " id="delete" data-id="'.$brand->id.'" style="font-size: 20px"><i class="fas fa-trash-alt"></i></a>';

                    return '<div class="action-icon">' . $editIcon . $deleteIcon .'</div>';
                    })
                ->rawColumns(['image','action'])
                ->make(true);
        }

        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    //create
    public function create(){
        return view('brands.create');
    }
    //store
    public function store(BrandCreateRequest $request){

        $attributes = $request->validated();
        $attributes['image'] = $request->file('image')->store('images', 'public');

        Brand::create($attributes);

        return redirect()->route('brands.index')->with('success', 'Brand Created Successfully');
    }



    // edit
    public function edit(Brand $brand){
        return view('brands.edit', compact('brand'));
    }
    //update
    public function update(Brand $brand, BrandUpdateRequest $request){

        $attributes = $request->validated();

        if (request()->hasFile('image')){

            Storage::delete('storage/'.$brand->image);
            $attributes['image'] = $request->file('image')->store('images', 'public');

        }

        $brand->update($attributes);
        return redirect()->route('brands.index')->with('updated', 'Brand Updated Successfully');
    }
    //delete

    public function destroy(Brand $brand){
        $image = $brand->image;
        if($image) {
            Storage::delete($image);
        }
        $brand->delete();
        return 'success';
    }

    public function export()
    {
        return new BrandsExport();
    }


}
