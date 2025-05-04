<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'shoppingcarts';
    

    public function clothingItems(){
        return $this->belongsToMany(ClothingItem::class, 'clothing_itemsshoppingcarts','shoppingcart_id','clothing_item_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
