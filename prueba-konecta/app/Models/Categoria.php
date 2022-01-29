<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    // const CREATED_AT = 'Fecha de Creacion';

    protected $fillable = [
        'nombre_categoria'
    ];

    /**
     * Relación entre la tabla Categorias con la tabla Productos.
     */
    public function productos()
    {
        return $this->hasMany(Producto::class, 'cat_id');
    }
}
