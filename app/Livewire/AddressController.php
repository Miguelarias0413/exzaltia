<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddressController extends Component
{
    public $address_line_1;
    public $address_line_2;
    public $reference;
    public $country;
    public $state;
    public $city;
    public $postal_code;
    public $user;




    public function mount()
    {
        $this->user = Auth::user();
        $this->address_line_1 = $this->user->address?->address_line_1 ?? '';
        $this->address_line_2 = $this->user->address?->address_line_2 ?? '';
        $this->reference = $this->user->address?->reference ?? '';
        $this->country = $this->user->address?->country ?? '';
        $this->state = $this->user->address?->state ?? '';
        $this->city = $this->user->address?->city ?? '';
        $this->postal_code = $this->user->address?->postal_code ?? '';
    }
    public function save()
    {
        $this->validate([
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'reference' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        
        $this->user = Auth::user();
        $address = $this->user->address;


        if ($address) {
            $address->address_line_1 = $this->address_line_1;
            $address->address_line_2 = $this->address_line_2;
            $address->reference = $this->reference;
            $address->country = $this->country;
            $address->state = $this->state;
            $address->city = $this->city;
            $address->postal_code = $this->postal_code;
            $address->save();
        } else {
            // Si el usuario no tiene una dirección, puedes crear una nueva
            $this->user->address()->create([
                'address_line_1' => $this->address_line_1,
                'address_line_2' => $this->address_line_2,
                'reference' => $this->reference,
                'country' => $this->country,
                'state' => $this->state,
                'city' => $this->city,
                'postal_code' => $this->postal_code,
            ]);
        }

        session()->flash('message', 'Datos guardados correctamente.');
    }
}
