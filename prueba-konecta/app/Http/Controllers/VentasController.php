<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function guardarProductoVenta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prod_id'  => 'required',
            'cantidad' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect('/ventas')
                    ->withErrors($validator)
                    ->withInput();
        }
        
        $validated = $validator->validated();
        
        $producto = Producto::select('stock')->where('id', $request->prod_id)->first();

        if ($request->cantidad > $producto->stock) {
            return redirect('ventas/'.$request->prod_id)->with(['msg' => 'La cantidad digitada, es mayor al Stock disponible.', 'color' => 'danger']);
        }

        $actualizarStockProducto = Producto::where('id', $request->prod_id)->update([
            'stock' => $producto->stock - $request->cantidad
        ]);

        // Se crea el Producto correspondiente.
        $dataVenta = Ventas::create([
            'prod_id'  => $request->prod_id,
            'cantidad'  => $request->cantidad,
        ]);

        return redirect('productos')->with(['msg' => 'Venta creada con éxito', 'color' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['producto']  = Producto::where('id', $id)->first();
        
        if ($data['producto']['stock'] <= 0) {
            return redirect('productos')->with(['msg' => 'El stock del producto es 0, no se puede hacer la venta.', 'color' => 'info']);
        }

        return view('ventas.vent-vender', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
