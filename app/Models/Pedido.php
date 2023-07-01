<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Models
use App\Models\ArticuloPedido;
use App\Models\Cliente;

class Pedido extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fecha',
        'cliente_id',
        'importe',
        'estado',
        'reclamo_pedido_id',
        'coordenada_id',
        'motivo_no_entrega'
    ];

    public $timestamps = false;

    /**
     * Relación con articulos_pedidos
     */
    public function articuloPedido() {
        return $this->hasMany(ArticuloPedido::class);
    }

    /**
     * Relación con clientes
     */
    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
}
