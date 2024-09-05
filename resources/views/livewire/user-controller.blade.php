<div class="bg-black px-4 rounded-lg shadow-md w-full border flex flex-col items-center justify-center">
    <h1 class="font-extrabold text-white text-2xl md:text-center">
       Editar Usuario 
    </h1>

    <div class="w-full md:w-96 h-auto flex flex-col rounded-md">
        <label for="name" class="w-full font-bold text-white">Nombre</label>
        <input type="text" id="name" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="nameUser">
        @error('nameUser') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <label for="surname" class="w-full font-bold text-white mt-4">Apellido</label>
        <input type="text" id="surname" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="surnameUser">
        @error('surnameUser') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <label for="name" class="w-full font-bold text-white">Email</label>
        <input type="text" id="email" value="{{$userEmail}}" class="mt-2 p-2 rounded-md my-1 focus:outline-none focus:ring-2 focus:ring-black" disabled>

        <label for="phone" class="w-full font-bold text-white mt-4">Número de Teléfono</label>
        <input type="text" id="phone" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="userPhoneNumber">
        @error('userPhoneNumber') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <label for="identification" class="w-full font-bold text-white mt-4">Numero de identificacion</label>
        <input type="text" id="identification" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="identification">
        @error('identification') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <button class="mt-4 p-2 bg-blue-500 text-white rounded-md" wire:click="save">Guardar</button>
    </div>
    @if (session()->has('message'))
        <div class="mt-4 p-2 bg-green-500 text-white rounded-md">
            {{ session('message') }}
        </div>
    @endif
</div>