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
                <h1 class="h4 text-gray-900 mb-4">EDITAR PAGOS</h1>
              </div>
              <form action="{{route('pagos.update', $pagoRow->id)}}" method="post">
              @csrf
              @method('put')
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>FECHA</label>
                    <input type="date" name="fecha" class="form-control" value="{{$pagoRow->fecha}}">
                  </div>
                  <div class="col-sm-6">
                    <label>VALOR</label>
                    <input type="number" name="valor" class="form-control" value="{{$pagoRow->valor}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>TOTAL PAGADO</label>
                    <input type="number" name="total_pago" class="form-control" value="{{$pagoRow->total_pago}}">
                  </div>
                  <div class="col-sm-6">
                  <label>COMENTARIOS</label>
                    <input type="text" name="comentarios" class="form-control" value="{{$pagoRow->comentarios}}">
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>NOMBRE INQUILINO</label>
                    <select name="id_cliente" class="form-control">
                    @foreach($clienteRows as $row)
                    <option value="{{ $row->id }}" {{ ($row->id == $pagoRow->id_cliente) ? 'selected' : ''}}>{{ $row->nombre }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <input type="hidden" name="id" value="{{$pagoRow->id}}">
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection