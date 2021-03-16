<?php

namespace App\Http\Controllers\admin\search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;

class searchController extends Controller
{
    public $resultados_response;

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
                /* default:
// 
                break; */
        }
        return view('search.resultados-busqueda', [
            'resultados' => $this->resultados_response,
            'routeConsult' => $request->get('route_consulta'),
            'nameModel' => $request->get('modelo')
        ]);
    }
}
