<?php

namespace App\Http\Controllers;

use App\Models\ClothingItem;
use Illuminate\Http\Request;

class ClothingController extends Controller
{
    //
    public function show(ClothingItem $clothingitem){
        return view('clothing.show', [
            'clothing_item' => $clothingitem
        ]);
    }
}
