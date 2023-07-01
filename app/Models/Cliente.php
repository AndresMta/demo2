<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Models
use App\Models\UbicacionCliente;

class Cliente extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'cuit',
        'nombreComercio',
        'ubicacion_cliente_id',
        'email',
        'password'
    ];

    public $timestamps = false;

    /**
     * Relación con ubicacion_clientes
     */
    public function ubicacionCliente() {
        return $this->belongsTo(UbicacionCliente::class);
    }
}
