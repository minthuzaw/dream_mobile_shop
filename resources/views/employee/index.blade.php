@extends('layouts.app')

@section('content')
    <x-page-header header="Employee List"/>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <table class="table mt-3  text-left table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! $user->name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td>{!! $user->phone_number !!}</td>
                            <td>{!! $user->role !!}</td>
                            <td style="display: flex">
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-outline-primary" >Edit</a>

                                <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger ml-1">Delete</button>
                                </form>
                            </td>
                            <td>{{ $user->created_at?->diffForhumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
