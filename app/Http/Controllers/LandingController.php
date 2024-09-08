<?php

namespace App\Http\Controllers;

use App\Models\ClothingItem;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $clothing_items = ClothingItem::all();
        return view('landing',compact('clothing_items'));
    }
}
