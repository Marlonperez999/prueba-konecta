<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Tabla que usará este modelo
    protected $table = 'categorias';

    // Campos que se pueden llenar masivamente
    protected $fillable = ['nombre_categoria', 'user_id'];

    /**
     * Relación entre la tabla Categorias con la tabla Favoritos.
     */
    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'cat_id');
    }

}
