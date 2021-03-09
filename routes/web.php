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
use App\Http\Controllers\admin\Procedimiento\Procedimiento;

Route::get('/', function () {
    return redirect()->route('area-usuaria');
});

Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
/* Route::resource('usuaria', Usuaria::class)->only(['create']); */

Route::get('/usuaria', [Usuaria::class, 'home'])->name('area-usuaria');

Route::resource('integracion-regional', IntegracionRegional::class);

Route::resource('desarrollo-humano', desarrolloHumanoController::class);

Route::resource('departamento-personal', departamentoPersonalController::class);

Route::resource('contratados', Contratados::class);

Route::get('download-pdf/{id}/{departamento}/{file}', [downloadPDF::class, 'downloadPDF'])->name('download');

Route::post('procedimiento-cancelado', [Procedimiento::class, 'CancelacionDocumentos'])->name('cancelarDocumentos');
