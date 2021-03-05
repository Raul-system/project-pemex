<?php

namespace App\Models\admin\IntegracionRegional;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integracion extends Model
{
    use HasFactory;
    protected $table = 'integracions';
    protected $fillable = [
        "id",
        "posicion",
        "subdireccion",
        "rupo",
        "motivo_vacante",
        "vigencia",
        "plaza",
        "gerencia",
        "validacion",
        "memorandum",
        "cedula_siep",
    ];
}
