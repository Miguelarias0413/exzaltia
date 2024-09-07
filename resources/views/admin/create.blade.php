@extends('layouts.app')

@section('title')
    Crear producto
@endsection

@section('contenido')
    <div class="bg-black w-full min-h-[90vh] flex justify-center">
        <div class="w-10/12 min-h-96 my-4 flex flex-col justify-start items-center md:w-10/12 lg:w-8/12 xl:w-6/12 md:justify-center">
            <h1 class="font-bold text-2xl uppercase text-white border-b-4 w-full text-center">
                Crear Producto
            </h1>

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md w-full text-center mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="w-full my-4 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 [&>div>label]:text-white [&>div>label]:text-lg [&>div>input]:outline-none text-black">
                @csrf
                <div class="flex flex-col">
                    <label for="name" class="font-semibold">
                        Nombre
                    </label>
                    <input type="text" id="name" name="name" class="h-8 rounded-sm px-1" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="description" class="font-semibold">
                        Descripción
                    </label>
                    <input type="text" id="description" name="description" class="h-8 rounded-sm px-1" value="{{ old('description') }}">
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="color" class="font-semibold">
                        Color
                    </label>
                    <input type="text" id="color" name="color" class="h-8 rounded-sm px-1" value="{{ old('color') }}">
                    @error('color')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="price" class="font-semibold">
                        Precio
                    </label>
                    <input type="number" id="price" name="price" class="h-8 rounded-sm px-1" value="{{ old('price') }}">
                    @error('price')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="type_id" class="font-semibold">
                        Tipo
                    </label>
                    <select id="type_id" name="type_id" class="h-8 rounded-sm px-1">
                        <option value="" disabled selected>Seleccione un tipo</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="category_id" class="font-semibold">
                        Categoría
                    </label>
                    <select id="category_id" name="category_id" class="h-8 rounded-sm px-1">
                        <option value="" disabled selected>Seleccione una categoría</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="front_image" class="block mb-2 text-sm font-medium">
                        Imagen Frontal
                    </label>
                    <input class="block w-full text-sm border rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="front_image" name="front_image" type="file">
                    <p class="mt-1 text-sm text-gray-500" id="front_image_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    @error('front_image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="back_image" class="block mb-2 text-sm font-medium">
                        Imagen Trasera <span class="text-sm text-gray-400">(Opcional)</span>
                    </label>
                    <input class="block w-full text-sm border rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="back_image" name="back_image" type="file">
                    <p class="mt-1 text-sm text-gray-500" id="back_image_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    @error('back_image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="flex flex-col">
                    <label for="first_bonus_image" class="block mb-2 text-sm font-medium">
                        Imagen Extra 1 <span class="text-sm text-gray-400">(Opcional)</span>
                    </label>
                    <input class="block w-full text-sm border rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="first_bonus_image" name="first_bonus_image" type="file">
                    <p class="mt-1 text-sm text-gray-500" id="first_bonus_image_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    @error('first_bonus_image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="flex flex-col">
                    <label for="second_bonus_image" class="block mb-2 text-sm font-medium">
                        Imagen Extra 2 <span class="text-sm text-gray-400">(Opcional)</span>
                    </label>
                    <input class="block w-full text-sm border rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="second_bonus_image" name="second_bonus_image" type="file">
                    <p class="mt-1 text-sm text-gray-500" id="second_bonus_image_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    @error('second_bonus_image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="flex flex-col">
                    <label for="third_bonus_image" class="block mb-2 text-sm font-medium">
                        Imagen Extra 3 <span class="text-sm text-gray-400">(Opcional)</span>
                    </label>
                    <input class="block w-full text-sm border rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="third_bonus_image" name="third_bonus_image" type="file">
                    <p class="mt-1 text-sm text-gray-500" id="third_bonus_image_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    @error('third_bonus_image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col md:col-span-2 lg:col-span-3 my-2">
                    <button type="submit" class="bg-blue-500 font-bold uppercase text-white py-3 rounded-md w-full">
                        Crear Producto
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection