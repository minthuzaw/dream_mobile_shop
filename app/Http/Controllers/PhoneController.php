<?php

namespace App\Http\Controllers;


use App\Exports\PhonesExport;
use App\Http\Requests\PhoneCreateRequest;
use App\Http\Requests\PhoneUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryPhone;
use App\Models\Phone;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class PhoneController extends Controller
{
    // phones.index
    public function index(Request $request){

        if($request->ajax()){
            $phones = Phone::with('brand');

            return DataTables::of($phones)
            ->filterColumn('brand_name', function($query, $search){
                $query->whereHas('brand', function($query) use($search) {
                    $query->where('name', 'LIKE', '%'.$search.'%');
                });
            })
            ->addColumn('action', function($phone){
                $editIcon = '<a href="'. route('phones.edit', $phone->id) .'" class="text-warning" style="font-size: 20px"><i class="far fa-edit"></i></a>';
                $deleteIcon = '<a href="#" class="text-danger delete-btn pl-2" data-id="'.$phone->id.'" style="font-size: 20px"><i class="fas fa-trash-alt"></i></a>';
                $orderIcon = '<a href="#" class="text-info pl-2" data-id="'.$phone->id.'" style="font-size: 20px"><i class="fas fa-shopping-basket"></i></a>';
                $showIcon = '<a href="'. route('phones.show', $phone->id) .'" class="text-info pl-2" data-id="'.$phone->id.'" style="font-size: 20px"><i class="fas fa-info-circle"></i></a>';

                if (auth()->user()->isCashier()) {
                    return '<div class="action-icon">' . $orderIcon . $showIcon .'</div>';
                }
                return '<div class="action-icon">'. $editIcon . $deleteIcon . $showIcon .'</div>';
            })
            ->editColumn('updated_at', function($phone){
                return Carbon::parse($phone->updated_at)->format('Y-m-d H:i:s');
            })
            ->addColumn('brand_name', function ($phone) {
                return $phone->brand ? $phone->brand->name : '-';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $phones = Phone::latest()->filter(request(['search', 'brand']))->get();
        $brands = Brand::all();
        return view('products.index', compact('phones', 'brands'));
    }

    // phones.show
    public function show(Phone $phone){
        return view('products.show', compact('phone'));
    }

    // phones.create
    public function create(){
        $brands = Brand::get()->pluck('name','id');
        $categories = Category::get()->pluck('name','id');
        return view('products.create', compact('brands', 'categories'));
    }

    // phone store
    public function store(PhoneCreateRequest $request){
        $attributes = $request->validated();
        $categories = [];
        foreach ($attributes['categories'] as $category) {
            $categories[] = $category;
        }
        unset($attributes['categories']);
        $attributes['image'] = $request->file('image')->store('images', 'public');
        $phone = Phone::create($attributes);
        foreach ($categories as $category) {
            $phone->categories()->attach($category);
        }

        return redirect()->route('phones.index')->with('success', 'Phone Created Successfully');
    }

    // edit
    public function edit(Phone $phone){
        $brands = Brand::get()->pluck('name','id');
        $categories = Category::get()->pluck('name','id');
        return view('products.edit', compact('phone', 'brands', 'categories'));
    }

    //update
    public function update(PhoneUpdateRequest $request, Phone $phone){
        $attributes = $request->validated();

        if (request()->hasFile('image')){
            Storage::delete('storage/'.$phone->image);
            $attributes['image'] = $request->file('image')->store('images', 'public');
        }

        $phone->update($attributes);

        return redirect()->route('phones.index')->with('updated', 'Phone Updated Successfully');
    }

    // destroy
    public function destroy(Phone $phone){
        $image = $phone->image;
        if($image) {
            Storage::delete($image);
        }
        $phone->delete();
        return 'success';
    }

    public function export()
    {
        return new PhonesExport();
    }

}
