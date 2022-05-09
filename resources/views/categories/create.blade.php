@extends('layouts.app')

@section('content')
    <x-page-header header=" "/>
    <div class="container">
	<div class="row">
		<div class="col-12 pt-2">
            <div class="text-left"><a href="{{ route('categories.index') }}" class="btn btn-outline-primary">Categories List</a></div>
            <form method="POST" action="{{ route('categories.store') }}" class="border p-3 mt-2 col-6" enctype="multipart/form-data">
                @csrf
                <div class="control-group text-left">
                    <h1>Add New Categories</h1>
                    <label for="Categories Name">Category Name</label>
                    <input type="text" name="name" class="form-control mb-4" id="CategoriesName"
                           placeholder="Categories name" required>
                </div>
                <button type="submit" class="btn btn-outline-success">Save</button>
            </form>
        </div>
    </div>
    </div>
@endsection

