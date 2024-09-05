<div class="bg-black px-4 rounded-lg shadow-md w-full border flex flex-col-reverse md:flex-row items-center justify-center py-8 h-[80vh] ">

    <div class="w-full md:w-1/2 h-full flex flex-col items-start overflow-y-auto ">
        <h2 class="font-bold text-white text-xl text-center w-full border-b-2 h-10">
            Categorias
        </h2>
        <table class="text-white py-10 w-full   ">
            <thead class=" h-auto text-center ">
                <tr class="h-5  border">
                    <td class="w-10">ID</td>
                    <td>Name</td>
                </tr>
            </thead>

            <tbody class="">
                @if ($categories->count())

                    @foreach ($categories as $categorie)
                        <tr class="h-7 border text-center">
                            <td class="w-10 ">{{ $categorie->id }}</td>
                            <td class=" font-bold">{{ $categorie->name }}</td>
                            <td class="w-20 bg-red-500 cursor-pointer">
                                <button wire:click='destroy({{$categorie->id}})'>
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class=" h-full w-full">
                        <td></td>
                        <td class="w-full h-[200px] text-red-600 font-extrabold text-xl  text-center">
                            Aun no hay categorias
                        </td>

                    </tr>
                @endif

            </tbody>
        </table>
    </div>
    <div class="w-full md:w-1/2 xl:px-44 h-full  p-4  flex flex-col justify-center border rounded-md">
        <label for="name" class="w-full font-bold text-xl my-2 text-white">
            Crear nueva categoria
        </label>
        <input 
         type="text" 
         id="name"
         name="name"
         wire:model='name'
         class="mt-2 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black"
        >
        @error('name') 
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        <span class=" text-blue-500 min-h-3">{{$name}}</span>
        <p class="text-slate-500">
            Recuerda crear todas las categorias empezando
            con mayuscula y usando solo caracteres
        </p>


        <button 
         wire:click='save'
         class="mt-4 p-2 bg-blue-500 text-white rounded-md"
        >
            Crear
        </button>
    </div>
