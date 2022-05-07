@extends('layouts.app')

@section('content')
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
                            <td>{!! $phone->unit_price !!}</td>
                            <td style="display: flex">
                                <a href="{{route('phones.edit',$phone->id)}}"class="btn btn-outline-primary" >Edit</a>

                                <form action="{{route('phones.destroy',$phone->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger ml-1">Delete</button>
                                </form>
                            </td>
                            <td>{{ $phone->created_at->diffForhumans() }}</td>
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

		@if (session('success'))
		Swal.fire({
            icon: 'success',
            title: 'Good Job',
            text: "{{session('success')}}",
            })
		@endif

        @if (session('deleted'))
		Swal.fire({
            icon: 'success',
            title: 'Deleted',
            text: "{{session('deleted')}}",
            })
		@endif

        @if (session('updated'))
		Swal.fire({
            icon: 'success',
            title: 'Updated',
            text: "{{session('updated')}}",
            })
		@endif
	</script>
@endsection