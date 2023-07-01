<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Models
use App\Models\CategoriaArticulo;

class Articulo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'existencias',
        'categoria_articulo_id'
    ];

    public $timestamps = false;

    /**
     * Relación con categoria_articulos
     */
    public function categoriaArticulo() {
        return $this->belongsTo(CategoriaArticulo::class);
    }
}
