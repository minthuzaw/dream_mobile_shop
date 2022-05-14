<div>
   <input wire:change="searchPhones($event.target.value)">

    @foreach($searchedPhones as $phone)
        {{$phone->name}}
    @endforeach
</div>
