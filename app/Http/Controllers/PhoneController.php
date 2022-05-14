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
                $edit_icon = '<a href="'. route('phones.edit', $phone->id) .'" class="text-warning" style="font-size: 20px"><i class="far fa-edit"></i></a>';
                $delete_icon = '<a href="#" class="text-danger delete-btn pl-2" data-id="'.$phone->id.'" style="font-size: 20px"><i class="fas fa-trash-alt"></i></a>';
                $order_icon = '<a href="#" class="text-info pl-2" data-id="'.$phone->id.'" style="font-size: 20px"><i class="fas fa-shopping-basket"></i></a>';
                $show_icon = '<a href="'. route('phones.show', $phone->id) .'" class="text-info pl-2" data-id="'.$phone->id.'" style="font-size: 20px"><i class="fas fa-info-circle"></i></a>';

                if (auth()->user()->isCashier()) {
                    return '<div class="action-icon">' . $order_icon . $show_icon .'</div>';
                }
                return '<div class="action-icon">'. $edit_icon . $delete_icon . $show_icon .'</div>';
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

        return view('products.show', compact('phone', ));
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
