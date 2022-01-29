<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    // Tabla que usará este modelo
    protected $table = 'favoritos';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'url',
        'titulo',
        'descripcion',
        'cat_id',
        'user_id',
        'visibilidad'
    ];

    /**
     * Relación entre la tabla Categorias con la tabla Favoritos.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'cat_id');
    }

    /**
     * Relación entre la tabla Usuarios con la tabla Favoritos.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
