<?php
namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class UserController extends Component
{
    public $nameUser;
    public $surnameUser;
    public $emailUser;
    public $userPhoneNumber;
    public $identification;

    public function mount()
    {
        $this->nameUser = Auth::user()->name;
        $this->surnameUser = Auth::user()->surname;
        $this->emailUser = Auth::user()->email;
        $this->userPhoneNumber = Auth::user()->phone_number;
        $this->identification = Auth::user()->identification; // Asumiendo que tienes este campo en tu modelo de usuario
    }

    public function save()
    {
        $user = Auth::user();
        $user->name = $this->nameUser;
        $user->surname = $this->surnameUser;
        $user->email = $this->emailUser;
        $user->phone_number = $this->userPhoneNumber;
        $user->identification = $this->identification;
        $user->save();

        session()->flash('message', 'Datos guardados correctamente.');
    }

    public function render()
    {
        return view('livewire.user-controller');
    }
}