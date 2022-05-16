<div class="position-relative">
    <div class="d-flex justify-content-end my-3 align-items-center">
        <b>Total : {{$total}}</b>
        <button class="btn btn-primary ml-5"
                wire:click="toggleIsCheckingOut" {{ !count($phones) ? 'disabled' : ''  }}> {{  $isCheckingOut ? 'Cancel' : 'Checkout'  }}</button>
    </div>


    <div class="d-flex">
        <input wire:model="search" class="form-control mb-2">
    </div>

    @if(count($searchedPhones))
        <div class="card card-body position-absolute bg-secondary text-white" style="left: 0; right: 0">
            @foreach($searchedPhones as $phone)
                <div class="border-bottom py-1 d-flex justify-content-between align-items-center">
                    <img
                        src="https://i.pravatar.cc/30?u={{ $phone->id }}"
                        style="width: 30px; height: 30px"
                        alt=""
                        class="rounded-circle"
                    />
                    <p>{{$phone->name}}</p>
                    <p>{{$phone->model}}</p>
                    <p>{{$phone->unit_price}}</p>
                    <button wire:click="addToCart({{$phone->id}})"><i class="fas fa-cart-plus"></i></button>
                </div>
            @endforeach
        </div>
    @endif


    @if($isCheckingOut)
        <div>
            <h5 class="py-2">Enter customer's details</h5>

            <div class="py-2">
                <label for="customer_name">Name<span class="text-danger">*</span></label>
                <input id="customer_name" class="form-control" wire:model="customer_name">
                @error('customer_name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="py-2">
                <label for="customer_email">Email</label>
                <input id="customer_email" class="form-control" wire:model="customer_email">
                @error('customer_email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="py-2">
                <label for="customer_mobile_number">Mobile Number</label>
                <input id="customer_mobile_number" class="form-control" wire:model="customer_mobile_number">
                @error('customer_mobile_number')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="py-2">
                <label for="customer_address">Address</label>
                <input id="customer_address" class="form-control" wire:model="customer_address">
                @error('customer_address')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex justify-content-end py-2">
                <button class="btn btn-primary" wire:click="checkout">Submit</button>
            </div>
        </div>

    @else
        <table class="table align-middle mb-0 bg-white ">
            <thead class="bg-light">
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($phones as $phone)
                <tr>
                    <td>
                        <img
                            src="https://i.pravatar.cc/60?u={{ $phone->id }}"
                            alt=""
                            style="width: 45px; height: 45px"
                            class="rounded-circle"
                        />
                    </td>
                    <td>{{$phone->name}}</td>
                    <td>{{$phone->unit_price}}</td>
                    <td>{{optional($phone->pivot)->quantity}}</td>
                    <td>{{optional($phone->pivot)->quantity * $phone->unit_price}}</td>

                    <td>
                        <button wire:click="decreaseItem({{$phone->id}})"><i class="fas fa-minus"></i></button>
                        <button wire:click="increaseItem({{$phone->id}})"><i class="fas fa-plus"></i></button>
                        <button wire:click="removeItem({{$phone->id}})"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif


</div>
