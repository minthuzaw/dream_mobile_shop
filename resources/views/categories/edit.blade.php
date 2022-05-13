@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Categories / {{$category->name}} / Edit"/>
@endsection
<div class="container">
	<div class="row">
		<div class="col-12 pt-2">
            <form method="POST" action="{{ route('categories.update',$category->id) }}" class="border p-3 mt-2 col-6" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="control-group text-left">
                    <label for="Categories Name">Category Name</label>
                    <input type="text" name="name" class="form-control mb-4" id="CategoriesName"
                           placeholder="Categories name" value="{!! $category->name !!}" required>
                </div>
                <div class="control-group  text-center mt-2">
                    <button class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

