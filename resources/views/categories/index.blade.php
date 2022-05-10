@extends('layouts.app')

@section('content')
    <x-page-header header="Categories"/>
    <div class="float-right my-3"><a href="{{ route('categories.create') }}" class="btn btn-outline-primary">Add New Categories</a></div>
    <table class="table mt-3 text-left table-hover ">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Categories Name</th>
            <th scope="col">Action</th>
            <th scope="col">Times</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{!! $loop->iteration !!}</td>
                <td>{!! $category->name !!}</td>
                <td style="display: flex">
                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-outline-primary">Edit</a>
                    <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger ml-1">Delete</button>
                    </form>
                </td>
                <td>{{ $category->created_at?->diffForhumans() }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
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

        @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{session('error')}}",
        })
        @endif
    </script>
@endsection


