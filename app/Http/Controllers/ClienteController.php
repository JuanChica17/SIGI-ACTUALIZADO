<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $rows = DB::table('cliente')
        ->select('id','nombre', 'apellido', 'correo', 'direccion', 'telefono', 'cuenta_bancaria')
        ->where('nombre', 'like', '%'.$texto.'%')
        ->paginate();
        return view('clientes.index', compact('texto','rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = new Cliente();
        $row->nombre = $request->nombre;
        $row->apellido = $request->apellido;
        $row->correo = $request->correo;
        $row->direccion = $request->direccion;
        $row->telefono = $request->telefono;
        $row->cuenta_bancaria = $request->cuenta_bancaria;
        $row->save();
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function show(Alquiler $alquiler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Cliente::all();
        $clienteRow = Cliente::find($id);
        return view('clientes.edit', compact('clientes','clienteRow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $row = DB::table('cliente')
        ->where('id', $request->id)
        ->update(['nombre'=> $request->nombre, 'apellido'=> $request->apellido, 'correo'=> $request->correo, 'direccion'=> $request->direccion, 'telefono'=> $request->telefono, 'cuenta_bancaria'=> $request->cuenta_bancaria ]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = DB::table('cliente')->where('id', '=', $id)->delete();
        return back();
    }
}