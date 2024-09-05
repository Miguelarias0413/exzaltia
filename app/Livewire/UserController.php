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
    public $userEmail ;

    public function mount()
    {
        $this->userEmail = Auth::user()->email;
        $this->nameUser = Auth::user()->name;
        $this->surnameUser = Auth::user()->surname;
        $this->userPhoneNumber = Auth::user()->phone_number;
        $this->identification = Auth::user()->identification; // Asumiendo que tienes este campo en tu modelo de usuario
        
    }

    public function save()
    {
        $validated = $this->validate([
            'nameUser' => 'required|string|max:30',
            'surnameUser' => 'required|string|max:30',
            'userPhoneNumber' => 'required|numeric',
            'identification' => 'required|numeric|unique:users'
            

        ]);
        $user = Auth::user();
        $user->name = $this->nameUser;
        $user->surname = $this->surnameUser;
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