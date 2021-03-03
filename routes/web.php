<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Usuaria\Usuaria;
use App\Http\Controllers\admin\IntegracionRegional\IntegracionRegional;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;
use App\Http\Controllers\Contratados\Contratados;

Route::get('/', function () {
    return redirect('/usuaria');
});

Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
Route::resource('usuaria', Usuaria::class);

Route::resource('integracion-regional', IntegracionRegional::class);

Route::resource('desarrollo-humano', DesarrolloHumano::class);

Route::resource('departamento-personal', DepartamentoPersonal::class);

Route::resource('contratados', Contratados::class);
