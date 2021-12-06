<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Inmueble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $rows = DB::table('alquiler')
        ->join('inmueble', 'alquiler.id_inmueble', '=', 'inmueble.id')
        ->select('alquiler.*', 'inmueble.nombre_inmueble AS nombreInmuebles')
        ->where('nombre_inmueble', 'like', '%'.$texto.'%')
        ->orderBy('id')
        ->paginate();

        return view('alquilers.index', compact('texto','rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows = Inmueble::all();
        return view('alquilers.create', compact('rows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = new Alquiler();
        $row->precio_alquiler = $request->precio_alquiler;
        $row->forma_pago = $request->forma_pago;
        $row->fecha_inicio = $request->fecha_inicio;
        $row->fecha_fin = $request->fecha_fin;
        $row->id_inmueble = $request->id_inmueble;
        $row->save();
        return redirect()->route('alquilers.index');
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
        $inmuebleRows = Inmueble::all();
        $alquilerRow = Alquiler::find($id);
        return view('alquilers.edit', compact('inmuebleRows','alquilerRow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alquiler $alquiler)
    {
        $row = DB::table('alquiler')
        ->where('id', $request->id)
        ->update(['precio_alquiler'=> $request->precio_alquiler, 'forma_pago'=> $request->forma_pago, 'fecha_inicio'=> $request->fecha_inicio, 'fecha_fin'=> $request->fecha_fin, 'id_inmueble'=> $request->id_inmueble ]);
        return redirect()->route('alquilers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = DB::table('alquiler')->where('id', '=', $id)->delete();
        return back();
    }
}
