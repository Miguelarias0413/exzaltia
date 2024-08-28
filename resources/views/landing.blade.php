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
    <div class=" w-screen h-screen py-4">
        <h2 class=" text-black text-center font-extrabold text-xl md:text-3xl uppercase">
            Nuevos productos
        </h2>

        <div>

        </div>
    </div>


    @component('components.footer')
    @endcomponent
@endsection

@vite(['resources/js/landing/swiper.js'])
@vite(['resources/css/landing/swiper.css'])
