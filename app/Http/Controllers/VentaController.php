<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Inmueble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $rows = DB::table('venta')
        ->join('inmueble', 'venta.id_inmueble', '=', 'inmueble.id')
        ->select('venta.*', 'inmueble.nombre_inmueble AS nombreInmuebles')
        ->where('nombre_comprador', 'like', '%'.$texto.'%')
        ->paginate();

        return view('ventas.index', compact('texto','rows'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows = Inmueble::all();
        return view('ventas.create', compact('rows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = new Venta();
        $row->precio = $request->precio;
        $row->forma_pago = $request->forma_pago;
        $row->nombre_comprador = $request->nombre_comprador;
        $row->correo = $request->correo;
        $row->direccion = $request->direccion;
        $row->telefono = $request->telefono;
        $row->referencia_catastral = $request->referencia_catastral;
        $row->id_inmueble = $request->id_inmueble;
        $row->save();
        return redirect()->route('ventas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inmuebleRows = Inmueble::all();
        $ventaRow = Venta::find($id);
        return view('ventas.edit', compact('inmuebleRows','ventaRow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        $row = DB::table('venta')
        ->where('id', $request->id)
        ->update(['precio'=> $request->precio, 'forma_pago'=> $request->forma_pago, 'nombre_comprador'=> $request->nombre_comprador, 'correo'=> $request->correo, 'direccion'=> $request->direccion, 'telefono'=> $request->telefono, 'referencia_catastral'=> $request->referencia_catastral, 'id_inmueble'=> $request->id_inmueble ]);
        return redirect()->route('ventas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = DB::table('venta')->where('id', '=', $id)->delete();
        return back();
    }
}
