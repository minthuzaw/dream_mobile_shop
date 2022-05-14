<?php

namespace App\Http\Livewire;

use App\Models\Phone;
use App\Models\PhoneUser;
use http\Client\Curl\User;
use Livewire\Component;

class Cart extends Component
{
    public $search = '';
    public $searchedPhones = [];
    public $itemCount = 0;
    public $phones = [];

    public function mount()
    {
        $this->sync();
    }

    protected function sync()
    {
        $this->fetchItemCount();
        $this->fetchPhonesInCart();
    }

    protected function fetchItemCount()
    {
        $this->itemCount = PhoneUser::where('user_id', \Auth::id())->count();
    }

    protected function fetchPhonesInCart()
    {
        $this->phones = PhoneUser::where('user_id', \Auth::id())->get();
    }

    public function searchPhones($search)
    {
        if ($search) {
            $this->searchedPhones = Phone::where('name', 'LIKE', '%' . $search . '%')->get();
        } else {
            $this->searchedPhones = [];
        }
    }

    public function addToCart($phoneId)
    {
        $userId = \Auth::id();

        $phoneUser = PhoneUser::where('user_id', $userId)->where('phone_id', $phoneId)->first();
        if ($phoneUser) {
            $phoneUser->update(['quantity' => ++$phoneUser->quantity]);
        } else {
            PhoneUser::create(['user_id' => $userId, 'phone_id' => $phoneId, 'quantity' => 1]);
        }
        $this->sync();
    }

    public function decreaseItem($phoneId)
    {
        $phoneUser = PhoneUser::where('user_id', \Auth::id())->where('phone_id', $phoneId)->first();
        $quantity = $phoneUser->quantity;
        if ($quantity > 1) {
            $phoneUser->update(['quantity' => --$phoneUser->quantity]);
            $this->sync();
        } else {
            $this->removeItem($phoneId);
        }
    }

    public function increaseItem($phoneId)
    {
        $phoneUser = PhoneUser::where('user_id', \Auth::id())->where('phone_id', $phoneId)->first();

        // check if we have enough phones
        $phoneUser->update(['quantity' => ++$phoneUser->quantity]);
        $this->sync();
    }

    public function removeItem($phoneId)
    {
        $phoneUser = PhoneUser::where('user_id', \Auth::id())->where('phone_id', $phoneId)->delete();
        $this->sync();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
