<?php

namespace App\Http\Controllers\admin\DepartamentoPersonal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;

class departamentoPersonalController extends Controller
{
    public $path_files_adicionales;/* clausula 3 */
    public $carta_no_inhabilitacion;
    public $path_cedula_siep;
    public $validacion_siep;
    public $resultados_ev_tec;
    public function __construct()
    {
        $this->middleware('auth');
        $this->validacion_siep = '';
        $this->path_cedula_siep = '';
        $this->carta_no_inhabilitacion = '';
        $this->resultados_ev_tec = '';
    }

    public function index()
    {
        $departamentoPersonal = DepartamentoPersonal::where('validacion', 'false')->paginate(15);
        return view('pages.departamento-personal.departamento-personal-index', compact('departamentoPersonal'));
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        $Directorio = NameDirectory('desarrolloHumano');
        if ($request->hasFile('carta_no_inhabilitacion')) {
            $this->carta_no_inhabilitacion =  saveFile($request->file('carta_no_inhabilitacion'), 'departamento_personal/' . $Directorio);
        }
        if ($request->hasFile('cedula_siep')) {
            $this->path_cedula_siep =  saveFile($request->file('cedula_siep'), 'departamento_personal/' . $Directorio);
        }
        if ($request->hasFile('validacion_siep')) {
            $this->validacion_siep =  saveFile($request->file('validacion_siep'), 'departamento_personal/' . $Directorio);
        }
        if ($request->hasFile('resultados_ev_tec')) {
            $this->path_cedula_siep =  saveFile($request->file('resultados_ev_tec'), 'departamento_personal/' . $Directorio);
        }
        /* Clausula 3 */
        if ($request->hasFile('files_especials')) {
            $this->resultados_ev_tec = saveFile($request->file('files_especials'), 'departamento_personal/' . $Directorio . "/documentos_adicionales", true);
        }
        DepartamentoPersonal::create([
            "id_integracion" => $request->get('id_validacion_procedimiento'),
            "ficha" => $request->get('ficha'),
            "profesion" => $request->get('profesion'),
            "situacion_contractual" => $request->get('situacion_contractual'),
            "resultados_tecnicos" => $request->get('resultados_tecnicos'),
            "nombre" => $request->get('nombre'),
            "num_cedula" => $request->get('num_cedula'),
            "cpp" => $request->get('cpp'),
            "validacion" => 'false',
            "name_directory" => 'public/departamento_personal/' . $Directorio,
            "carta_no_inhabilitacion" => $this->carta_no_inhabilitacion,
            "cedula_siep" => $this->path_cedula_siep,
            "validacion_siep" => $this->validacion_siep,
            "resultados_ev_tec" => $this->path_cedula_siep,
            "documento1" => isset($this->path_files_adicionales[0]) ? $this->path_files_adicionales[0] : null,
            "documento2" => isset($this->path_files_adicionales[1]) ? $this->path_files_adicionales[1] : null,
            "documento3" => isset($this->path_files_adicionales[2]) ? $this->path_files_adicionales[2] : null,
            "documento4" => isset($this->path_files_adicionales[3]) ? $this->path_files_adicionales[3] : null,
        ]);
        $update_validation_to_true = DesarrolloHumano::findOrFail($request->get('id_validacion_procedimiento'));
        $update_validation_to_true->validacion = 'true';
        $update_validation_to_true->save();
        return redirect()->route('desarrollo-humano.index')->with('status', 'Usuario registrado Correctamente!');
    }

    public function show($id)
    {
        $archivos_adicionales = DepartamentoPersonal::select('documento1', 'documento2', 'documento3', 'documento4')->where('id', $id)->get();
        $userDepartamentoPersonal = DepartamentoPersonal::findOrFail($id);
        $controls =  array(
            [
                'Name' => 'atributos_plaza',
                'Texto' => 'Atributos de Plaza',
                'Razon' => 'Sin atributos de plaza'
            ],
            [
                'Name' => 'vigencia',
                'Texto' => 'Vigencia',
                'Razon' => 'Ya no se encuentra vigente'
            ],
            [
                'Name' => 'puesto_siep',
                'Texto' => 'Puesto SIEP',
                'Razon' => 'No cumple con el puesto SIEP'
            ],
        );
        if ($userDepartamentoPersonal->validacion == 'true') {
            return abort(404);
        } else if ($userDepartamentoPersonal->validacion == 'false') {
            return view('pages.departamento-personal.departamento-personal-show', compact('userDepartamentoPersonal', 'archivos_adicionales', 'controls'));
        }
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
