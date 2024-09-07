<div class=" flex h-[90vh] w-full overflow-y-hidden  text-white">



    <aside class=" h-full w-32 bg-opacity-60
    backdrop-blur-lg ">
        <nav class=" w-full h-full ">
            <ul
                class="flex flex-col justify-center items-center gap-8 w-full h-full [&>li:hover]:scale-110 [&>li]:cursor-pointer
                [&>li]:border-b-2 [&>li]:font-semibold [&>li]:w-9/12 [&>li]:text-center [&>li]:rounded-sm [&>li]:py-1 border-r-2">
                <li wire:click='setProductsView'>Productos</li>
                <li wire:click='setTypesView'>Tipos</li>
                <li wire:click='setCategoriesView'>Categorias</li>
            </ul>
        </nav>
    </aside>

    <div class=" h-screen max-h-screen w-full overflow-y-scroll">
        @if ($current == 'products')
            @livewire('admin.handle-products')
        @elseif ($current == 'types')
            @livewire('admin.handle-type')
        @elseif ($current == 'categories')
            @livewire('admin.handle-category')
        @endif
    </div>


    
</div>
