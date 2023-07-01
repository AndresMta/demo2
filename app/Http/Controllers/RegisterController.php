<?php

namespace App\Http\Controllers;

//Models
use App\Models\User;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Función para mostrar la vista de registro.
     */
    public function index() {
        return view('auth.register');
    }

    /**
     * Función para dar de alta a un nuevo gerente.
     */
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => ['confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/'] //'required|confirmed|min:6'
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password
        ]);

        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('perfil.index');
    }
}
