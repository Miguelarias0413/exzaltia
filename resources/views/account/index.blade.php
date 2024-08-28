@extends('layouts.app')

@section('title')
{{auth()->user()->name ." ".auth()->user()->surname}}
@endsection

@section('contenido')
<section class=" min-h-screen  w-full grid grid-rows-2 gap-20 justify-items-center">
@livewire('user-controller')
</section>
@endsection