<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratados extends Model
{
    use HasFactory;
    protected $table = 'contratados';
    protected $fillable = [
        "id",
        "posicion",
        "subdireccion",
        "grupo",
        "motivo_vacante",
        "vigencia",
        "plaza",
        "gerencia",
        "ficha",
        "profesion",
        "situacion_Contractual",
        "resultados_tecnicos",
        "nombre",
        "num_Cedula",
        "cpp",
    ];
}
