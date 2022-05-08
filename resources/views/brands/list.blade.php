@extends('layouts.app')

@section('content')
    <x-page-header header=" "/>
        <div class="card" style="width: 18rem;">
            @foreach($brands as $brand)
                <img src="{{asset('storage/'.$brand->image)}}" class="card-img-top" alt="...">
                <div class="card-title">
                    <h5 class="card-title text-center">{!! ucwords($brand->name) !!}</h5>

                    <div class="footer" style="display: flex">
                        <a href="{{ route('brands.edit',$brand->id) }}">
                            <button class="btn btn-outline-primary">Edit</button>
                        </a>
                        <form action="{{ route('brands.destroy',$brand->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger ml-1">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
@endsection


