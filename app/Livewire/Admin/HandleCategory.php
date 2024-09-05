<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class HandleCategory extends Component
{
    public $categories;
    public $name;

    public function mount(){
        $this->categories = Category::all();
    }
    public function save(){

        $this->validate([
            'name' => 'required|unique:categories'
        ]);

        Category::create([
            'name' => $this->name
        ]);

        $this->categories = Category::all();
        
        
    }

    public function destroy($id){
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            $this->categories = Category::all();
        }
    }
    public function render()
    {
        return view('livewire.admin.handle-category');
    }
}
