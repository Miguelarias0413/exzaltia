<div class="bg-black p-4 rounded-lg shadow-md h-auto w-full border">
    <div class="w-full md:w-72 h-auto flex flex-col rounded-md">
        <label for="name" class="w-full font-bold text-white">Nombre</label>
        <input type="text" id="name" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="nameUser">

        <label for="surname" class="w-full font-bold text-white mt-4">Apellido</label>
        <input type="text" id="surname" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="surnameUser">

        <label for="phone" class="w-full font-bold text-white mt-4">Número de Teléfono</label>
        <input type="text" id="phone" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="userPhoneNumber">

        <label for="identification" class="w-full font-bold text-white mt-4">Numero de identificacion</label>
        <input type="text" id="identification" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="identification">

        <button class="mt-4 p-2 bg-blue-500 text-white rounded-md" wire:click="save">Guardar</button>
    </div>
    @if (session()->has('message'))
        <div class="mt-4 p-2 bg-green-500 text-white rounded-md">
            {{ session('message') }}
        </div>
    @endif
</div>