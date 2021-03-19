<?php

namespace App\Http\Controllers\admin\Trabajadores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\trabajadores;

class trabajadoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getInformacion(Request $request)
    {
        /* Debo recibir una posicion */
        $trabajador = trabajadores::where('posicion',  $request->get('posicion'))->get();
        return json_encode($trabajador);
    }
}
