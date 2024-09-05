@extends('layouts.app')

@section('title')
{{auth()->user()->name ." ".auth()->user()->surname}}
@endsection

@section('contenido')
<section class=" min-h-screen w-full grid grid-rows-2 justify-items-center">
@livewire('user-controller')
@livewire('address-controller')
</section>

@component('components.footer')
@endcomponent
@endsection

