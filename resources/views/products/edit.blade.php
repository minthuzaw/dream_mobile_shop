@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Prodcuts / {{$phone->name}} / Edit"/>
@endsection
    <div class="row">
        <div class="col pt-2">
            <form id="add-frm" method="POST" action="{{route('phones.update',$phone->id)}}"
                  enctype="multipart/form-data"
                  class="border p-3 mt-2  bg-gray-200 card card-body">
                @csrf
                @method('PUT')
                <div class="row row-cols-2">
                    <div class="col">
                        <div class="control-group text-left">
                            <label for="title">Model</label>
                            <div>
                                <input type="text" id="model" class="form-control mb-4" name="model"
                                       placeholder="Enter Phone Model" value="{!! $phone->model !!}" autofocus required>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="control-group text-left ">
                            <label for="body">Name</label>
                            <div>
                                <input type="text" id="name" class="form-control mb-4" name="name"
                                       placeholder="Enter Phone Name" rows="" value="{!! $phone->name !!}"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="control-group  text-left">
                            <label for="body">Select Brand</label>
                            <select class="form-control form-select" aria-label="Default select example" name="brand_id">
                                <option disabled selected>Select Brand</option>
                                @foreach ($brands as $id => $brand)
                                    <option value="{{$id}}" @if($id == $phone->brand_id) selected @endif>{{$brand}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="control-group text-left ">
                            <label for="body">Stock</label>
                            <div>
                                <input type="number" id="stock" class="form-control mb-4" name="stock"
                                       placeholder="Stocks count" rows="" value="{!! $phone->stock !!}"
                                       required></input>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="control-group text-left">
                            <label for="body">Price</label>
                            <div>
                                <input type="number" id="unit_price" class="form-control mb-4" name="unit_price"
                                       placeholder="Enter Phone Price" rows="" value="{!! $phone->unit_price !!}"
                                       required></input>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="control-group text-left ">
                            <label for="image">Select phone Image</label>
                            <input type="file" name="image" class="form-control-file" id="image">
                            <div>
                                <img src="{{asset('storage/'.$phone->image)}}" class="w-50" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="control-group  text-left">
                    <label for="body">Select Category</label>
                    <p style="font-size: 0.6rem">( Hold down the Ctrl (windows) or Command (Mac) button to select multiple options. )</p>
                    <select class="form-control form-select" aria-label="Default select example"
                            name="category_id[]" multiple class="w-25">
                        @foreach ($categories as $id => $category)
                            <option value="{{$id}}">{{$category}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="control-group  text-left mt-2">
                    <label for="body">Description</label>
                    <div>
                        <textarea name="description" id="description" class="form-control" cols="58"
                                  rows="5">{!! $phone->description !!}</textarea>
                    </div>
                </div>

                <div class="control-group text-center mt-2">
                    <button class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

