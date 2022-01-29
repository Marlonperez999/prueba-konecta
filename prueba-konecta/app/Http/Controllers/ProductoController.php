<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\producto;
use App\Models\Ventas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['Productos'] = producto::latest()->get(); 
        return view('productos.prod-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Selecciono las categorias a mostrar en el select.
        $data['categorias'] = Categoria::get();
        
        return view('productos.prod-create', $data);
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
            'nombre_producto'  => 'required|min:3|max:255',
            'referencia'       => 'required|min:3|max:255',
            'precio'           => 'required',
            'peso'             => 'required',
            'cat_id'           => 'required',
            'stock'            => 'required',
            'fecha_creacion'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/productos/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $validated = $validator->validated();

        // Se crea el Producto correspondiente.
        $dataProducto = Producto::create([
            'nombre_producto'   => $request->nombre_producto,
            'referencia'        => $request->referencia ,
            'precio'            => $request->precio,
            'peso'              => $request->peso,
            'cat_id'            => $request->cat_id,
            'stock'             => $request->stock,
            'fecha_creacion'    => $request->fecha_creacion
        ]);

        return redirect('productos')->with(['msg' => 'Producto creado con exito', 'color' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['producto']  = Producto::where('id', $id)->first();

        // Selecciono las categorias a mostrar en el select.
        $data['categorias'] = Categoria::select('id', 'nombre_categoria')
                                            ->where('id', $data['producto']['cat_id'])->get();
        
        return view('productos.prod-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'nombre_producto'  => 'required|min:3|max:255',
            'referencia'       => 'required|min:3|max:255',
            'precio'           => 'required|numeric',
            'peso'             => 'required|numeric',
            'cat_id'           => 'required',
            'stock'            => 'required|numeric',
            'fecha_creacion'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/productos/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $validated = $validator->validated();
        
        Producto::where('id', $id)->update([
            'nombre_producto'   => $request->input('nombre_producto'),
            'referencia'        => $request->input('referencia'),
            'precio'            => $request->input('precio'),
            'peso'              => $request->input('peso'),
            'cat_id'            => $request->input('cat_id'),
            'stock'             => $request->input('stock'),
            'fecha_creacion'    => $request->input('fecha_creacion')
        ]);

        return redirect('productos')->with(['msg' => 'Producto editado con éxito', 'color' => 'primary']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::where('id', $id)->delete();
        return redirect('productos')->with(['msg' => 'Producto eliminado con éxito', 'color' => 'danger']);
    }

    public function masStockTiene() {
        $data['masStockTiene'] = Producto::max('stock');
        $data['productosMasStock'] = Producto::select('nombre_producto', 'stock')->where('stock', $data['masStockTiene'])->get();
        return view('productos.prod-plantilla-mostrar', $data);
    }

    public function masVendido() {
        $data['masStockTiene'] = Ventas::selectRaw('count(prod_id) AS total')->orderBy('total', 'DESC')->get();
        dd($data['masStockTiene']);
        $data['productosMasStock'] = Producto::select('nombre_producto', 'stock')->where('stock', $data['masStockTiene'])->get();
        return view('productos.prod-plantilla-mostrar', $data);
    }
}
