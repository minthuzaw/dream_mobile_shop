<div class="position-relative">
    <div class="d-flex justify-content-end my-3 align-items-center">

        <b>Total : {{$total}}</b>
        <button class="btn btn-primary ml-5" id="toggleIsCheckingOut"
                {{-- Disabled checkout button When cashier does not select items --}}
                wire:click="toggleIsCheckingOut" {{ !count($phones) ? 'disabled' : ''  }}> {{  $isCheckingOut ? 'Cancel (Esc)' : 'Checkout (F12)'  }}
        </button>
    </div>
    @if(count($searchedPhones))
        <div class="card card-body position-absolute bg-secondary text-white"
             style="left: 0; right: 0;opacity: 90%;top: 100px">
            <div class="border-bottom py-1 d-flex justify-content-between">
                <div class="" style="width: 10vw;margin-right: 0.5vw">
                    <p>Image</p>
                </div>
                <p class="" style="width: 10vw;margin-right: 1vw">Brand</p>
                <p class="" style="width: 15vw;margin-right: 2vw">Name</p>
                <p class="" style="width: 15vw;margin-right: 2vw">Categories</p>
                <p class="" style="width: 5vw;margin-right: 1vw">Stock</p>
                <p class="" style="width: 5vw;margin-right: 1vw">Price</p>
                <p class="" style="width: 5vw;">Action</p>
            </div>
            @foreach($searchedPhones as $phone)
                <div class="border-bottom py-1 d-flex justify-content-center">
                    <div class="" style="width: 10vw;margin-right: 0.5vw">
                        <img
                            src="{{asset('storage/'.$phone->image)}}"
                            style="width: 50%;height: 50%;"
                            alt=""
                            class="rounded-circle"
                        >
                    </div>
                    <p class="" style="width: 10vw;margin-right: 1vw">{{$phone->brand->name}}</p>
                    <p class="" style="width: 15vw;margin-right: 2vw">{{$phone->name}}</p>
                    <p class="" style="width: 15vw;margin-right: 2vw">{{$phone->categories->pluck('name')->implode(', ')}}</p>
                    <p class="" style="width: 5vw;margin-right: 1vw">{{$phone->stock}}</p>
                    <p class="" style="width: 5vw;margin-right: 1vw">{{$phone->unit_price}}</p>
                    <button wire:click="addToCart({{$phone->id}})"  class="btn btn-primary" style="width: 5vw"><i class="fas fa-cart-plus"></i></button>
                </div>
            @endforeach
        </div>
    @endif
    @if($isCheckingOut)
        <div>
            <h5 class="py-2">Enter customer's details</h5>

            <div class="py-2">
                <label for="customer_name">Name<span class="text-danger">*</span></label>
                <input id="customer_name" class="form-control focus" wire:model="customer_name" autofocus placeholder="Press F2 To Focus">
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
                <button class="btn btn-primary" wire:click="checkout">Checkout (F12)</button>
            </div>
        </div>
    @else
        <div class="d-flex">
            <input wire:model="search" class="form-control mb-2 focus" autofocus placeholder="Press F2 To Search">
        </div>
        <table class="table align-middle mb-0 bg-white ">
            <thead class="bg-light">
            <tr>
                <th>Photo</th>
                <th>Brand</th>
                <th>Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th class="text-right">Actions</th>
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
                    <td>{{$phone->brand->name}}</td>
                    <td>{{$phone->name}}</td>
                    <td>{{$phone->unit_price}}</td>
                    <td>{{optional($phone->pivot)->quantity}}</td>
                    <td>{{optional($phone->pivot)->quantity * $phone->unit_price}}</td>
                    <td class="text-right">
                        <button wire:click="decreaseItem({{$phone->id}})" class="btn btn-primary"><i class="fas fa-minus"></i></button>
                        <button wire:click="increaseItem({{$phone->id}})" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                        <button wire:click="removeItem({{$phone->id}})" class="btn btn-primary"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
<script>

    document.addEventListener("keydown", function(e) {
        if (e.key === 'F12'){
            if (document.getElementById("toggleIsCheckingOut").disabled === false){
                if (document.getElementById("toggleIsCheckingOut").innerText === "Checkout (F12)"){
                    Livewire.emit('toggleIsCheckingOut');
                }
            }
            if ( document.getElementById("toggleIsCheckingOut").innerText === "Cancel (Esc)"){
                Livewire.emit('checkout');
            }

            e.preventDefault();
        }
        if (e.key === 'Escape'){
            if (document.getElementById("toggleIsCheckingOut").disabled === false){
                if (document.getElementById("toggleIsCheckingOut").innerText === "Cancel (Esc)"){
                    Livewire.emit('toggleIsCheckingOut');
                }
            }
            e.preventDefault();
        }
        if (e.key === 'F2'){
            document.getElementsByClassName("focus")[0].focus();
            document.getElementsByClassName("focus")[1].focus();

            e.preventDefault();
        }
    });
</script>

