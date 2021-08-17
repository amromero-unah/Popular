<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable=["nombre_producto",
    "categoria_producto",   "precio_compra", "precio_contacto_venta"];

    public function scopeSearch($query, $nombre){
        return $query->where('nombre_producto', 'LIKE', "%$nombre%");
    }
}
