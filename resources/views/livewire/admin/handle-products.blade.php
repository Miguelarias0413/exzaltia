<div class="relative overflow-x-auto shadow-md">
    <div class=" w-full h-20 flex items-center justify-end gap-2 md:px-4">

        <h2 class="font-bold text-2xl mr-auto">Productos</h2>

        <a wire:click="$toggle('showDeleteModal')"
            class="closeDeleteModal bg-red-400 border-red-600 border uppercase py-1 p-3 cursor-pointer">
            Eliminar
          
        </a>
        <a href="" class=" bg-blue-400 border-blue-600 border uppercase py-1 p-3" '>
            Editar
        </a>
        <a href="{{ route('admin.create') }}" class=" bg-green-500 border-green-600 border uppercase py-1 p-3">
            Crear
        </a>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-hidden">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre del producto
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Tipo de prenda
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3">
                    Precio
                </th>
            </tr>

        </thead>
        <tbody>
            @if ($clothing_items->count())
                @foreach ($clothing_items as $product)
<tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class=" w-full flex justify-center flex-col items-center gap-2 " href="">
                                {{ $product->name }}
                                <img class=" w-20 h-full" src="{{ Storage::url($product->gallery->front_image) }}">

                            </a>
                        </th>

                        <td class="px-6 py-4">
                            {{ $product->description }}

                        </td>
                        <td class="px-6 py-4">
                            {{ $product->color }}

                        </td>
                        <td class="px-6 py-4">
                            {{ $product->type->name }}

                        </td>
                        <td class="px-6 py-4">
                            {{ $product->category->name }}

                        </td>
                        <td class="px-6 py-4">
                            {{ '$' . $product->price }}

                        </td>
                    </tr>
@endforeach
@else
<tr>
                    <th>No hay productos aún</th>
                </tr>
            @endif
</div>
</tbody>
</table>

{{-- modal editar --}}
<div class="hidden fixed bg-stone-400 bg-opacity-40 z-50 inset-0">
    <div
        class=" w-6/12  h-5/6 min-w-96  bg-slate-100 rounded-lg absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 py-2 shadow-2xl ">
        <h3 class=" text-2xl font-bold text-blue-600 text-cente border-b-2 text-center border-slate-200">
            Editar un producto
        </h3>

        <form class="  w-full h-full p-4 flex flex-col items-center">
            <div class=" w-11/12  flex justify-center flex-col text-black">
                <label for="clothing_item" class="text-lg font-semibold">Seleccionar producto</label>
                <select class="w-full h-8 " name="" id="clothing_item">
                    <option value="" disabled selected>Selecciona un producto</option>
                    <option value="">holaa</option>
                </select>
            </div>

        </form>

    </div>

</div>

{{-- modal borrar --}}
<div id="deleteModal" class="{{ $showDeleteModal ? '' : 'hidden' }} fixed bg-stone-400 bg-opacity-40 z-50 inset-0">
    <div
        class=" w-6/12  h-5/6 min-w-96  bg-slate-100 rounded-lg absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 py-2 shadow-2xl ">

        <svg  wire:click="$toggle('showDeleteModal')" 
        wire:click="$refresh"  class="closeDeleteModal absolute left-2 top-2 w-8 h-8 text-black cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>

        <h3 class=" text-2xl font-bold text-red-500 text-cente border-b-2 text-center border-slate-200">
            Eliminar un producto
            {{$showDeleteModal}}
        </h3>

        <div class="  w-full h-full p-4 flex flex-col items-center justify-center gap-8 ">
            <div class=" w-11/12  flex justify-center flex-col text-black my-8">
                <label for="clothing_item" class="text-lg font-semibold">Seleccionar producto</label>
                <select class="w-full h-10 shadow-xl " id="clothing_item" wire:model.live='idClothingItemToDelete'>
                    <option value="" disabled selected>Selecciona un producto</option>
                    @foreach ($clothing_items as $clothing_item)
<option value="{{ $clothing_item->id }}">{{ $clothing_item->name }}</option>
@endforeach
                </select>
            </div>
            <button wire:click='delete({{ $idClothingItemToDelete }})'
                class=" bg-red-600 border-2 border-red-500 px-4 py-2 uppercase  text-white font-bold shadow-xl">
                Borrar
            </button>

        </div>

    </div>

</div>
</div>
{{-- @vite(['resources/js/admin/handle-products.js']) --}}
