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
                <h1 class="h4 text-gray-900 mb-4">EDITAR ALQUILERES</h1>
              </div>
              <form action="{{route('alquilers.update', $alquilerRow->id)}}" method="post">
              @csrf
              @method('put')
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>NOMBRE INMUEBLE</label>
                    <select name="id_inmueble" class="form-control">
                    @foreach($inmuebleRows as $row)
                    <option value="{{ $row->id }}" {{ ($row->id == $alquilerRow->id_inmueble) ? 'selected' : ''}}>{{ $row->nombre_inmueble }}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label>PRECIO ALQUILER</label>
                    <input type="number" name="precio_alquiler" class="form-control" placeholder="escriba el precio alquiler" value="{{ $alquilerRow->precio_alquiler }}">
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>FORMA PAGO</label>
                    <select name="forma_pago" class="form-control">
                    <option>Seleccione...</option>
                    <option>Transferencia</option>
                    <option>Efectivo</option>
                    <option>Cheque</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label>FECHA INICIO</label>
                    <input type="date" name="fecha_inicio" class="form-control" value="{{ $alquilerRow->fecha_inicio }}">
                  </div>
                  <div class="col-sm-6">
                  <label>FECHA FIN</label>
                    <input type="date" name="fecha_fin" class="form-control" value="{{ $alquilerRow->fecha_fin }}">
                  </div>
                </div>
                <input type="hidden" name="id" value="{{$alquilerRow->id}}">
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection