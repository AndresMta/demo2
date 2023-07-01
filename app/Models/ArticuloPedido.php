<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Models
use App\Models\Articulo;
use App\Models\Pedido;


class ArticuloPedido extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pedido_id',
        'articulo_id',
        'cantidad'
    ];

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articulos_pedidos';

    public $timestamps = false;

    /**
     * Relación con articulos
     */
    public function articulo() {
        return $this->belongsTo(Articulo::class);
    }

    /**
     * Relación con pedidos
     */
    public function pedido() {
        return $this->belongsTo(Pedido::class);
    }
}
