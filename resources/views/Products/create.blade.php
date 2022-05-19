@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Phones / Add New Phone"/>
@endsection
<div class="container">
    <div class="row">
        <div class="col text-center pt-2">
            <form id="add-frm" method="POST" action="{{route('phones.store')}}" enctype="multipart/form-data"
                  class="border p-3 mt-2 col-6 bg-gray-200">
                @csrf
                <div class="row row-cols-2">
                    <div class="col">
                        <div class="control-group text-left">
                            <label for="title">Model</label>
                            <div>
                                <input type="text" id="model" class="form-control mb-4" style="" name="model"
                                       placeholder="Enter Phone Model"/>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="control-group  text-left">
                            <label for="body">Name</label>
                            <div>
                                <input type="text" id="name" class="form-control mb-4" name="name"
                                       placeholder="Enter Phone Name" rows=""/>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="control-group  text-left">
                            <label for="body">Stock</label>
                            <div>
                                <input type="number" id="stock" class="form-control mb-4" name="stock"
                                       placeholder="Stocks count" rows=""/>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="control-group text-left">
                            <label for="image" class="">Select phone Image</label>
                            <input type="file" name="image" class="form-control-file" id="image">
                        </div>
                    </div>
                </div>
                <div class="control-group  text-left ">
                    <label for="body">Select Brand</label>
                    <select class="form-control form-select" aria-label="Default select example"
                            name="brand_id">
                        <option disabled selected>Select Brand</option>
                        @foreach ($brands as $id => $brand)
                            <option value="{{$id}}">{{$brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="control-group  text-left ">
                    <label for="body">Price</label>
                    <div>
                        <input type="number" id="unit_price" class="form-control mb-4" name="unit_price"
                               placeholder="Enter Phone Price"/>
                    </div>
                </div>

                <div class="control-group  text-left mt-2">
                    <label for="body">Description</label>
                    <div>
                        <textarea name="description" id="description" class="form-control" cols="58"
                                  rows="5"></textarea>
                    </div>
                </div>

                <div class="control-group  text-center mt-2">
                    <button class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

