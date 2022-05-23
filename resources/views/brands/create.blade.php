@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Brands / Add New Brand"/>
@endsection
<div class="row">
    <div class="col-12 pt-2">
    <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data" class="border p-3 mt-2  bg-gray-200 card card-body">
        @csrf
        <div class="control-group text-left">
            <label for="Brands Name"> Name</label>
            <input type="text" name="name" class="form-control" id="BrandsName" placeholder="Brand name" required>
        </div>

        <div class="control-group text-left mt-2">
            <label for="image" class="">Select brand Image</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>
        <div class="control-group  text-center mt-2">
            <button class="btn btn-success">Add</button>
        </div>
    </form>
    </div>
</div>
@endsection

