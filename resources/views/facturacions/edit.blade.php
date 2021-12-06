@extends('Layouts.template')

@section('content')

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
      
        <!-- Nested Row within Card Body -->
        <div class="row">
        <div class="col-lg-10">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">EDITAR FACTURACIONES</h1>
              </div>
              <form action="{{route('facturacions.update', $facturacionRow->id)}}" method="post">
              @csrf
              @method('put')
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>NOMBRE INQUILINO</label>
                    <select name="id_cliente" class="form-control">
                    @foreach($clienteRows as $cliente)
                    <option value="{{ $cliente->id }}" {{ ($cliente->id == $facturacionRow->id_cliente) ? 'selected' : ''}}>{{ $cliente->nombre }}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label>MES PAGAR</label>
                    <input type="text" name="mes_a_pagar" class="form-control" placeholder="escriba el mes a pagar" value="{{ $facturacionRow->mes_a_pagar }}">
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>CONCEPTO</label>
                    <input type="text" name="concepto" class="form-control" placeholder="escriba el concepto" value="{{ $facturacionRow->concepto }}">
                  </div>
                  <div class="col-sm-6">
                    <label>VALOR</label>
                    <input type="number" name="valor" class="form-control" placeholder="escriba el valor" value="{{ $facturacionRow->valor }}">
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>DEDUCCIONES</label>
                    <input type="text" name="deducciones" class="form-control" placeholder="escriba las deducciones" value="{{ $facturacionRow->deducciones }}">
                  </div>
                  <div class="col-sm-6">
                    <label>ALQUILER</label>
                    <select name="id_alquiler" class="form-control">
                    @foreach($alquilerRows as $alquiler)
                    <option value="{{ $alquiler->id }}" {{ ($alquiler->id == $facturacionRow->id_alquiler) ? 'selected' : ''}}>{{ $alquiler->precio_alquiler }}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label>TOTAL PAGAR</label>
                    <input type="number" name="total_pagar" class="form-control" placeholder="escriba el total a pagar" value="{{ $facturacionRow->total_pagar }}">
                  </div>
                </div>
                <input type="hidden" name="id" value="{{$facturacionRow->id}}">
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection