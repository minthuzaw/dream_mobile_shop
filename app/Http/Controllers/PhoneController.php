<?php

namespace App\Http\Controllers;


use App\Http\Requests\PhoneCreateRequest;
use App\Http\Requests\PhoneUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Phone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PhoneController extends Controller
{
    // phones.index
    public function index(){

        $phones = Phone::latest()->filter(request(['search', 'brand']))->get();
        $brands = Brand::all();
        return view('products.index', compact('phones', 'brands'));
    }

    public function ssd(){
        $phones = Phone::with('brand');
        
        return DataTables::of($phones)
        ->filterColumn('brand_name', function($query, $search){
            $query->whereHas('brand', function($query) use($search) {
                $query->where('title', 'LIKE', '%'.$search.'%');
            });
        })
        ->addColumn('action', function($phone){
            $edit_icon = '<a href="'. route('phones.edit', $phone->id) .'" class="text-warning p-2" style="font-size: 20px"><i class="far fa-edit"></i></a>';
            $delete_icon = '<a href="#" class="text-danger delete-btn" data-id="'.$phone->id.'" style="font-size: 20px"><i class="fas fa-trash-alt"></i></a>';
            return '<div class="action-icon">'. $edit_icon . $delete_icon .'</div>';
        })
        ->editColumn('updated_at', function($phone){
            return Carbon::parse($phone->updated_at)->format('Y-m-d H:i:s');
        })
        ->editColumn('image', function($phone){
            return '<img src="storage/'. $phone->image .'" alt="" class="brand-thumbnail">';
        })
        ->addColumn('brand_name', function ($phone) {
            return $phone->brand ? $phone->brand->name : '-';
        })
        ->rawColumns(['action', 'image'])
        ->make(true);
    }

    // phones.create
    public function create(){
        $brands = Brand::get()->pluck('name','id');
        return view('products.create', compact('brands'));
    }

    // phone store

    public function store(PhoneCreateRequest $request){
        $attributes = $request->validated();

        Phone::create($attributes + [
            'user_id' => auth()->id()
        ]);
        return redirect()->route('phones.index')->with('success', 'Phone Created Successfully');
    }

    // edit
    public function edit(Phone $phone){
        $brands = Brand::get()->pluck('name','id');
//        $categories = Category::get()->pluck('name','id');
        return view('products.edit', compact('phone', 'brands'));
    }

    //update
    public function update(PhoneUpdateRequest $request, Phone $phone){
        $attributes = $request->validated();

        $phone->update($attributes);

        return redirect()->route('phones.index')->with('updated', 'Phone Updated Successfully');
    }

    // destroy
    public function destroy(Phone $phone){

        $phone->delete();
        return 'success';
    }

}
