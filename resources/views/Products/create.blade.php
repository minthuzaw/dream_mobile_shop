@extends('layouts.app')

@section('content')
    <x-page-header header="Add new products" />

    <div class="container">
	<div class="row">
		<div class="col-12 text-center pt-2">
			<div class="text-left"><a href="{{ route('demo') }}" class="btn btn-outline-primary">Products List</a></div>
			<form id="add-frm" method="POST" action="{{route('phones.store')}}" class="border p-3 mt-2 col-6">
                @csrf
				<div class="control-group text-left">
					<label for="title">Model</label>
					<div>
						<input type="text" id="model" class="form-control mb-4" name="model"
							placeholder="Enter Phone Model" required>
					</div>
				</div>
				<div class="control-group  text-left mt-2">
					<label for="body">Name</label>
					<div>
						<input id="name" class="form-control mb-4" name="name"
							placeholder="Enter Phone Name" rows="" required></input>
					</div>
				</div>
				<div class="control-group  text-left mt-2">
					<label for="body">Stock</label>
					<div>
						<input id="stock" class="form-control mb-4" name="stock"
							placeholder="Stocks count" rows="" required></input>
					</div>
				</div>
				<div class="control-group  text-left mt-2">
					<label for="body">Brand Id</label>
					<div>
						<input id="brand_id" class="form-control mb-4" name="brand_id"
							placeholder="Enter Brand ID" rows="" required></input>
					</div>
				</div>
                <div class="control-group  text-left mt-2">
					<label for="body">Price</label>
					<div>
						<input id="unit_price" class="form-control mb-4" name="unit_price"
							placeholder="Enter Phone Price" rows="" required></input>
					</div>
				</div>
				<div class="control-group  text-left mt-2">
					<label for="body">Admin ID</label>
					<div>
						<input id="admin_id" class="form-control mb-4" name="admin_id"
							placeholder="Enter Your ID" rows="" required></input>
					</div>
				</div>

				<div class="control-group  text-center mt-2"><button class="btn btn-success">Save</button></div>
			</form>
		</div>
	</div>
    </div>
@endsection
