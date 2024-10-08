@extends('layouts.app')

@section('title')
    {{ $clothing_item->name }}
@endsection

@section('contenido')
    <section class="w-screen h-screen p-8">
        <div class="grid bg-red grid-cols-1 md:grid-cols-2 gap-8 h-4/5">
            <!-- Imagen del producto -->
            <div class="flex justify-start pl-8  items-center">
                <img src="{{ Storage::url($clothing_item->gallery->front_image) }}" alt="{{ $clothing_item->name }}"
                    class="w-full h-auto max-w-md rounded-lg shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
            </div>

            <!-- Datos del producto -->
            <div class="flex flex-col justify-center text-white space-y-6">
                <h1 class="text-5xl font-extrabold">{{ $clothing_item->name }}</h1>
                <p class="text-xl">{{ $clothing_item->description }}</p>
                <p class="text-3xl font-semibold">${{ number_format($clothing_item->price, 0) }} COP</p>
                <p class="text-lg">Categoría: {{ $clothing_item->category->name }}</p>
                <p class="text-lg">Color: {{ $clothing_item->color }}</p>

                <!-- Selección de Talla -->
                <div>
                    <h2 class="text-lg font-semibold mb-2">Selecciona una talla:</h2>
                    <div class="flex space-x-2">
                        {{-- @foreach ($clothing_item->sizes as $size)
                            <div
                                class="w-10 h-10 flex items-center justify-center border-2 border-white rounded-lg cursor-pointer hover:bg-white hover:text-black transition">
                                {{ $size }}
                            </div>
                        @endforeach --}}
                    </div>
                </div>

                <!-- Botón Añadir al Carrito -->
                <button
                    class="uppercase text-black font-bold px-5 py-2 border-2 border-black hover:border-white bg-white hover:text-white hover:bg-black transition-opacity transform">
                    Añadir al carrito
                </button>
            </div>
        </div>
    </section>
@endsection