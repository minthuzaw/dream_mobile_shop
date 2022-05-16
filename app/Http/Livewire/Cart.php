<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Phone;
use App\Models\PhoneUser;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Cart extends Component
{
    public $isCheckingOut = false;
    public $search = '';
    public $searchedPhones = [];
    public $phones = [];
    public $total = 0;

    public $customer_name = '';
    public $customer_email = '';
    public $customer_mobile_number = '';
    public $customer_address = '';

    protected $rules = [
        'customer_name' => 'required|string|min:3',
        'customer_email' => 'nullable|email',
        'customer_mobile_number' => 'nullable|string|max:11',
        'customer_address' => 'nullable|string|max:255'
    ];


    public function mount()
    {
        $this->sync();
    }

    protected function sync()
    {
        $this->fetchPhonesInCart();
        $this->calculateTotal();
    }

    public function toggleIsCheckingOut()
    {
        $this->isCheckingOut = !$this->isCheckingOut;
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->searchPhones($this->search);
    }

    public function updatingSearch($value)
    {
        $this->searchPhones($value);
    }


    protected function fetchPhonesInCart()
    {
        $this->phones = \Auth::user()->phones;
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

        // reset search after every adding to card
        $this->searchPhones($this->search = '');

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

    public function checkStockAndIncreaseItem($phoneUser)
    {
        $phone = Phone::find($phoneUser->phone_id);
        if ($phone->stock == $phoneUser->quantity) {
            return redirect()->route('cart')->with('error', 'Out of stock');
        } else {
            $phoneUser->update(['quantity' => ++$phoneUser->quantity]);
            $this->sync();
        }
    }

    /**
     * @throws \Throwable
     */
    public function checkout()
    {
        $validatedOrder = $this->validate();

       DB::beginTransaction();
        try {
            $validatedOrder['user_id'] = \Auth::id();
            $validatedOrder['total'] = $this->total;
            $order = Order::create($validatedOrder);

            $orderPhones = [];
            PhoneUser::with('phone:id,unit_price')
                ->where('user_id', \Auth::id())->select(['phone_id', 'quantity'])->get()
                ->each(function ($phone) use (&$orderPhones) {
                    $phone->unit_price = optional($phone->phone)->unit_price;
                    $phone->sub_total = optional($phone->phone)->unit_price * $phone->quantity;
                    unset($phone->phone);
                    $phoneId = $phone->phone_id;
                    unset($phone->phone_id);

                    $orderPhones[$phoneId] = $phone->jsonSerialize();
                })->toArray();

            $order->phones()->sync($orderPhones);
            \Auth::user()->phones()->sync([]);

            DB::commit();
            session()->flash('success', 'Order has been successfully created.');
        } catch (\Exception $exception) {
            logger($exception);
            DB::rollBack();
            session()->flash('error', 'Something went wrong.');
        }

        return redirect()->to(route('cart'));
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
