<?php

namespace App\Http\Controllers\admin\Procedimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/* Incluir cada uno de los modelos */
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;

class Procedimiento extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /* Funcion para procesar a un candidato en dado caso no procede */
    public function CancelacionDocumentos(Request $request)
    {
        return Observaciones_No_Procedio($request, $request->get('departamento'));
    }
}
