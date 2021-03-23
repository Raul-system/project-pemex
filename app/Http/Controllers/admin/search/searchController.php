<?php

namespace App\Http\Controllers\admin\search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;
use App\Models\Contratados;
use App\Models\Rechazados;

class searchController extends Controller
{
    public $resultados_response;
    public $id_integracion_etapa2_busqueda;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getSearchToConsulte(Request $request)
    {
        switch ($request->get('modelo')) {
            case 'Integracion_Regional':
                $this->resultados_response = Integracion::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')
                    ->where('validacion', 'false')
                    ->get();
                break;
            case 'Desarrollo_Humano':
                $this->resultados_response = DesarrolloHumano::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')
                    ->where('validacion', 'false')
                    ->get();
                break;
            case 'Departamento_Personal':
                $this->resultados_response = DepartamentoPersonal::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')
                    ->where('validacion', 'false')
                    ->get();
                break;
            case 'Contratados':
                $this->resultados_response = Contratados::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')
                    ->get();
                break;
            case 'Rechazados':
                $this->resultados_response = Rechazados::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')
                    ->get();
                break;
            case 'Fechas':
                $this->resultados_response = DepartamentoPersonal::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')->get();
                if( $this->resultados_response->first() ){
                    $this->id_integracion_etapa2_busqueda = Integracion::findOrFail($this->resultados_response[0]->id_integracion);
                }else{
                    $this->id_integracion_etapa2_busqueda = null;
                }
                break;
                /* default:
// 
                break; */
        }
        return view('search.resultados-busqueda', [
            'resultados' => $this->resultados_response,
            'routeConsult' => $request->get('route_consulta'),
            'id_integracion_busqueda_etapa2'=>($this->id_integracion_etapa2_busqueda != null) ? $this->id_integracion_etapa2_busqueda->id : null ,
            'nameModel' => $request->get('modelo')
        ]);
    }
}
