<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Models
use App\Models\Pedido;
use App\Models\PlanificacionDistribucion;

class PlanificacionDistribucionPedido extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pedido_id',
        'planificacion_distribucion_id',
    ];

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'planificacion_distribucion_pedido';

    public $timestamps = false;

    public function pedido() {
        return $this->belongsTo(Pedido::class);
    }

    public function planificacionDistribucion() {
        return $this->belongsTo(PlanificacionDistribucion::class);
    }
}
