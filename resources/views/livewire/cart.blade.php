<div class="position-relative">

    <div class="d-flex">
        <input wire:model="search" wire:change="searchPhones($event.target.value)" class="form-control mb-2 mr-4">
        <button wire:click="clearSearch" class="btn btn-primary btn-sm form-control"><i class="fas fa-cross"></i></button>
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
                    <p>{{$phone->model}}</p>
                    <p>{{$phone->name}}</p>
                    <p>{{$phone->unit_price}}</p>
                    <button wire:click="addToCart({{$phone->id}})"><i class="fas fa-cart-plus"></i></button>
                </div>
            @endforeach
        </div>
    @endif

    <div class="d-flex flex-row-reverse my-3">
        <b>Total : {{$total}}</b>
    </div>
    {{--    <ul>--}}
    {{--        @foreach($searchedPhones as $phone)--}}
    {{--            <li>{{$phone->name}}--}}
    {{--                <button wire:click="addToCart({{$phone->id}})"><i class="fas fa-cart-plus"></i></button>--}}
    {{--            </li>--}}
    {{--        @endforeach--}}
    {{--    </ul>--}}

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

    {{--    <ul>--}}
    {{--        @foreach($phones as $phone)--}}
    {{--            <li>Phone /--}}
    {{--                <button wire:click="decreaseItem({{$phone->phone_id}})"><i class="fas fa-minus"></i></button>--}}
    {{--            </li>--}}
    {{--            / {{$phone->quantity}}--}}
    {{--            /--}}
    {{--            <button wire:click="increaseItem({{$phone->phone_id}})"><i class="fas fa-plus"></i></button></li>--}}
    {{--            /--}}
    {{--            <button wire:click="removeItem({{$phone->phone_id}})"><i class="fas fa-trash"></i></button></li>--}}
    {{--        @endforeach--}}
    {{--    </ul>--}}
</div>
