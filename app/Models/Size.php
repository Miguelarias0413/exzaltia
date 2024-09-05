<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        // Campos rellenables
        'name'
    ];


    public function clothingItem(){
        return $this->belongsToMany(ClothingItem::class,'clothing_item_size');
    }
}
