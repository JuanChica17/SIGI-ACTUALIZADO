<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
use App\Models\Alquiler;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $rows = Facturacion::select('facturacion.*', 'cliente.nombre', 'alquiler.precio_alquiler')
        ->join('cliente', 'facturacion.id_cliente', '=', 'cliente.id')
        ->join('alquiler', 'facturacion.id_alquiler', '=', 'alquiler.id')
        ->where('nombre', 'like', '%'.$texto.'%')
        ->paginate();

        return view('facturacions.index', compact('texto','rows'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $alquileres = Alquiler::all();
        return view('facturacions.create', compact('clientes', 'alquileres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = new Facturacion();
        $row->mes_a_pagar = $request->mes_a_pagar;
        $row->concepto = $request->concepto;
        $row->valor = $request->valor;
        $row->deducciones = $request->deducciones;
        $row->total_pagar = $request->total_pagar;
        $row->id_alquiler = $request->id_alquiler;
        $row->id_cliente = $request->id_cliente;
        $row->save();
        return redirect()->route('facturacions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function show(Facturacion $facturacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clienteRows = Cliente::all();
        $alquilerRows = Alquiler::all();
        $facturacionRow = Facturacion::find($id);
        return view('facturacions.edit', compact('clienteRows','alquilerRows','facturacionRow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facturacion $facturacion)
    {
        $row = DB::table('facturacion')
        ->where('id', $request->id)
        ->update(['mes_a_pagar'=> $request->mes_a_pagar, 'concepto'=> $request->concepto, 'valor'=> $request->valor, 'deducciones'=> $request->deducciones, 'total_pagar'=> $request->total_pagar, 'id_alquiler'=> $request->id_alquiler, 'id_cliente'=> $request->id_cliente ]);
        return redirect()->route('facturacions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = DB::table('facturacion')->where('id', '=', $id)->delete();
        return back();
    }
}
