<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable=["nombre_cliente","telefono_cliente"];
    
    public function scopeSearch($query, $nombre){
        return $query->where('nombre_cliente', 'LIKE', "%$nombre%");
    }
}
