<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FavoritoController extends Controller
{
    /**
     * Muestra la lista de Favoritos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Consulto los Favoritos con la relación de Categorias.
        $data['favoritos'] = Favorito::where('user_id', auth()->id() )->with('categoria')->latest()->paginate(10);

        return view('favoritos.fav-index', $data);
    }

    /**
     * Muestra el formulario para crear Favoritos.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Selecciono las categorias a mostrar en el select.
        $data['categorias'] = Categoria::select('id', 'nombre_categoria')
                                            ->where('user_id', Auth::id())
                                            ->get();
        
        return view('favoritos.fav-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url'           => 'required|min:5|max:255',
            'titulo'        => 'required|min:5|max:255',
            'descripcion'   => 'required|min:5|max:255',
            'visibilidad'   => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/favorito/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $validated = $validator->validated();

        // Se crea el Favorito correspondiente.
        $dataFavorito = Favorito::create([
            'url'           => $request->url,
            'titulo'        => $request->titulo ,
            'descripcion'   => $request->descripcion,
            'cat_id'        => $request->cat_id,
            'user_id'       => Auth::id(),
            'visibilidad'   => $request->visibilidad
        ]);

        return redirect('favorito')->with(['msg' => 'Favorito creado con exito', 'color' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Muestra el formulario de Edicion de un Favorito.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['favorito']  = Favorito::where('id', $id)->where('user_id', Auth::id())->first();

        // Selecciono las categorias a mostrar en el select.
        $data['categorias'] = Categoria::select('id', 'nombre_categoria')
                                            ->where('user_id', Auth::id())
                                            ->where('id', $data['favorito']['cat_id'])->get();
        
        return view('favoritos.fav-edit', $data);
    }

    /**
     * Actualiza un registro especificado en Favoritos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'url'           => 'required|min:5|max:255',
            'titulo'        => 'required|min:5|max:255',
            'descripcion'   => 'required|min:5|max:255',
            'visibilidad'   => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/favorito/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $validated = $validator->validated();
        
        Favorito::where('id', $id)->where('user_id', Auth::id())->update(request()->except(['_token', '_method']));
        return redirect('favorito')->with(['msg' => 'Favorito editado con exito', 'color' => 'primary']);
    }

    /**
     * Elimina un registro de la tabla Favoritos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Favorito::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect('favorito')->with(['msg' => 'Favorito eliminado con exito', 'color' => 'danger']);
    }
}
