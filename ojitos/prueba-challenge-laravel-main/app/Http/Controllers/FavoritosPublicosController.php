<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Support\Facades\Auth;

class FavoritosPublicosController extends Controller
{
    /**
     * Muestra la lista de Favoritos Publicos en el Home, sin estar logueado.
     *
     * @return \Illuminate\Http\Response
     */
    public function listadoFavoritosPublicos()
    {
        // Consulto los Favoritos con la relación de Categorias.
        $data['favoritos'] = Favorito::where('visibilidad', 'publico')
            ->with('categoria')
            ->latest()
            ->paginate(10);

        return view('favoritos.fav-index', $data);
    }

    /**
     * Muestra el detalle de Favoritos.
     *
     * @return \Illuminate\Http\Response
     */
    public function detalleFavoritos($id)
    {
        // Consulto los Favoritos con la relación de Categorias.
        $data['favorito'] = Favorito::where('id', $id)->with('categoria');

        if (Auth::check()) {
            // Si está autenticado, traemos publicos y privados de ese User
            $data['favorito'] = $data['favorito']->where('user_id', auth()->id() );
        }

        $data['favorito'] = $data['favorito']->first();

        return view('favoritos.fav-detalle', $data);
    }
}
