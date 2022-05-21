@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Categories / Add New Category"/>
@endsection
<div class="container">
	<div class="row">
		<div class="col-12 text-center pt-2">
            <form method="POST" action="{{ route('categories.store') }}" class="border p-3 mt-2 col-6 bg-gray-200 mx-auto" enctype="multipart/form-data">
                @csrf
                <div class="control-group text-left">
                    <label for="Categories Name">Category Name</label>
                    <input type="text" name="name" class="form-control mb-4" id="CategoriesName" value="{{ old('name') }}"
                           placeholder="Categories name" required>
                </div>
                <div class="control-group  text-center mt-2">
                    <button class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

