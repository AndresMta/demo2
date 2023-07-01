<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Models
use App\Models\Cliente;

class UbicacionCliente extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'calle',
        'numero',
        'latitud',
        'longitud'
    ];

    public $timestamps = false;

    /**
     * Relación con ubicacion_clientes
     */
    public function cliente() {
        return $this->hasOne(Cliente::class);
    }
}
