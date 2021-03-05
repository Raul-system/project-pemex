<?php

namespace App\Models\admin\DepartamentoPersonal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentoPersonal extends Model
{
    use HasFactory;
    protected $table = 'departamento_personals';
    protected $fillable = [
        "id",
        "id_integracion",
        "validacion",
        "memorandum",
        "cedula_siep",
    ];
}
