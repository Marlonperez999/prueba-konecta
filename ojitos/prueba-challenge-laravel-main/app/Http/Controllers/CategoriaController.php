<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * Muestra la lista de Categorias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['Categorias'] = Categoria::where('user_id', Auth::id())->latest()->paginate(10); 
        return view('categorias.cate-index', $data);
    }

    /**
     * Muestra el formulario de creación de una Categoria.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.cate-create');
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
            'nombre_categoria' => 'unique:categorias,nombre_categoria|required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/categoria/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $validated = $validator->validated();

        $categoriaNueva = Categoria::create([
            'nombre_categoria' => $request->nombre_categoria,
            'user_id'   => Auth::id(),
        ]);

        return redirect('categoria')->with(['msg' => 'Categoria creada con exito', 'color' => 'success']);;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categoria'] = Categoria::where('id', $id)->where('user_id', Auth::id())->first();

        return view('categorias.cate-edit', $data);
    }

    /**
     * Actualiza un registro especificado en Categorias.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre_categoria' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/categoria/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $validated = $validator->validated();

        Categoria::where('id', $id)->where('user_id', Auth::id())->update(request()->except(['_token', '_method']));
        return redirect('categoria')->with(['msg' => 'Categoria editada con exito', 'color' => 'primary']);;
    }

    /**
     * Elimina un registro de la tabla Categoria.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect('categoria')->with(['msg' => 'Categoria eliminada con exito', 'color' => 'primary']);;
    }
}
