<?php

namespace App\Http\Controllers\admin\Contratados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;
use App\Models\Contratados;

class ContratadosController extends Controller
{
    public function index()
    {
        $contratados = Contratados::paginate(20);
        return view('pages.contratados.contratados-index', compact('contratados'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        /* $Integracion = Integracion::all(); */
        $desarrolloHumano = DesarrolloHumano::where('id_integracion', $request->get('id_integracion'))->get();
        $departamentoPersonal = DepartamentoPersonal::where('id_integracion', $request->get('id_integracion'))->get();
        /* Lo primero es encontrar el id del Postulado desde Integracion */
        Contratados::create([
            "posicion" => $desarrolloHumano[0]->posicion,
            "subdireccion" => $desarrolloHumano[0]->subdireccion,
            "grupo" => $desarrolloHumano[0]->grupo,
            "motivo_vacante" => $desarrolloHumano[0]->motivo_vacante,
            "vigencia" => $desarrolloHumano[0]->vigencia,
            "plaza" => $desarrolloHumano[0]->plaza,
            "gerencia" => $desarrolloHumano[0]->gerencia,
            /* campos del Departamento Persona[0]l */
            "ficha" => $departamentoPersonal[0]->ficha,
            "profesion" => $departamentoPersonal[0]->profesion,
            "situacion_Contractual" => $departamentoPersonal[0]->situacion_contractual,
            "resultados_tecnicos" => $departamentoPersonal[0]->resultados_tecnicos,
            "nombre" => $departamentoPersonal[0]->nombre,
            "num_Cedula" => $departamentoPersonal[0]->num_cedula,
            "cpp" => $departamentoPersonal[0]->cpp,
        ]);
        $postuladoDepartamentoPersonal = DepartamentoPersonal::where('id_integracion', $request->get('id_integracion'))->get();
        $postuladoDepartamentoPersonal[0]->validacion = 'true';
        $postuladoDepartamentoPersonal[0]->save();
        return redirect()->route('contratados.index')->with('status', 'Usuario Registrado y Contratado Correctamente');
    }

    public function show($id)
    {
        $contratado = Contratados::findOrFail($id);
        return view('pages.contratados.contratados-show', compact('contratado'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
