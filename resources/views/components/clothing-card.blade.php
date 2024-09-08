<div class="w-60  md:w-80 transparent bg-opacity-10 rounded shadow-xl backdrop-blur-4xl [&:hover>div>button]:opacity-100 [&:hover>div>a>img]:scale-110 [&>div>a>h5]:underline [&:hover>div>a>h5]: ">

    <div class="relative border-yellow-400 border overflow-hidden ">
        <a class="" href="{{route('clothing.show',$clothing_item)}}  ">
            <img class="aspect-square transition-transform " src="{{ Storage::url($clothing_item->gallery->front_image) }}" alt="product image" />

        </a>

        <button 
            class=" hidden md:inline-block opacity-0 absolute left-1/2 bottom-4 -translate-x-1/2 uppercase bg-white font-bold px-5 text-nowrap py-2 border-2 border-black hover:border-white hover:bg-black hover:text-white transition-opacity ">
            Añadir al carrito
        </button>
        

    </div>


    <div class="px-5 py-5 flex flex-col items-center gap-5 uppercase">
        <button 
            class=" 
             md:hidden 
             uppercase bg-white font-bold px-5 text-nowrap py-2 border-2 border-black hover:border-white hover:bg-black hover:text-white transition-opacity ">
            Añadir al carrito
        </button>
        <a href="{{route('clothing.show',$clothing_item)}}">
            <h5 class="text-md text-center font-bold tracking-tight text-white">
                {{ $clothing_item->name }}
            </h5>
        </a>

        <div class="flex items-center justify-between">
            <span class="text-md md:text-2xl text-gray-900 dark:text-white text-center">

                ${{ number_format($clothing_item->price,0) .' COP' }}
            </span>

        </div>
    </div>
</div>
