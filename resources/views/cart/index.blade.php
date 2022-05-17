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


