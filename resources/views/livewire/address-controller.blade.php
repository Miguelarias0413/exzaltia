<div class="bg-black p-4 rounded-lg shadow-md h-auto w-full border py-10">
    <h1 class="font-extrabold text-white text-2xl my-4 md:text-center">
       Editar Dirección 
    </h1>

    <div class="w-full md:w-96 mx-auto h-auto flex flex-col rounded-md">

        <label for="address_line_1" class="w-full font-bold text-white">Dirección 1</label>
        <input type="text" id="address_line_1" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="address_line_1">
        @error('address_line_1') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <label for="address_line_2" class="w-full font-bold text-white mt-4">Direccion 2 <span class=" text-slate-300 font-medium"> (Opcional)</span></label>
        <input type="text" id="address_line_2" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="address_line_2">
        @error('address_line_2') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <label for="reference" class="w-full font-bold text-white mt-4">Informacion adicional<span class=" text-slate-300 font-medium"> (Opcional)</span></label>
        <input type="text" id="reference" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="reference">
        @error('reference') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <label for="country" class="w-full font-bold text-white mt-4">País</label>
        <input type="text" id="country" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="country">
        @error('country') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <label for="state" class="w-full font-bold text-white mt-4">Departamento/Estado/Provincia</label>
        <input type="text" id="state" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="state">
        @error('state') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <label for="city" class="w-full font-bold text-white mt-4">Ciudad</label>
        <input type="text" id="city" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="city">
        @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <label for="postal_code" class="w-full font-bold text-white mt-4">Codigo Postal</label>
        <input type="text" id="postal_code" class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black" wire:model="postal_code">
        @error('postal_code') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <button class="mt-4 p-2 bg-blue-500 text-white rounded-md" wire:click="save">Guardar</button>
    </div>
    @if (session()->has('message'))
        <div class="mt-4 p-2 bg-green-500 text-white rounded-md">
            {{ session('message') }}
        </div>
    @endif
</div>