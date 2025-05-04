@extends('layouts.app')

@section('contenido')
    <div class=" flex w-full flex-col md:flex-row h-[100vh] max-h-screen bg-gray-300">
        <div class=" flex-col w-full h-full max-h-screen  flex justify-center gap-2 px-4">
            {{-- {{dd(Auth::user()->shoppingCart->clothingItems()->sum('price'))}} --}}
            @if ($clothingItems->isNotEmpty())
                @foreach ($clothingItems as $clothingItem)
                    <article
                        class=" w-full h-36 bg-white rounded-lg flex items-center justify-around  px-4 shadow-black shadow-2xl">
                        <img class="size-32" src="{{ Storage::url($clothingItem->gallery->front_image) }}"
                            alt="{{ $clothingItem->name }}">
                        <div class=" h-full w-auto flex flex-col justify-center gap-2 px-4">
                            <h3 class="text-xl font-semibold">{{ $clothingItem->name }}</h3>
                            <p>{{ $clothingItem->color }}</p>
                        </div>
                        <p class="font-bold text-2xl text-slate-700">$<span
                                class="font-black text-xl">{{ $clothingItem->price }}</span></p>
                        <form action="{{ route('cart.destroy', $clothingItem->id) }}" method="POST">
                            @csrf
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 flex-shrink-0 text-red-500 cursor-pointer hover:text-red-700"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0a2 2 0 012-2h4a2 2 0 012 2m-6 0V5a1 1 0 011-1h2a1 1 0 011 1v2" />
                                </svg>
                            </button>
                        </form>
                    </article>
                @endforeach
            @else
                <div class="w-full h-full flex items-center justify-center">
                    <p class="text-xl font-semibold text-gray-700">No tienes items en el carrito aún.</p>
                </div>
            @endif
        </div>
        <div class=" flex-col w-full h-full max-h-screen flex items-center justify-center overflow-y-scroll">

            <div class="flex flex-col items-center justify-start bg-white p-6 rounded-lg shadow-md w-96 h-auto  ">

                <h2 class=" mb-4 uppercase text-2xl font-bold text-slate-800 text-center">Elige un metodo de pago</h2>
                <div class=" w-full h-auto py-2 flex items-center justify-evenly ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                    <img class="size-10" src="{{ asset('images/paymentMethods/pse-seeklogo.svg') }}" alt="PSE"
                        class="inline-block w-6 h-6 mr-2">

                </div>
                <select id="paymentMethod"
                    class="w-full outline outline-black h-10 rounded-md uppercase font-bold text-center shrink-0">
                    <option value="" disabled class="text-gray-500">
                        Selecciona un método de pago
                    </option>
                    <option value="pse" selected>
                        PSE
                    </option>
                    <option value="credit_card">
                        Tarjeta de Crédito
                    </option>
                </select>

                <form id="credit_card_form" action="{{ route('cart.makePayment') }}" method="POST"
                    class="flex-col hidden items-center justify-center  p-6  w-96 h-auto">
                    @csrf
                    <input type="hidden" name="paymentMethod" value="credit_card">
                    <div class=" w-full">
                        <label for="card-number" class="w-full mb-2">Número de tarjeta</label>
                        <input type="text" id="card-number" name="card-number"
                            maxlength="19"
                            class="w-full p-2 border border-gray-300 rounded mb-4 @error('card-number') border-red-500 @enderror"
                            placeholder="1234 5678 9012 3456">

                    </div>
                    <div class="w-full flex gap-4">
                        <div class="w-1/2">
                            <label for="expiry-date" class="w-full mb-2 block">Fecha de expiración</label>
                            <input type="text" id="expiry-date" name="expiry-date" 

                            maxlength="5"
                                class="w-full p-2 border border-gray-300 rounded mb-4 @error('expiry-date') border-red-500 @enderror"
                                placeholder="MM/AA">
                        </div>
                        <div class="w-1/2">
                            <label for="cvv" class="w-full mb-2 block">CVV</label>
                            <input type="text" id="cvv" name="cvv"
                            maxlength="3"
                                class="w-full p-2 border border-gray-300 rounded mb-4 @error('cvv') border-red-500 @enderror"
                                placeholder="123">
                        </div>
                    </div>
                    <div class=" w-full">
                        <label for="first_name" class="w-full">Nombres</label>
                        <input type="text" id="first_name" name="first_name"
                            value="{{ Auth::user() ? Auth::user()->name ?? '' : '' }}"
                            class="w-full p-2 border border-gray-300 rounded mb-4 @error('first_name') border-red-500 @enderror"
                            placeholder="Nombres">

                    </div>
                    <div class=" w-full">
                        <label for="last_name" class="w-full">Apellidos</label>
                        <input type="text" id="last_name" name="last_name"
                            class="w-full p-2 border border-gray-300 rounded mb-4 @error('last_name') border-red-500 @enderror"
                            placeholder="Apellidos">
                    </div>
                    <div class=" w-full">

                        <label for="email" class="w-full">Email</label>
                        <input type="email" id="email" name="email"
                            value="{{ Auth::user() ? Auth::user()->email ?? '' : '' }}"
                            class="w-full p-2 border border-gray-300 rounded mb-4 @error('email') border-red-500 @enderror"
                            placeholder="Email">

                    </div>
                    <div class=" w-full">

                        <label for="phone" class="w-full">Teléfono</label>
                        <input type="text" id="phone" name="phone"
                            value="{{ Auth::user() ? Auth::user()->phone_number ?? '' : '' }}"
                            class="w-full p-2 border border-gray-300 rounded mb-4 @error('phone') border-red-500 @enderror"
                            placeholder="Teléfono">

                    </div>
                    <div class=" w-full">

                        <label for="identification_number" class="w-full">Número de identificación</label>
                        <input type="text" id="identification_number" name="identification_number"
                            value="{{ Auth::user() ? Auth::user()->identification ?? '' : '' }}"
                            class="w-full p-2 border border-gray-300 rounded mb-4 @error('identification_number') border-red-500 @enderror"
                            placeholder="Número de identificación">
                    </div>
                    @error('paymentMethod')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @error('first_name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @error('last_name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @error('phone')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @error('identification_number')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    @error('paymentBank')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror



                    <button type="submit"
                        class="bg-green-500 w-full text-white px-4 py-2 rounded hover:bg-blue-600">Pagar</button>
                </form>
                <form id="pse_form" action="{{ route('cart.makePayment') }}" method="POST"
                    class="flex-col items-center flex justify-between gap-2 p-6 rounded-lg w-96">
                    @csrf
                    <input type="hidden" name="paymentMethod" value="pse">

                    <select name="paymentBank" id="paymentBank"
                        class="w-full border border-amber-500 h-10 rounded-md uppercase font-bold text-center shrink-0 @error('paymentBank') border-red-500 @enderror">

                        {{-- //LISTAR BANCOS --}}
                        @foreach ($pseBanks->data as $bank)
                            @if ($bank->bankCode == 0)
                                <option value="" disabled selected class="text-gray-500 ">
                                    SELECCIONA UN BANCO
                                </option>
                            @else
                                <option value="{{ $bank->bankCode }}">
                                    {{ $bank->bankName }}
                                </option>
                            @endif
                        @endforeach

                    </select>
                    <div class=" w-full">
                        <label for="first_name" class="w-full">Nombres</label>
                        <input type="text" id="first_name" name="first_name"
                            value="{{ Auth::user() ? Auth::user()->name ?? '' : '' }}"
                            class="w-full p-2 border border-gray-300 rounded mb-4 @error('first_name') border-red-500 @enderror"
                            placeholder="Nombres">

                    </div>
                    <div class=" w-full">
                        <label for="last_name" class="w-full">Apellidos</label>
                        <input type="text" id="last_name" name="last_name"
                            class="w-full p-2 border border-gray-300 rounded mb-4 @error('last_name') border-red-500 @enderror"
                            placeholder="Apellidos">
                    </div>
                    <div class=" w-full">

                        <label for="email" class="w-full">Email</label>
                        <input type="email" id="email" name="email"
                            value="{{ Auth::user() ? Auth::user()->email ?? '' : '' }}"
                            class="w-full p-2 border border-gray-300 rounded mb-4 @error('email') border-red-500 @enderror"
                            placeholder="Email">

                    </div>
                    <div class=" w-full">

                        <label for="phone" class="w-full">Teléfono</label>
                        <input type="text" id="phone" name="phone"
                            value="{{ Auth::user() ? Auth::user()->phone_number ?? '' : '' }}"
                            class="w-full p-2 border border-gray-300 rounded mb-4 @error('phone') border-red-500 @enderror"
                            placeholder="Teléfono">

                    </div>
                    <div class=" w-full">

                        <label for="identification_number" class="w-full">Número de identificación</label>
                        <input type="text" id="identification_number" name="identification_number"
                            value="{{ Auth::user() ? Auth::user()->identification ?? '' : '' }}"
                            class="w-full p-2 border border-gray-300 rounded mb-4 @error('identification_number') border-red-500 @enderror"
                            placeholder="Número de identificación">
                    </div>
                    @error('paymentMethod')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @error('first_name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @error('last_name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @error('phone')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @error('identification_number')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    @error('paymentBank')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    <button type="submit"
                        class="bg-green-500 w-full text-white px-4 py-2 rounded hover:bg-blue-600">Pagar</button>
                </form>
            </div>

        </div>
    </div>
    <script>
        function Main() {
            toggleForms();
            formatInputs();
        }
        function toggleForms(){
            const selectorPaymentMethod = document.querySelector('#paymentMethod');
            const credit_card_form = document.querySelector('#credit_card_form');
            const pse_form = document.querySelector('#pse_form');
            selectorPaymentMethod.addEventListener('change', () => {


                if (selectorPaymentMethod.value == 'credit_card') {
                    credit_card_form.style.display = 'flex';
                    pse_form.style.display = 'none';


                } else if (selectorPaymentMethod.value == 'pse') {
                    pse_form.style.display = 'flex';
                    credit_card_form.style.display = 'none';
                }

            });

        }

        function formatInputs(){
            const expiracionTarjetaInput = document.querySelector('#expiry-date')

            expiracionTarjetaInput.addEventListener('input', (e) => {
                let value = e.target.value.replace(/\D/g, ''); // Remove non-numeric characters
                if (value.length > 2) {
                    value = value.slice(0, 2) + '/' + value.slice(2, 4); // Add '/' after the first two digits
                }
                e.target.value = value.slice(0, 5); // Limit to 5 characters (MM/AA)
            });

            const numeroDeTarjeta = document.querySelector('#card-number');

            numeroDeTarjeta.addEventListener('input', (e) => {
                let value = e.target.value.replace(/\D/g, ''); // Remove non-numeric characters
                value = value.match(/.{1,4}/g)?.join(' ') || value; // Group digits in sets of 4
                e.target.value = value.slice(0, 19); // Limit to 19 characters (16 digits + 3 spaces)
            });


        }
        addEventListener('DOMContentLoaded', Main)
    </script>
@endsection
