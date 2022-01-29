<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    
    protected $fillable = [
        'nombre_producto',
        'referencia',
        'precio',
        'peso',
        'cat_id',
        'stock',
        'fecha_creacion'
    ];

    /**
     * Relación entre la tabla Categorias con la tabla Productos.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'cat_id');
    }

    /**
     * Relación entre la tabla Productos con la tabla Ventas.
     */
    public function productos()
    {
        return $this->hasMany(Ventas::class, 'prod_id');
    }
}

