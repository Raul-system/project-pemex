<?php

namespace App\Http\Controllers\admin\Rechazados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;
use App\Models\Rechazados;
use Illuminate\Support\Facades\Storage;

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
        $postulado_desarrolloHumano = DesarrolloHumano::where('id_integracion', $postulado->id)->get();
        $postulado_departamentoPersonal = DepartamentoPersonal::where('id_integracion', $postulado->id)->get();
        // /* Aqui se va a plantear el registro de un nuevo rechazado, asi como conllevar el proceso de eliminacion de cada uno de los archivos correspondientes*/

        if ($postulado->first()) {
            Storage::deleteDirectory($postulado->name_directory);
            $postulado->delete();
        }
        if ($postulado_desarrolloHumano->first()) {
            Storage::deleteDirectory($postulado_desarrolloHumano->name_directory);
            $postulado_desarrolloHumano->delete();
        }
        if ($postulado_departamentoPersonal->first()) {
            Storage::deleteDirectory($postulado_departamentoPersonal->name_directory);
            $postulado_departamentoPersonal->delete();
        }
        Rechazados::create([
            'observaciones' => Observaciones_No_Procedio($request, $request->get('departamento'))
        ]);

        return redirect()->route('rechazados.index')->with('status', 'El Usuario ya fue registrado en los Candidatos Rechazados');
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
