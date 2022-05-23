@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Prodcuts / {{$phone->name}} / Info"/>
@endsection
<div class="super_container">
    <div class="card card-body">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-lg-6 order-lg-3 order-2">
                    <img src="{{ asset('storage/'.$phone->image) }}" alt="" class="img-thumbnail" style="width: 100%; height: 100%">
                </div>
                <div class="col-lg-6 order-3 ">
                    <div class="product_description">

                        <div class="product_name"><h3>{{$phone->name}}</h3></div>
                        <div class="product_name"><h5>Product By : {{$phone->brand->name}}</h5></div>
                        <div><p style='color:black'>{{$phone->unit_price}}<p></div>
                        <hr class="singleline">
                        <div>
                            <div class="row">
                                <div class="col"><span class="">{!!$phone->description!!}</span></div>
                            </div>


                        </div>
                        <hr class="singleline">
                        {{--<div class="product_name"><p>Quantity</p></div>

                        <div class="input-group">
                            <input type="button" value="-" class="button-minus" data-field="quantity">
                            <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field"
                                   style="width: 60px">
                            <input type="button" value="+" class="button-plus" data-field="quantity">
                        </div>--}}
                        <div class="col-xs-6 mt-3">
                            <a href="{{ route('phones.edit',$phone->id) }}" style="text-decoration: none">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a>
                            <a href="{{ route('phones.index') }}">
                                <button type="button" class="btn btn-info">Back</button>
                            </a>
                        </div>
                        <div class="col-xs-6 mt-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
