<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable=["nombre_proveedor",
     "correo_proveedor",   "telefono_proveedor", "nombre_contacto_proveedor"];
}
