@extends('layouts.app')
@section('content')
@section('header')

    <x-page-header header="Employee / {{Auth::user()->name}} / Profile"/>

@endsection

<div class="row justify-content-md-center">
    <div class="col-md-auto">
        <div class="card bg-gray-200">
            <div class="card-title text-center"><br>
                <img class="img-profile rounded-circle"
                     src="https://www.gravatar.com/avatar"
                     style="width: 50px; height: 50px"
                ><br>
                {{ucwords(Auth::user()->name)}} Profile
                <hr>
            </div>
            <div class="card-body ">
                <span>Name : </span> {{ \Auth::user()->name }}<br>
                <span>Email : </span> {{ \Auth::user()->email }}<br>
                <span>Phone Number : </span> {{ \Auth::user()->phone_number }}<br>
                <span>Role : </span><span class="badge badge-info"> {{ \Auth::user()->role }}</span><br>
                <hr>
                <a href="{{route('phones.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection
