<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'color',
        'price',
        'type_id',
        'category_id',
        'stock'

    ];


    public function category(){
        return $this->belongsTo(category::class);
    }
    public function type(){
        return $this->belongsTo(type::class);
    }
    public function sizes(){
        return $this->belongsToMany(Size::class,'clothingitems_sizes')
        ->withPivot('stock');
    }
    public function gallery(){
        return $this->hasOne(Gallery::class);
    }
}
