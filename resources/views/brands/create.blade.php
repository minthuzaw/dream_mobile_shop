@extends('layouts.app')

@section('content')
    <x-page-header header=" "/>
    <div class="text-left"><a href="{{ route('brands.index') }}" class="btn btn-outline-primary">Brands List</a></div>

    <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <h1>Add New Brands</h1>
            <label for="Brands Name" class="col-md-4 col-lg-3 col-form-label"> Name</label>
            <input type="text" name="name" class="col-md-4 col-lg-3 form-control" id="BrandsName" placeholder="Brand name" required>
        </div>

        <div class="mb-3 mx-1 row">
            <label for="image" class="col-md-4 col-form-label">Select brand Image</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>
            <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection

