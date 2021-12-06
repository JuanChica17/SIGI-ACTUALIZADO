<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $rows = DB::table('inmueble')
        ->join('cliente', 'inmueble.id_cliente', '=', 'cliente.id')
        ->select('inmueble.*', 'cliente.nombre AS nombrePropietarios')
        ->where('nombre_inmueble', 'like', '%'.$texto.'%')
        ->paginate();
        return view('inmuebles.index', compact('texto','rows'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows = Cliente::all();
        return view('inmuebles.create', compact('rows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = new Inmueble();
        $row->nombre_inmueble = $request->nombre_inmueble;
        $row->direccion = $request->direccion;
        $row->tipo = $request->tipo;
        $row->precio_venta = $request->precio_venta;
        $row->precio_alquiler = $request->precio_alquiler;
        $row->descripcion = $request->descripcion;
        $row->estado = $request->estado;
        $row->id_cliente = $request->id_cliente;
        $row->save();
        return redirect()->route('inmuebles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function show(Inmueble $inmueble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clienteRows = Cliente::all();
        $inmuebleRow = Inmueble::find($id);
        return view('inmuebles.edit', compact('clienteRows','inmuebleRow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inmueble $inmueble)
    {
        $row = DB::table('inmueble')
        ->where('id', $request->id)
        ->update(['nombre_inmueble'=> $request->nombre_inmueble, 'direccion'=> $request->direccion, 'tipo'=> $request->tipo, 'precio_venta'=> $request->precio_venta, 'precio_alquiler' => $request->precio_alquiler, 'descripcion'=> $request->descripcion, 'estado'=> $request->estado, 'id_cliente'=> $request->id_cliente ]);
        return redirect()->route('inmuebles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = DB::table('inmueble')->where('id', '=', $id)->delete();
        return back();
    }
}
