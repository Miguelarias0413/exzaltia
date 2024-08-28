@extends('layouts.app')

@section('title')
    Registrarse
@endsection

@section('contenido')
    <div class="bg-black w-full min-h-[90vh] flex justify-center">
        <div
            class="w-10/12 min-h-96 my-4 flex flex-col justify-start items-center md:w-10/12 lg:w-8/12 xl:w-6/12 md:justify-center">
            <h1 class="font-bold text-2xl uppercase text-white border-b-4 w-full text-center">
                Crea tu cuenta
            </h1>

            <form action="{{ route('register.store') }}" method="POST"
                class="w-10/12 my-4 grid grid-cols-1 gap-4 md:grid-cols-2  [&>div>label]:text-white [&>div>label]:text-lg [&>div>input]:outline-none">
                @csrf
                <div class="flex flex-col">
                    <label for="nombre" class="font-semibold">
                        Nombres
                    </label>
                    <input type="text" id="nombre" name="nombres" class="h-8 rounded-sm px-1"
                        value="{{ old('nombres') }}">
                </div>

                <div class="flex flex-col">
                    <label for="apellidos" class="font-semibold">
                        Apellidos
                    </label>
                    <input type="text" id="apellidos" name="apellidos" class="h-8 rounded-sm px-1"
                        value="{{ old('apellidos') }}">
                </div>

                <div class="flex flex-col">
                    <label for="email" class="font-semibold">
                        Email
                    </label>
                    <input type="email" id="email" name="email" class="h-8 rounded-sm px-1"
                        value="{{ old('email') }}">
                </div>

                <div class="flex flex-col">
                    <label for="telefono" class="font-semibold">
                        Teléfono
                    </label>
                    <input type="tel" id="telefono" name="telefono" class="h-8 rounded-sm px-1"
                        value="{{ old('telefono') }}">
                </div>

                <div class="flex flex-col">
                    <label for="password" class="font-semibold">
                        Contraseña
                    </label>
                    <input type="password" id="password" name="password" class="h-8 rounded-sm px-1">
                </div>

                <div class="flex flex-col">
                    <label for="password_confirmation" class="font-semibold">
                        Confirmar Contraseña
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="h-8 rounded-sm px-1">
                </div>
                <div class="flex flex-col md:col-span-2 mt-4 text-sm">

                    <label class="inline-flex items-center ">
                        <input type="checkbox" name="terms" class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="ml-2 text-white text-sm">Acepto los <a href="#" class="underline ">términos y
                                condiciones</a>, recibir mensajes, correos y el uso de mis datos.</span>
                    </label>
                </div>
                <div class="flex flex-col mt-4 text-sm">
                    <span class="ml-2 text-white text-sm">
                        ¿Ya tienes una cuenta? 
                        <a href="{{route('login')}}" class="underline text-cyan-500">
                            Iniciar sesión
                        </a>
                    </span>
                </div>
                @if (session()->has('message'))
                    <span class=" text-red-500">
                        {{ session('message') }}
                    </span>
                @endif

                @error('nombres')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                @error('apellidos')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                @error('telefono')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                @error('password_confirmation')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <div class="flex flex-col md:col-span-2 my-2">
                    <button type="submit" class="bg-blue-500 font-bold uppercase text-white py-3 rounded-md ">
                        Registrarse
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
