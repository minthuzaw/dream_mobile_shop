@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Phones / Add New Phone"/>
@endsection
<div class="container">
    <div class="row">
        <div class="col text-center pt-2">
            <form id="add-frm" method="POST" action="{{route('phones.store')}}" enctype="multipart/form-data"
                  class="border p-3 mt-2 col-6 bg-gray-200 mx-auto">
                @csrf
                <input type="hidden" value="{{Auth::id()}}" name="user_id">
                <div class="row row-cols-2">
                    <div class="col">
                        <div class="control-group text-left mb-2">
                            <label for="title">Model<small class="text-danger"> *</small></label>
                            <div>
                                <input type="text" id="model" class="form-control" style="" name="model"
                                       placeholder="Enter Phone Model" value="{{old('model')}}"/>
                                @error('model')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <div class="control-group  text-left mb-2">
                            <label for="body">Name<small class="text-danger"> *</small></label>
                            <div>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="Enter Phone Name" rows="" value="{{old('name')}}"/>
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="control-group  text-left mb-2">
                            <label for="body">Select Brand<small class="text-danger"> *</small></label>
                            <select class="form-control form-select" aria-label="Default select example"
                                    name="brand_id">
                                <option disabled selected>Select Brand</option>
                                @foreach ($brands as $id => $brand)
                                    <option value="{{$id}}">{{$brand}}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="control-group  text-left mb-2">
                            <label for="body">Stock<small class="text-danger"> *</small></label>
                            <div>
                                <input type="number" id="stock" class="form-control" name="stock"
                                       placeholder="Stocks count" rows="" value="{{old('stock')}}"/>
                                @error('stock')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="control-group  text-left mb-2">
                            <label for="body">Price<small class="text-danger"> *</small></label>
                            <div>
                                <input type="number" id="unit_price" class="form-control" name="unit_price"
                                       placeholder="Enter Phone Price" value="{{old('unit_price')}}"/>
                                @error('unit_price')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="control-group text-left mb-2">
                            <label for="image" class="">Select phone Image<small class="text-danger"> *</small></label>
                            <input type="file" name="image" class="form-control-file" id="image">
                            @error('image')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="control-group  text-left mb-2">
                    <label for="body">Select Category<small class="text-danger"> *</small></label>
                    <p style="font-size: 0.6rem">( Hold down the Ctrl (windows) or Command (Mac) button to select multiple options. )</p>
                    <select class="form-control form-select" aria-label="Default select example"
                            name="categories[]" multiple class="w-25">
                        @foreach ($categories as $id => $category)
                            <option value="{{$id}}">{{$category}}</option>
                        @endforeach
                    </select>
                    @error('categories')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="control-group  text-left mb-2">
                    <label for="body">Description<small class="text-danger"> *</small></label>
                    <textarea name="description" id="description" class="form-control" cols="58"
                              rows="5">{{old('description')}}</textarea>
                    @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>

                <div class="control-group  text-center">
                    <button class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

