@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Brands / {{$brand->name}} / Edit"/>
@endsection
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
    <form method="POST" action="{{ route('brands.update',$brand->id) }}" enctype="multipart/form-data" class="border p-3 mt-2 col-6 bg-gray-200 mx-auto">
        @csrf
        @method('PUT')
        <div class="control-group text-left">
        <label for="Brands Name"> Name</label>
            <input type="text" name="name" class="col-md-4 col-lg-3 form-control" id="BrandsName" placeholder="Brand name" value="{!! $brand->name !!}" required>
        </div>

        <div class="control-group text-left mt-2">
            <label for="image">Select brand Image</label>
            <input type="file" name="image" class="form-control-file" id="image">
            <div>
                <img src="{{asset('storage/'.$brand->image)}}" class="w-50" alt="">
            </div>
        </div>
        <div class="control-group  text-center mt-2">
            <button class="btn btn-success">Update</button>
        </div>
    </form>
@endsection

