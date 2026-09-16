<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ControladorProducto extends Controller
{
        public function Principal(){
    $productos=Producto::all();
    return view('/producto/principal', compact('productos'));
    }

    public function destroy($id)
{
    $producto= Producto::find($id);
    $producto->delete();
    return back();
}

    public function edit($id)
{
    $productos = Producto::find($id);
    return view('producto.edit')->with(compact('productos'));
}

public function update(Request $request, $id){
    $producto= Producto::Find($id);
    $producto->nombre = $request->input('nombre');
    $producto->descripcion = $request->input('descripcion');
    $producto->descripcion_larga = $request->input('descripcion_larga');
    $producto->precio = $request->input('precio');
    $producto->stock = $request->input('stock');
    $producto->save();
    return redirect('/producto/principal');
}

    public function create()
    {
        return view('/producto/create');
    }

    public function store(Request $request){
    $reglas = [
        'nombre' => 'required|min:3|max:50',
        'descripcion' => 'required|max:5',
        'precio' => 'required|numeric|min:0.1',
    ];
    $mensajes = [
        'nombre.required' => 'Se requiere que complete el campo "nombre"',
        'nombre.min' => 'Se requiere el campo "nombre" contenga un minimo de 3 caracteres',
        'nombre.required' => 'Se requiere que complete el campo "descripcion"',
        'nombre.required' => 'Se requiere que el campo "descripcion" no puede superar los 5 caracteres',
        'nombre.required' => 'Se requiere que complete el campo "precio"',
        'nombre.required' => 'Ingrese en el campo "precio" solo un valor numerico',
        'nombre.required' => 'El precio no debe ser cero, ni negativo',
    ];
    $validated = $request -> validate($reglas, $mensajes);

        $producto = New Producto();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->descripcion_larga = $request->input('descripcion_larga');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->save();
        return redirect ('/producto/principal');

    }
}
