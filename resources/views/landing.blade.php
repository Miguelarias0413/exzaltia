@extends('layouts.app')

@section('title')
    Pagina de inicio
@endsection
@section('contenido')
    <div id="swiperCarruselPortadas"
        class="swiper w-full h-[300px] sm:h-auto lg:h-[500px] xl:h-[600px] aspect-video filter select-none">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper ">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="{{ asset('images/carrusel/carrusel1.jpg') }}" alt="" class=" w-full h-full object-cover">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/carrusel/carrusel2.jpg') }}" alt="" class=" w-full h-full object-cover">
            </div>

        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev fill-black text-black"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>

    {{-- FIN CARROUSEL --}}


    <div class=" w-screen min-h-screen">
        <h2 class="my-32 md:my-20 text-white text-center font-extrabold text-2xl md:text-3xl uppercase">
            Nuestros productos
            <span class=" text-yellow-500">
                exclusivos
            </span>
        </h2>

        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-center items-center gap-10 relative w-full min-h-96 py-8 my-10   bg-stone-800 bg-opacity-30 backdrop-blur-xl ">
            <h3
                class=" text-yellow-600 font-bold text-4xl absolute -top-12 uppercase w-full border-b-4 px-2 border-yellow-300">
                Basicas
                <span class=" text-xl text-yellow-800">
                    best quality
                </span>
            </h3>

            {{-- La de abajo es las card --}}
            @foreach ($clothing_items as $clothing_item)
                @if ($clothing_item->category->name == 'Basicas')
                    @component('components.clothing-card', [
                        'clothing_item' => $clothing_item,
                    ])
                    @endcomponent
                @endif
            @endforeach


        </div>

        @if ($clothing_item->category->name == 'Premium')
            <div
                class="flex flex-col items-center md:flex-row md:justify-evenly gap-10 relative w-full min-h-96 py-8 my-32   bg-stone-800 bg-opacity-30 backdrop-blur-xl ">
                <h3
                    class=" text-yellow-600 font-bold text-4xl absolute -top-12 uppercase w-full border-b-4 px-2 border-yellow-300">
                    Premium
                    <span class=" text-xl text-yellow-800">
                        best quality
                    </span>
                </h3>

                {{-- La de abajo es las card --}}
                @foreach ($clothing_items as $clothing_item)
                    @if ($clothing_item->category->name == 'Premium')
                        @component('components.clothing-card', [
                            'clothing_item' => $clothing_item,
                        ])
                        @endcomponent
                    @endif
                @endforeach


            </div>
        @endif




    </div>




    @component('components.footer')
    @endcomponent
@endsection

@vite(['resources/js/landing/swiper.js'])
@vite(['resources/css/landing/swiper.css'])
