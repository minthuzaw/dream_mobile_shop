<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //show
    public function index(){
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
        return back()->with('deleted', 'Deleted Successfully');
    }
}
