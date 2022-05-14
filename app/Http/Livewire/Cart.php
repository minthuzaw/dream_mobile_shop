<?php

namespace App\Http\Livewire;

use App\Models\Phone;
use Livewire\Component;

class Cart extends Component
{
    public $search = '';
    public $searchedPhones = [];

    public function searchPhones($search) {
        dd($search);
        if ($this->search == '') {
            $this->searchedPhones = [];
            return;
        }
       $this->searchedPhones = Phone::where('name', 'LIKE' , '%'. $this->search . '%')->get();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
