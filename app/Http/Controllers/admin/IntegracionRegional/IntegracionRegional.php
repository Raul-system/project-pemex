<?php

namespace App\Http\Controllers\admin\IntegracionRegional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\IntegracionRegional\Integracion;

class IntegracionRegional extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $integracion = Integracion::where('validacion', 'true')->get();
        return view('pages.integracion-regional.integracion-regional-index', compact('integracion'));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $Directorio = NameDirectory('RaulMohenoZavaleta');
        /* La peticion surge desde la area Usuaria, que envia una serie de datos de POST, para que lo registre directamente en Integracion */
        if ($request->hasFile('memorandum')) {
            echo saveFile($request->file('memorandum'), 'integracion_regional/memorandum/' . $Directorio) . "<br>";
        }
        if ($request->hasFile('cedula_siep')) {
            echo saveFile($request->file('cedula_siep'), 'integracion_regional/memorandum/' . $Directorio) . "<br>";
        }
    }

    public function show($id)
    {
        $userIntegracion = Integracion::findOrFail($id);
        return view('pages.integracion-regional.integracion-regional-show', compact('userIntegracion'));
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
