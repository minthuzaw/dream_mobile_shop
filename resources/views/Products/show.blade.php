@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Prodcuts / {{$phone->name}} / Info"/>
@endsection
<div class="super_container">
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-lg-6 order-lg-3 order-2 bg-gray-100">
                    <img src="{{ asset('storage/'.$phone->image) }}" alt="" class="img-thumbnail">
                </div>
                {{--                <div class="col-lg-4 order-lg-2 order-1">--}}
                {{--                </div>--}}
                <div class="col-lg-6 order-3 ">
                    <div class="product_description">

                        <div class="product_name"><h2>{{$phone->name}}</h2></div>
                        <div class="product_name"><h5>Product By : {{$phone->brand->name}}</h5></div>
                        <div><p style='color:black'>$ {{$phone->unit_price}}<p></div>
                        <hr class="singleline">
                        <div>
                            <div class="row row-underline">
                                <div class="col-md-6"><span class=" deal-text">Specifications</span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"><span class="">{{$phone->description}}</span></div>
                            </div>


                        </div>
                        <hr class="singleline">
                        <div class="product_name"><p>In Stock : {{$phone->stock}} left !</p></div>
                        <div class="product_name"><p>Quantity</p></div>

                        <div class="input-group">
                            <input type="button" value="-" class="button-minus" data-field="quantity">
                            <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field"
                                   style="width: 60px">
                            <input type="button" value="+" class="button-plus" data-field="quantity">
                        </div>
                        <div class="col-xs-6 mt-3">
                            <button type="button" class="btn btn-primary shop-button">Add to Cart</button>
                        </div>
                        <div class="col-xs-6 mt-3">
                            <a href="{{ route('phones.index') }}">
                                <button type="button" class="btn btn-info">
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
