@extends('layouts.app')

@section('title')
    administrador
@endsection

@section('contenido')
@livewire('admin.handle-type')
@livewire('admin.handle-category')
@endsection
