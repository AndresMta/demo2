<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Models
use App\Models\Articulo;

class CategoriaArticulo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public $timestamps = false;

    /**
     * Relación con articulos
     */
    public function articulos() {
        return $this->hasMany(Articulo::class);
    }
}
