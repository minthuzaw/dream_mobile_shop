<div>
    <input wire:change="searchPhones($event.target.value)" class="form-control">{{$itemCount}}

    <ul>
        @foreach($searchedPhones as $phone)
            <li>{{$phone->name}}
                <button wire:click="addToCart({{$phone->id}})"><i class="fas fa-cart-plus"></i></button>
            </li>
        @endforeach
    </ul>


    <ul>
        @foreach($phones as $phone)
            <li>Phone / <button wire:click="decreaseItem({{$phone->phone_id}})"><i class="fas fa-minus"></i></button></li>
            / {{$phone->quantity}}
            /<button wire:click="increaseItem({{$phone->phone_id}})"><i class="fas fa-plus"></i></button></li>
            /<button wire:click="removeItem({{$phone->phone_id}})"><i class="fas fa-trash"></i></button></li>
        @endforeach
    </ul>
</div>
