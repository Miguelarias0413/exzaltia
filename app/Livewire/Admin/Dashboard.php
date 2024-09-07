<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public $current;

    public function mount(){
        $this->current = 'products';
    }
    public function setProductsView(){
        $this->current = 'products';
    }
    public function setTypesView(){
        $this->current = 'types';
    }
    public function setCategoriesView(){
        $this->current = 'categories';
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
