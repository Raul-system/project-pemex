<?php

namespace App\Http\Controllers\admin\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* Incluir cada uno de los modelos */
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;

class downloadPDF extends Controller
{
    public $resultados;
    public function __construct()
    {
        $this->middleware('auth');
        $this->resultados = '';
    }
    function downloadPDF($id, $departamento, $file)
    {
        /*$ id para consultar directamente en los registros */
        /* departamento para saber en que tabla ir a buscar */
        /* $file hace referencia al campo en el cual rescato la url del archivo a descargar */

        if ($departamento == 'integracion_regional') {
            $this->resultados = Integracion::findOrFail($id);
        }
        return DownloadFiles($this->resultados->$file);
    }
}
