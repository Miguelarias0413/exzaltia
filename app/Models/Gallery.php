<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'front_image',
        'back_image',
        'first_bonus_image',
        'second_bonus_image',
        'third_bonus_image',
        'clothing_item_id'
    ];

    function clothingItem(){
        return $this->belongsTo(ClothingItem::class);
    }
}
