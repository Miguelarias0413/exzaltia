<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exzaltia - @yield('title')</title>
    <link rel="shortcut icon" href="{{asset('images/ico/exzaltiaDorada.ico')}}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/layouts/header.js'])

</head>

<body class=" relative">

    <div class=" block w-full h-20">

        <header id="header"
            class=" shadow-lg fixed top-0 w-full h-20 bg-black  flex justify-between px-4 transition-colors backdrop-blur-md z-50  bg-[#ffffff7d]">

            <div class=" h-full w-auto py-6 cursor-pointer  ">
                <svg id="icono-hamburguesa" class=" h-full  text-white" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>


            </div>

            <a href="{{ route('landing.index') }}">

                <svg id="logo-exzaltia" class="h-full w-28  md:w-40 ml-[35%] md:ml-[50%]  py-6 text-white"
                    version="1.0" xmlns="http://www.w3.org/2000/svg" width="1664.000000pt" height="404.000000pt"
                    viewBox="0 0 1664.000000 404.000000" preserveAspectRatio="xMidYMid meet">

                    <g transform="translate(0.000000,404.000000) scale(0.100000,-0.100000)" fill="currentColor"
                        stroke="none">
                        <path d="M15360 3590 c0 -28 2 -30 40 -30 l40 0 0 -250 0 -250 30 0 30 0 0
                    250 0 250 45 0 c43 0 45 1 45 30 l0 30 -115 0 -115 0 0 -30z" />
                        <path d="M15650 3340 l0 -280 30 0 30 0 2 213 3 212 43 -177 c59 -242 62 -250
                    75 -245 7 2 35 98 64 213 l51 209 1 -212 1 -213 30 0 30 0 0 280 0 280 -40 0
                    c-45 0 -35 23 -95 -222 -22 -86 -42 -155 -45 -153 -4 2 -26 87 -50 189 l-44
                    186 -43 0 -43 0 0 -280z" />
                        <path d="M12965 3476 c-113 -37 -217 -125 -261 -221 -87 -190 -27 -383 145
                    -463 185 -86 436 16 529 215 24 51 27 70 27 158 0 84 -4 107 -23 146 -31 63
                    -86 117 -152 148 -65 31 -198 39 -265 17z" />
                        <path d="M1100 3265 c0 -4 -592 -2698 -605 -2752 l-5 -23 1020 0 c561 0 1020
                    2 1020 4 0 5 114 529 125 574 l5 22 -654 0 c-360 0 -657 3 -659 7 -3 5 12 82
                    33 173 21 91 45 200 55 243 l17 77 644 0 644 0 5 23 c23 102 125 571 125 578
                    0 5 -283 9 -640 9 -506 0 -640 3 -640 13 1 6 22 111 48 232 l48 220 662 3
                    c364 1 662 4 662 7 0 4 114 528 125 573 l5 22 -1020 0 c-561 0 -1020 -2 -1020
                    -5z" />
                        <path d="M10126 3198 c-99 -451 -587 -2669 -591 -2686 l-5 -22 322 2 322 3
                    303 1375 c166 756 303 1381 303 1388 0 9 -70 12 -319 12 l-319 0 -16 -72z" />
                        <path d="M11337 3043 c-3 -5 -31 -128 -63 -275 l-58 -268 -168 0 c-92 0 -168
                    -2 -168 -5 0 -3 -27 -125 -60 -272 -33 -146 -60 -267 -60 -269 0 -2 75 -4 166
                    -4 l166 0 -5 -22 c-45 -183 -197 -902 -202 -958 -21 -231 94 -402 325 -482
                    186 -64 478 -62 626 6 l54 25 0 259 0 260 -42 -15 c-60 -21 -169 -14 -205 13
                    -90 68 -90 104 10 554 43 189 81 348 85 352 4 4 97 9 206 10 l199 3 58 255
                    c32 140 58 263 59 273 0 16 -16 17 -200 17 -110 0 -200 2 -200 5 0 8 110 508
                    116 528 5 16 -14 17 -315 17 -176 0 -322 -3 -324 -7z" />
                        <path d="M8025 2535 c-131 -24 -246 -71 -357 -146 -461 -313 -671 -1109 -420
                    -1594 49 -95 172 -218 267 -267 122 -64 208 -83 375 -83 136 0 150 2 231 31
                    101 36 201 100 282 179 65 66 67 64 37 -65 -11 -47 -20 -88 -20 -92 0 -5 143
                    -8 318 -8 l319 0 221 997 c122 549 222 1001 222 1006 0 4 -143 7 -318 7 l-318
                    0 -24 -107 c-13 -60 -25 -111 -26 -114 -2 -4 -37 26 -76 66 -166 165 -446 240
                    -713 190z m424 -570 c80 -21 156 -61 212 -113 l51 -47 -69 -305 c-68 -301 -70
                    -306 -106 -342 -53 -54 -133 -104 -207 -128 -91 -31 -220 -25 -302 12 -201 93
                    -276 326 -188 584 55 158 182 288 328 335 70 22 205 25 281 4z" />
                        <path d="M14205 2535 c-131 -24 -246 -71 -357 -146 -461 -313 -671 -1109 -420
                    -1594 49 -95 172 -218 267 -267 122 -64 208 -83 375 -83 136 0 150 2 231 31
                    101 36 201 100 282 179 65 66 67 64 37 -65 -11 -47 -20 -88 -20 -92 0 -5 143
                    -8 318 -8 l319 0 221 997 c122 549 222 1001 222 1006 0 4 -143 7 -318 7 l-318
                    0 -24 -107 c-13 -60 -25 -111 -26 -114 -2 -4 -37 26 -76 66 -166 165 -446 240
                    -713 190z m424 -570 c80 -21 156 -61 212 -113 l51 -47 -69 -305 c-68 -301 -70
                    -306 -106 -342 -53 -54 -133 -104 -207 -128 -91 -31 -220 -25 -302 12 -201 93
                    -276 326 -188 584 55 158 182 288 328 335 70 22 205 25 281 4z" />
                        <path d="M3153 2488 c3 -7 98 -227 212 -490 l207 -476 -423 -479 c-232 -263
                    -438 -495 -457 -515 l-36 -38 364 1 365 0 240 280 c132 154 250 289 261 300
                    l21 20 41 -98 c23 -54 79 -188 125 -298 l84 -200 342 -3 c187 -1 341 -1 341 1
                    0 2 -103 234 -230 516 l-229 513 406 462 c223 253 417 473 431 489 l26 27
                    -365 0 -364 -1 -220 -260 c-121 -143 -225 -264 -231 -270 -7 -6 -44 74 -119
                    261 l-109 270 -344 0 c-271 0 -343 -3 -339 -12z" />
                        <path d="M5422 2458 c-19 -75 -112 -498 -112 -508 0 -7 135 -10 390 -10 l389
                    0 -502 -489 -502 -490 -48 -223 c-26 -123 -47 -229 -47 -235 0 -10 176 -13
                    844 -13 796 0 845 1 850 18 3 9 28 123 56 252 28 129 54 245 57 257 l5 23
                    -407 0 c-224 0 -405 4 -403 9 2 4 230 231 508 503 l506 495 48 209 c26 115 50
                    217 52 227 5 16 -39 17 -834 17 l-840 0 -10 -42z" />
                        <path d="M12366 1518 c-119 -541 -220 -993 -223 -1006 l-5 -22 321 0 321 0 5
                    23 c3 12 104 464 224 1005 l218 982 -322 0 -321 0 -218 -982z" />
                    </g>
                </svg>
            </a>

            <nav class=" text-white">
                <ul class=" flex items-center justify-center px-8 gap-5 w-full h-full [&>*]:font-bold">


                    <li class=" cursor-pointer relative flex flex-col items-center ">

                        @auth
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                    clip-rule="evenodd" />
                            </svg>

                        @endauth
                        @guest
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>

                        @endguest

                        @guest
                            <div id=""
                                class="dropdown__user hidden bg-black -left-[200%] top-[150%] border border-slate-50 border-2 absolute p-4 flex flex-col gap-4">
                                <a href="{{ route('login') }}"
                                    class=" uppercase text-center border-b  hover:bg-slate-50 hover:text-black">
                                    Ingresar
                                </a>
                                <a href="{{ route('register.index') }}"
                                    class=" uppercase text-center border-b  hover:bg-slate-50 hover:text-black">
                                    Registrarse
                                </a>
                            </div>
                        @endguest
                        @auth
                            <div id=""
                                class="dropdown__user hidden bg-black -left-[220%] top-[150%] border border-slate-50 border-2 absolute px-9 py-4 flex flex-col gap-4">
                                <a href="{{ route('account.index', auth()->user()) }}"
                                    class=" uppercase text-center border-b  hover:bg-slate-50 hover:text-black">
                                    Cuenta
                                </a>
                                <form action="{{ route('logout.logout') }}" method="POST"
                                    class="uppercase text-center border-b w-28  hover:bg-slate-50  text-nowrap hover:text-black">
                                    @csrf
                                    <button>
                                        CERRAR SESION
                                    </button>

                                </form>
                                @if (auth()->user()->is_administrator === 1)
                                    <a href="{{route('admin.index')}}"
                                        class=" uppercase text-center border-b  hover:bg-slate-50 hover:text-black">
                                        Administrar
                                    </a>
                                @endif

                            </div>
                        @endauth


                    </li>
                    <li class=" cursor-pointer">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>

                    </li>
                    <li>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>

    </div>


    <div id="container__searchbar"
        class=" fixed left-0 top-0 hidden flex gap-4 justify-center items-center w-full h-28  bg-white  z-[60]  border-2 border-black">
        <label class=" font-bold text-xl hidden" for="searchbar"> BUSCAR </label>
        <input class="w-96 h-8 rounded-sm outline-0 px-4 bg-slate-200" type="text"
            placeholder="Busca en nuestra tienda" id="searchbar">
        <button id="close__search-container" class=" w-9 h-9">
            <svg class=" place-items-center" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </button>

    </div>
    <aside
        class=" w-full h-screen lg:w-1/3 bg-neutral-900 fixed top-0 left-0 z-[51] transition-transform transform -translate-x-full
        flex flex-col items-center justify-center text-white "
        id="aside-hamburguesa"
    >
    <div class=" w-10/12 h-[80%] flex flex-col items-center justify-center gap-4 uppercase underline font-semibold text-xl">

        <a href="">
            Pagina de inicio
        </a>
        <a href="">
            Sección 1
        </a>
        <a href="">
            Sección 2
        </a>
        <a href="">
            ¿Quienes somos?
        </a>

        <svg id="close__aside-hamburguesa" class=" w-12 h-12 cursor-pointer hover:scale-150 transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
        </svg>

    </div>


    </aside>

    </header>

    <main class=" w-full overflow-x-hidden bg-black">
       
       
        @yield('contenido')
    </main>

</body>

</html>
