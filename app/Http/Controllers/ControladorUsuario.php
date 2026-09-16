<?php

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\Http\Request;

class ControladorUsuario extends Controller
{
    public function Usuario(){
        return view('/usuarios/index');
    }

    public function registro(){
        return view('/usuarios/registro');
    }
    public function store(Request $request){
        //1ra parte
        $reglas = 
        [
            'nombre' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ];

        //segunda parte
        $mensajes =
        [
            'nombre.required' =>'Se requiere que complete el campo "Nombre"',
            'nombre.min' =>'Se requiere que el campo "Nombre" contenga un minimo de 3 caracteres',
            'nombre.max' => 'Se requiere que el campo "Nombre" no supere los 50 caracteres',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe tener un formato válido, por ejemplo: usuario@gmail.com.',
            'email.unique' => 'Este email ya está registrado.',
            'password.required' => 'Se requiere que complete el campo de "Precio"',
            'password.min' => 'La contraseña debe tener 8 caracteres minimo'
        ];

        $validated = $request -> validate($reglas, $mensajes);
        $user = new user();
        $user->nombre = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return redirect('/producto/principal');
    }

}
