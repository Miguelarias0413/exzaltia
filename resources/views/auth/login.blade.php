@extends('layouts.app')

@section('title')
    Iniciar Sesión
@endsection

@section('contenido')
    <div class="bg-black w-full min-h-[90vh] flex justify-center">
        <div class="w-10/12 min-h-96 my-4 flex flex-col justify-center items-center md:w-10/12 lg:w-8/12 xl:w-6/12 md:justify-center">
            <h1 class="font-bold text-2xl uppercase text-white border-b-4 w-full text-center">
                Ingresa a tu cuenta
            </h1>

            <form action="{{ route('login.login') }}" method="POST" class="w-10/12 my-4 flex flex-col gap-4">
                @csrf

                <div class="flex flex-col w-full">
                    <label for="email" class="font-semibold text-white text-lg">
                        Email
                    </label>
                    <input type="email" id="email" name="email" class="h-8 rounded-sm px-1 outline-none" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col w-full">
                    <label for="password" class="font-semibold text-white text-lg">
                        Contraseña
                    </label>
                    <input type="password" id="password" name="password" class="h-8 rounded-sm px-1 outline-none">
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col mt-4 text-sm">
                    <span class="ml-2 text-white text-sm">
                        ¿No has creado una cuenta aun? 
                        <a href="{{route('register.index')}}" class="underline text-cyan-500">
                            Crea tu cuenta!
                        </a>
                    </span>
                </div>

                <div class="flex flex-col md:col-span-2 my-2">
                    <button type="submit" class="bg-blue-500 font-bold uppercase text-white py-3 rounded-md">
                        Inicia sesion
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection