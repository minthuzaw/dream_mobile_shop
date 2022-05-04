@extends('layouts.app')

@section('content')
    <x-page-header header="Change Products details" />

    <div class="container">
	<div class="row">
		<div class="col-12 text-center pt-2">
			<div class="text-left"><a href="{{ route('demo') }}" class="btn btn-outline-primary">Products List</a></div>
			<form id="add-frm" method="POST" action="{{route('phones.update',$phone->id)}}" class="border p-3 mt-2 col-6">
                @csrf
                @method('PUT')
				<div class="control-group text-left">
					<label for="title">Model</label>
					<div>
						<input type="text" id="model" class="form-control mb-4" name="model"
							placeholder="Enter Phone Model" value="{!! $phone->model !!}" required>
					</div>
				</div>
				<div class="control-group text-left mt-2">
					<label for="body">Name</label>
					<div>
						<input id="name" class="form-control mb-4" name="name"
							placeholder="Enter Phone Name" rows="" value="{!! $phone->name !!}" required></input>
					</div>
				</div>
				<div class="control-group text-left mt-2">
					<label for="body">Stock</label>
					<div>
						<input id="stock" class="form-control mb-4" name="stock"
							placeholder="Stocks count" rows="" value="{!! $phone->stock !!}" required></input>
					</div>
				</div>
				<div class="control-group text-left mt-2">
					<label for="body">Brand Id</label>
					<div>
						<input id="brand_id" class="form-control mb-4" name="brand_id"
							placeholder="Enter Brand ID" rows="" value="{!! $phone->brand_id !!}" required></input>
					</div>
				</div>
                <div class="control-group text-left mt-2">
					<label for="body">Price</label>
					<div>
						<input id="unit_price" class="form-control mb-4" name="unit_price"
							placeholder="Enter Phone Price" rows="" value="{!! $phone->unit_price !!}" required></input>
					</div>
				</div>
				<div class="control-group text-left mt-2">
					<label for="body">Admin ID</label>
					<div>
						<input id="admin_id" class="form-control mb-4" name="admin_id"
							placeholder="Enter Your ID" rows="" value="{!! $phone->admin_id !!}" required></input>
					</div>
				</div>

				<div class="control-group text-center mt-2"><button class="btn btn-success">Save</button></div>
			</form>
		</div>
	</div>
    </div>
@endsection
