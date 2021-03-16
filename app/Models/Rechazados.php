<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rechazados extends Model
{
    use HasFactory;
    protected $table = 'rechazados';
    protected $fillable = [
        "id",
        "observaciones"
    ];
}
