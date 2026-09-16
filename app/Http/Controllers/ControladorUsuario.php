<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorUsuario extends Controller
{
    public function Usuario(){
        return view('/usuarios/index');
    }

    public function registro(){
        return view('/usuarios/registro');
    }

}
