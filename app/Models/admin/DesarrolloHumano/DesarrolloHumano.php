<?php

namespace App\Models\admin\DesarrolloHumano;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesarrolloHumano extends Model
{
    use HasFactory;
    protected $table = 'desarrollo_humanos';
    protected $fillable = [
        "id",
        "id_integracion",
        "ficha",
        "profesion",
        "situacion_contractual",
        "resultados_tecnicos",
        "nombre",
        "num_cedula",
        "cpp",
        "validacion",
        "memorandum",
        "cedula_siep",
        "carta_no_inhabilitacion",
        "cedula_siep",
        "validacion_sep",
        "resultados_ev_tec",
        "documento1",
        "documento2",
        "documento3",
        "documento4",
    ];
}
