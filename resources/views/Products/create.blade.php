@extends('layouts.app')

@section('content')
    <x-page-header header="Add new products" />

    <div class="container">
	<div class="row">
		<div class="col-12 text-center pt-2">
			<div class="text-left"><a href="{{ route('phones.index') }}" class="btn btn-outline-primary">Products List</a></div>
			<form id="add-frm" method="POST" action="{{route('phones.store')}}" class="border p-3 mt-2 col-6">
                @csrf

				<div class="control-group text-left">
					<label for="title">Model</label>
					<div>
						<input type="text" id="model" class="form-control mb-4" name="model"
							placeholder="Enter Phone Model" />
					</div>
				</div>

				<div class="control-group  text-left mt-2">
					<label for="body">Name</label>
					<div>
						<input type="text" id="name" class="form-control mb-4" name="name"
							placeholder="Enter Phone Name" rows=""/>
					</div>
				</div>

				<div class="control-group  text-left mt-2">
					<label for="body">Stock</label>
					<div>
						<input type="number" id="stock" class="form-control mb-4" name="stock"
							placeholder="Stocks count" rows=""/>
					</div>
				</div>

				<div class="control-group  text-left mt-2">
					<label for="body">Select Brand</label>
					<select class="form-control form-select" aria-label="Default select example" name="brand_id">
						<option disabled selected>Select Brand</option>
						@foreach ($brands as $id => $brand)
							<option value="{{$id}}">{{$brand}}</option>
						@endforeach
                    </select>
				</div>

                <div class="control-group  text-left mt-2">
					<label for="body">Price</label>
					<div>
						<input type="number" id="unit_price" class="form-control mb-4" name="unit_price"
							placeholder="Enter Phone Price"/>
					</div>
				</div>

				<div class="control-group  text-center mt-2"><button class="btn btn-success">Save</button></div>
			</form>
		</div>
	</div>
    </div>
@endsection

