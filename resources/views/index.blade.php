{{-- @dd($brands[0]->name); --}}
@extends('layouts.app')

@section('content')
    {{-- brand filter component  --}}
    <x-brandsFilter :brands="$brands"></x-brandsFilter>

    <x-page-header header="Product"/>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <table class="table mt-3  text-left table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Model</th>
                        <th scope="col">Name</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Price (USD)</th>
                        <th scope="col">Action</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($phones as $phone)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! $phone->model !!}</td>
                            <td>{!! $phone->name !!}</td>
                            <td>{!! $phone->stock !!}</td>
                            <td>${!! $phone->unit_price !!}</td>
                            <td style="display: flex">
                                <a href=""class="btn btn-outline-primary" >Order</a>
                            </td>
                            <td>{{ $phone->created_at?->diffForhumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No products found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>

        @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{session('error')}}",
        })
        @endif

    </script>
@endsection
