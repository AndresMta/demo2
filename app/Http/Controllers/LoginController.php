<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->except(['destroy']);;
    }

    //Función para mostrar la vista de inicio de sesión.
    public function index() {
        return view('auth.login');
    }

    //Función para iniciar sesión.
    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('login-error', 'Nombre De Usuario O Contraseña Incorrectas');
        }

        return redirect()->route('perfil.index');
    }

    //Función para cerrar sesión
    public function destroy() {
        auth()->logout();
        return redirect()->route('login');
    }
}
