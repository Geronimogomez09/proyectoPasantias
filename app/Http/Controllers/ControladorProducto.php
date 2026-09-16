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

}
