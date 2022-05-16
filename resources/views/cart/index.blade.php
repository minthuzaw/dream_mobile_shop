@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Cart"/>
@endsection
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <livewire:cart></livewire:cart>
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


