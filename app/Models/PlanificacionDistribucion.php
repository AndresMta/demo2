<?php

namespace App\Models;

//Models
use App\Models\Empleado;
use App\Models\PlanificacionDistribucionPedido;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanificacionDistribucion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fecha',
        'empleado_id',
        'estado'
    ];

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'planificacion_distribuciones';

    public $timestamps = false;

    public function empleado() {
        return $this->belongsTo(Empleado::class);
    }

    public function planificacionDistribucionPedido() {
        return $this->hasMany(PlanificacionDistribucionPedido::class);
    }
}
