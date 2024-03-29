<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/* Incluir cada uno de los controladores de Departamentos */
use App\Http\Controllers\admin\Usuaria\Usuaria;
use App\Http\Controllers\admin\IntegracionRegional\IntegracionRegional;
use App\Http\Controllers\admin\DesarrolloHumano\desarrolloHumanoController;
use App\Http\Controllers\admin\DepartamentoPersonal\departamentoPersonalController;
use App\Http\Controllers\Contratados\Contratados;
use App\Http\Controllers\admin\PDF\downloadPDF;
use App\Http\Controllers\admin\Rechazados\RechazadosController;
use App\Http\Controllers\admin\Contratados\ContratadosController;
use App\Http\Controllers\admin\search\searchController;
use App\Http\Controllers\admin\Trabajadores\trabajadoresController;
/* ETAPA 2 */
use App\Http\Controllers\admin\Etapa2\fechas;
/* Etapa 3 */
use App\Exports\UserExport;
use App\Http\Controllers\admin\Etapa3\reporteExcelCandidato;

Route::get('/', function () {
    return redirect()->route('area-usuaria');
});

Auth::routes();

Route::get('/usuaria', [Usuaria::class, 'home'])->name('area-usuaria');

Route::resource('integracion-regional', IntegracionRegional::class);

Route::resource('desarrollo-humano', desarrolloHumanoController::class);

Route::resource('departamento-personal', departamentoPersonalController::class);

Route::resource('contratados', Contratados::class);

Route::get('download-pdf/{id}/{departamento}/{file}', [downloadPDF::class, 'downloadPDF'])->name('download');

Route::get('download-word', [downloadPDF::class, 'getWordDesarrolloHumano'])->name('download-word-desarrollo-humano');

Route::get('resultados', [searchController::class, 'getSearchToConsulte'])->name('resultados-search');

Route::resource('rechazados', RechazadosController::class);

Route::resource('contratados', ContratadosController::class);

Route::post('/get-trabajador', [trabajadoresController::class, 'getInformacion']);

/* ETAPA 2 */
Route::resource('proceso-fechas', fechas::class);
/* ETAPA 3 */
Route::get('lista-contratados-generar-reporte', [reporteExcelCandidato::class, 'getCandidatoExcel'])->name('list-contratados-excel');
Route::get('descargar-reporte-excel/{id}', function ($id) {
    return (new UserExport($id))->download('reporte-candidato' . $id . '.xlsx');
})->name('generar-reporte-excel-candidato');
