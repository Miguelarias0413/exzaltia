<?php

namespace App\Livewire\Admin;

use App\Models\Type;
use Livewire\Component;

class HandleType extends Component
{
    public $types;
    public $name;

    public function mount(){
        $this->types = Type::all();
    }

    public function save(){
        $this->validate([
            'name' => 'required|unique:types'
        ]);

        Type::create([
            'name' => $this->name
        ]);

        $this->types = Type::all();
        $this->reset('name');
    }

    public function destroy($id){
        $type = Type::find($id);
        if ($type) {
            $type->delete();
            $this->types = Type::all();
        }
    }

    public function render()
    {
        return view('livewire.admin.handle-type');
    }
}