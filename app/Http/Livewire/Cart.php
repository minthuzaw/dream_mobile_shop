<?php

namespace App\Http\Livewire;

use App\Models\Phone;
use App\Models\PhoneUser;
use Livewire\Component;

class Cart extends Component
{
    public $search = '';
    public $searchedPhones = [];
    public $itemCount = 0;
    public $phones = [];
    public $total = 0;

    public function mount()
    {
        $this->sync();
    }

    protected function sync()
    {
        $this->fetchPhonesInCart();
        $this->fetchItemCount();
        $this->calculateTotal();
    }

    public function clearSearch() {
        $this->search = '';
        $this->searchPhones($this->search);
    }

    protected function fetchPhonesInCart()
    {
        $this->phones = \Auth::user()->phones;
    }

    protected function fetchItemCount()
    {
        $this->itemCount = count($this->phones);
    }

    protected function calculateTotal()
    {
        $this->total = 0;
        foreach ($this->phones as $phone) {
            $this->total += $phone->unit_price * $phone->pivot->quantity;
        }
    }

    public function searchPhones($search)
    {
        if ($search) {
            $this->searchedPhones = Phone::where('name', 'LIKE', '%' . $search . '%')->limit(5)->get();
        } else {
            $this->searchedPhones = [];
        }
        $this->sync();
    }

    public function addToCart($phoneId)
    {
        $userId = \Auth::id();

        $phoneUser = PhoneUser::where('user_id', $userId)->where('phone_id', $phoneId)->first();
        if ($phoneUser) {
            $this->checkStockAndIncreaseItem($phoneUser);
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
        $this->checkStockAndIncreaseItem($phoneUser);
    }

    public function removeItem($phoneId)
    {
        PhoneUser::where('user_id', \Auth::id())->where('phone_id', $phoneId)->delete();
        $this->sync();
    }

    public function checkStockAndIncreaseItem($phoneUser){
        $phone = Phone::find($phoneUser->phone_id);
        if ($phone->stock == $phoneUser->quantity){
            return redirect()->route('cart')->with('error', 'Out of stock');
        }else{
            $phoneUser->update(['quantity' => ++$phoneUser->quantity]);
            $this->sync();
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
