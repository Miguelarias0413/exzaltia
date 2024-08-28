<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index(){

        return view('auth.register');
    }
    public function store(Request $request){
        
        if(!$request->input('terms')){

            return redirect()->back()->with(['message'=>
            'Debes aceptar terminos y condiciones para crear la cuenta'
        ]);
        }
        
        $request->validate([
            'nombres' => 'required|string|max:30',
            'apellidos' => 'required|string|max:30',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'telefono' => 'required|string|max:15',
            'terms' => 'accepted',
        ]);

        User::create([
            'name' => $request->input('nombres'),
            'surname' => $request->input('apellidos'),
            'email' => $request->input('email'),
            'password'=> Hash::make($request->input('password')),
            'is_administrator'=> false,
            'phone_number' => $request->input('telefono')
        ]);

        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Si la autenticación falla, redirigir de vuelta al formulario de registro con un mensaje de error
            return redirect()->back()->with(['message' => 'Las credenciales no coinciden con nuestros registros.']);
        }
        
        // Redirigir al usuario a la página de inicio o a donde desees
        return redirect()->route('landing.index');


    }
}
