<?php

namespace App\Http\Controllers\admin\Rechazados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;
use App\Models\Rechazados;
use Illuminate\Support\Facades\Storage;
use App\Models\dataSearch;

class RechazadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $rechazados = Rechazados::paginate(15);
        return view('pages.rechazados.rechazados-index', compact('rechazados'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        /* Cada departamento tiene asignado un id_integracion y me sirve para ubicar el mismo registro en cada departamento */
        $postulado = Integracion::findOrFail($request->get('id_postulado'));
        $dataSearchIntegracion = dataSearch::where('id_integracion', $postulado->id)->get();

        $postulado_desarrolloHumano = DesarrolloHumano::where('id_integracion', $postulado->id)->get();

        $postulado_departamentoPersonal = DepartamentoPersonal::where('id_integracion', $postulado->id)->get();
        /* Aqui se va a plantear el registro de un nuevo rechazado, asi como conllevar el proceso de eliminacion de cada uno de los archivos correspondientes*/

        if ($postulado->first()) {
            Storage::deleteDirectory($postulado->name_directory);
            $dataSearchIntegracion[0]->delete();
            $postulado->delete();
        }
        if ($postulado_desarrolloHumano->first()) {
            Storage::deleteDirectory($postulado_desarrolloHumano[0]->name_directory);
            $dataSearchDesarrolloHumano =  dataSearch::where('id_desarrollo_humano', $postulado_desarrolloHumano[0]->id)->get();
            if ($dataSearchDesarrolloHumano->first()) {
                $dataSearchDesarrolloHumano[0]->delete();
            }
            $postulado_desarrolloHumano[0]->delete();
        }
        if ($postulado_departamentoPersonal->first()) {
            Storage::deleteDirectory($postulado_departamentoPersonal[0]->name_directory);
            $dataSearchDepartamentoPersonal = dataSearch::where('id_departamento_personal', $postulado_departamentoPersonal[0]->id)->get();
            if ($dataSearchDepartamentoPersonal->first()) {
                $dataSearchDepartamentoPersonal[0]->delete();
            }
            $postulado_departamentoPersonal[0]->delete();
        }
        Rechazados::create([
            'posicion' => $dataSearchIntegracion[0]->posicion,
            'ficha' => $dataSearchIntegracion[0]->ficha,
            'nombre' => $dataSearchIntegracion[0]->nombre,
            'regimen_contractual' => $dataSearchIntegracion[0]->regimen_contractual,
            'observaciones' => Observaciones_No_Procedio($request, $request->get('departamento'))
        ]);
        return redirect()->route('rechazados.index')->with('status', 'El Usuario ya fue registrado en Contratacion No Aplicada');
    }

    public function show($id)
    {
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
