<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $table = 'ventas';

    protected $fillable = [
        'prod_id',
        'cantidad'
    ];

    /**
     * Relación entre la tabla Categorias con la tabla Productos.
     */
    public function productos()
    {
        return $this->belongsTo(Producto::class, 'prod_id');
    }
}
