<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Type;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\ClothingItem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index(){
        return view('admin.index');
    }
    function create(){
        $types = Type::all();
        $categories = Category::all();
        $sizes = Size::all();

        return view('admin.create' ,compact([
            'types',
            'categories',
            'sizes'
        ]));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type_id' => 'required|exists:types,id',
            'category_id' => 'required|exists:categories,id',
            'front_image' => 'required|image',
            'back_image' => 'nulleable|image',
            'first_bonus_image' => 'nullable|image',
            'second_bonus_image' => 'nullable|image',
            'third_bonus_image' => 'nullable|image',
        ]);

        $clothingItem = ClothingItem::create($request->all());

        // Manejar la carga de imágenes
        $gallery = new Gallery();
        $gallery->clothing_item_id = $clothingItem->id;

        if ($request->hasFile('front_image')) {
            $gallery->front_image = $request->file('front_image')->store('public/images');
        }
        if ($request->hasFile('back_image')) {
            $gallery->back_image = $request->file('back_image')->store('public/images');
        }
        if ($request->hasFile('first_bonus_image')) {
            $gallery->first_bonus_image = $request->file('first_bonus_image')->store('public/images');
        }
        if ($request->hasFile('second_bonus_image')) {
            $gallery->second_bonus_image = $request->file('second_bonus_image')->store('public/images');
        }
        if ($request->hasFile('third_bonus_image')) {
            $gallery->third_bonus_image = $request->file('third_bonus_image')->store('public/images');
        }

        $gallery->save();

        return redirect()->route('admin.index')->with('success', 'Producto creado exitosamente.');
    }
}
