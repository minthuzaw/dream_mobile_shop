<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    //show
    public function index(Request $request){

        if($request->ajax()){
            $categories = Category::query(); //fetching brands

            return DataTables::of($categories)
                ->editColumn('updated_at', function($category){
                    return Carbon::parse($category->updated_at)->format('Y-m-d');
                })
                ->addColumn('action', function($category){
                    $editIcon = '<a href="'. route('categories.edit', $category->id) .'" class="text-warning p-2" style="font-size: 20px"><i class="far fa-edit"></i></a>';
                    $deleteIcon = '<a href="#" class="text-danger p-2 delete-btn" style="font-size: 20px" data-id="'.$category->id.'"><i class="fas fa-trash-alt"></i></a>';

                    return '<div class="action-icon">' . $editIcon . $deleteIcon .'</div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }
    //create
    public function create(){
        return view('categories.create');
    }
    // phone store
    public function store(Request $request){
        $attributes = $request->validate([
            'name'=>'required'
        ]);
        Category::create($attributes);
        return redirect()->route('categories.index')->with('success', 'Category Created Successfully');
    }
    // edit
    public function edit(Category $category){
        return view('categories.edit', compact('category'));
    }
    //update
    public function update(Request $request, Category $category){
        $attributes = $request->validate([
            'name'=>'required'
        ]);

        $category->update($attributes);

        return redirect()->route('categories.index')->with('updated', 'Category Updated Successfully');
    }

    // destroy
    public function destroy(Category $category){
        $category->delete();
        return 'success';
    }
}
