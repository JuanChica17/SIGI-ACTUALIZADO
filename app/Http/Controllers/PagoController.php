<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $rows = DB::table('pago')
        ->join('cliente', 'pago.id_cliente', '=', 'cliente.id')
        ->select('pago.*', 'cliente.nombre AS nombreInquilinos')
        ->where('fecha', 'like', '%'.$texto.'%')
        ->paginate();

        return view('pagos.index', compact('texto','rows'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows = Cliente::all();
        return view('pagos.create', compact('rows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = new Pago();
        $row->fecha = $request->fecha;
        $row->valor = $request->valor;
        $row->total_pago = $request->total_pago;
        $row->comentarios = $request->comentarios;
        $row->id_cliente = $request->id_cliente;
        $row->save();
        return redirect()->route('pagos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clienteRows = Cliente::all();
        $pagoRow = Pago::find($id);
        return view('pagos.edit', compact('clienteRows','pagoRow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        $row = DB::table('pago')
        ->where('id', $request->id)
        ->update(['fecha'=> $request->fecha, 'valor'=> $request->valor, 'total_pago'=> $request->total_pago, 'comentarios'=> $request->comentarios, 'id_cliente'=> $request->id_cliente ]);
        return redirect()->route('pagos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = DB::table('pago')->where('id', '=', $id)->delete();
        return back();
    }
}
