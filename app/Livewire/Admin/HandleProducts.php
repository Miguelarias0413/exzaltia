<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ClothingItem;
use Illuminate\Support\Facades\Storage;

class HandleProducts extends Component
{
    public $clothing_items;
    public $idClothingItemToDelete;
    public $showDeleteModal = false;
    
    public function mount(){
        $this->clothing_items = ClothingItem::all();
    }
    public function delete($id){
        $clothingItem = ClothingItem::findOrFail($id);

        $imagePath = $clothingItem->gallery->front_image;

        // Eliminar la imagen del almacenamiento
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
        
        $clothingItem->delete();

        $this->clothing_items = ClothingItem::all();
    }
    
    public function render()
    {
        return view('livewire.admin.handle-products');
    }
}
