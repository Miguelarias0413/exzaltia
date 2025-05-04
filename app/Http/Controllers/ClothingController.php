<?php

namespace App\Http\Controllers;

use App\Models\ClothingItem;
use App\Models\ShoppingCart;
use App\Services\EpaycoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ClothingController extends Controller
{
    //
    protected $epaycoService;

    public function __construct(EpaycoService $epaycoService)
    {
        $this->epaycoService = $epaycoService;
    }
    public function show(ClothingItem $clothingitem){
  
        $pseBanks = $this->epaycoService->getBanks();

        return view('clothing.show', [
            'pseBanks' => $pseBanks,
            'clothing_item' => $clothingitem
        ]);
    }


    public function cartIndex(){
        $pseBanks = $this->epaycoService->getBanks();

        $clothingItemsFromUserCart = Auth::user()->shoppingCart->clothingItems;
        return view('clothing.cart', ['clothingItems'=> $clothingItemsFromUserCart, 'pseBanks' => $pseBanks]);
    }

    public function destroy(ClothingItem $clothingItem){
        Auth::user()->shoppingCart->clothingItems()->detach($clothingItem->id);
        return back();
    }

    public function addClothingToUserCart(Request $request){
        if (!$request->input('id')){
            return response()->json([
                'success' => false,
                'message' => 'Error obteniendo la id de el producto'
            ]);
        }

        $clothingitemToAssociateWithUser = ClothingItem::find($request->input('id'));
        $userShoppingCart = $request->user()->shoppingCart;

        // Check if the clothing item is already in the user's shopping cart
        
        $exists = $userShoppingCart->clothingItems()
            ->where('clothing_item_id', $clothingitemToAssociateWithUser->id)
            ->exists();

        if ($exists) {
            return response()->json([
            'success' => true,
            'message' => 'El producto ya está en tu carrito'
            ]);
        }

        // Attach the clothing item to the user's shopping cart
        $userShoppingCart->clothingItems()->attach($clothingitemToAssociateWithUser->id);
        return response()->json([
            'success' => true,
            'message' => 'El producto se ha añadido a tu carrito'
        ]);
    }

    public function makePayment(Request $request , EpaycoService $epaycoService){
       
        $paymentMethod = $request->input('paymentMethod');
        if(!$paymentMethod){
            return back()->with('error', 'No se ha proporcionado un método de pago');
        }
        if($paymentMethod == 'pse'){
            $request->validate([
                'paymentMethod' => 'required|string|in:pse,credit_card',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:10',
                'identification_number' => 'required|string|max:20',
                'paymentBank' => 'required|integer'
            ], [
                'paymentMethod.required' => 'El método de pago es obligatorio.',
                'paymentMethod.string' => 'El método de pago debe ser una cadena de texto.',
                'paymentMethod.in' => 'El método de pago debe ser pse o tarjeta de crédito.',
                'first_name.required' => 'El nombre es obligatorio.',
                'first_name.string' => 'El nombre debe ser una cadena de texto.',
                'first_name.max' => 'El nombre no puede tener más de 255 caracteres.',
                'last_name.required' => 'El apellido es obligatorio.',
                'last_name.string' => 'El apellido debe ser una cadena de texto.',
                'last_name.max' => 'El apellido no puede tener más de 255 caracteres.',
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'El correo electrónico debe ser una dirección válida.',
                'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
                'phone.required' => 'El número de teléfono es obligatorio.',
                'phone.string' => 'El número de teléfono debe ser una cadena de texto.',
                'phone.max' => 'El número de teléfono no puede tener más de 10 caracteres.',
                'identification_number.required' => 'El número de identificación es obligatorio.',
                'identification_number.string' => 'El número de identificación debe ser una cadena de texto.',
                'identification_number.max' => 'El número de identificación no puede tener más de 20 caracteres.',
                'paymentBank.required' => 'El banco de pago es obligatorio.',
                'paymentBank.integer' => 'El banco de pago debe ser un número entero.'
            ]);
            $orderData = array(
                "bank" => $request->input('paymentBank'),
                "invoice" => "1472050778",
                "description" => "Pago pruebas",
                "value" => Auth::user()->shoppingCart->clothingItems()->sum('price'),
                "tax" => "0",
                "tax_base" => "0",
                "currency" => "COP",
                "type_person" => "0",
                "doc_type" => "CC",
                "doc_number" => $request->input('identification_number'),
                "name" => $request->input('first_name'),
                "last_name" => $request->input('last_name'),
                "email" => $request->input('email'),
                "country" => "CO",
                "city" => "Bogota",
                "cell_phone" => $request->input('phone'),
                "ip" => $request->ip(),  // This is the client's IP, it is required
                "url_response" => route('landing.index'),
                "url_confirmation" => route('landing.index'),
                "metodoconfirmacion" => "GET",
    
                //Los parámetros extras deben ser enviados tipo string, si se envía tipo array generara error.
                // "extra1" => "",
                // "extra2" => "",
                // "extra3" => "",
                // "extra4" => "",
                // "extra5" => "",
                // "extra6" => "",
                // "extra7" => "",
            );
            $pseResponse = $epaycoService->createPSE($orderData);
            dd($pseResponse);

        }
        if($paymentMethod == 'credit_card'){
            $request->validate([
                'paymentMethod' => 'required|string|in:credit_card',
                'card-number' => 'required|string|regex:/^\d{4}\s\d{4}\s\d{4}\s\d{4}$/',
                'expiry-date' => 'required|string|regex:/^\d{2}\/\d{2}$/',
                'cvv' => 'required|string|regex:/^\d{3}$/',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:10',
                'identification_number' => 'required|string|max:20',
            ], [
                'paymentMethod.required' => 'El método de pago es obligatorio.',
                'paymentMethod.string' => 'El método de pago debe ser una cadena de texto.',
                'paymentMethod.in' => 'El método de pago debe ser tarjeta de crédito.',
                'card-number.required' => 'El número de tarjeta es obligatorio.',
                'card-number.string' => 'El número de tarjeta debe ser una cadena de texto.',
                'card-number.regex' => 'El número de tarjeta debe tener el formato 1234 1234 1234 1234.',
                'expiry-date.required' => 'La fecha de expiración es obligatoria.',
                'expiry-date.string' => 'La fecha de expiración debe ser una cadena de texto.',
                'expiry-date.regex' => 'La fecha de expiración debe tener el formato MM/YY.',
                'cvv.required' => 'El CVV es obligatorio.',
                'cvv.string' => 'El CVV debe ser una cadena de texto.',
                'cvv.regex' => 'El CVV debe tener exactamente 3 dígitos.',
                'first_name.required' => 'El nombre es obligatorio.',
                'first_name.string' => 'El nombre debe ser una cadena de texto.',
                'first_name.max' => 'El nombre no puede tener más de 255 caracteres.',
                'last_name.required' => 'El apellido es obligatorio.',
                'last_name.string' => 'El apellido debe ser una cadena de texto.',
                'last_name.max' => 'El apellido no puede tener más de 255 caracteres.',
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'El correo electrónico debe ser una dirección válida.',
                'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
                'phone.required' => 'El número de teléfono es obligatorio.',
                'phone.string' => 'El número de teléfono debe ser una cadena de texto.',
                'phone.max' => 'El número de teléfono no puede tener más de 10 caracteres.',
                'identification_number.required' => 'El número de identificación es obligatorio.',
                'identification_number.string' => 'El número de identificación debe ser una cadena de texto.',
                'identification_number.max' => 'El número de identificación no puede tener más de 20 caracteres.',
            ]);

            dd($request->all());
        }
        
    }

    public function getQuantityFromCart(Request $request){
        $shoppingCart = $request->user()->shoppingCart;

        // Get the total quantity of clothing items in the shopping cart
        $totalQuantity = $shoppingCart->clothingItems()
            ->where('shoppingcart_id', $request->user()->shoppingCart->id)->count();

        return response()->json([
            'success' => true,
            'data' => $totalQuantity
        ]);
    }
    
}
