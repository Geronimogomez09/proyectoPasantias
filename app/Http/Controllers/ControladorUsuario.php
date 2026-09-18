<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
            'email' => 'required|email|unique:users,email|ends_with:gmail.com,hotmail.com,outlook.com,yahoo.com',
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
            'email.ends_with' => 'Solo se permiten correos de proveedores válidos (Gmail, Hotmail, Outlook, Yahoo).',
            'email.unique' => 'Este email ya está registrado.',
            'password.required' => 'Se requiere que complete el campo de "Precio"',
            'password.min' => 'La contraseña debe tener 8 caracteres minimo'
        ];

        $validated = $request -> validate($reglas, $mensajes);
        $user = new user();
        $user->nombre = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect('/producto/principal');
    }

    public function create(){
        return view('producto.principal.registro');
    }
    
   public function login(Request $request)
{
    
    $reglas = [
        'email' => 'required|email|ends_with:gmail.com,hotmail.com,outlook.com,yahoo.com',
        'password' => 'required',
    ];
    $mensajes =[
        'email.required' => 'El email es obligatorio.',
        'email.email' => 'El email debe tener un formato válido.',
        'email.ends_with' => 'Solo se permiten correos de proveedores válidos (Gmail, Hotmail, Outlook, Yahoo).',
        'password.required' => 'La contraseña es obligatoria.',
    ];
    $validated = $request -> validate($reglas, $mensajes);
    $credenciales = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    // Envolvemos el intento en un bloque try-catch para atrapar el error de Bcrypt
    try {
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            return redirect('/producto/principal');
        }

        // Este error se muestra si los datos no coinciden pero la contraseña en BD es un hash válido
        return back()->withErrors([
            'email' => 'El email o la contraseña son incorrectos.',
        ])->withInput();

    } catch (\Exception $e) {
        // Este error se activa si salta la excepción de Bcrypt (contraseña en texto plano en la BD)
        return back()->withErrors([
            'email' => 'El email o la contraseña son incorrectos.',
        ])->withInput();
    }
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/usuarios/index');
}


}
