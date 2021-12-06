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
                <h1 class="h4 text-gray-900 mb-4">EDITAR VENTAS</h1>
              </div>
              <form action="{{route('ventas.update', $ventaRow->id)}}" method="post">
              @csrf
              @method('put')
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>NOMBRE INMUEBLE</label>
                    <select name="id_inmueble" class="form-control">
                    @foreach($inmuebleRows as $row)
                    <option value="{{ $row->id }}" {{ ($row->id == $ventaRow->id_inmueble) ? 'selected' : ''}}>{{ $row->nombre_inmueble }}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label>PRECIO</label>
                    <input type="number" name="precio" class="form-control" placeholder="escriba el precio" value="{{ $ventaRow->precio }}">
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
                    <label>NOMBRE COMPRADOR</label>
                    <input type="text" name="nombre_comprador" class="form-control" placeholder="escriba el nombre del comprador" value="{{ $ventaRow->nombre_comprador }}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>CORREO</label>
                    <input type="text" name="correo" class="form-control" placeholder="escriba el correo electronico" value="{{ $ventaRow->correo }}">
                  </div>
                  <div class="col-sm-6">
                    <label>DIRECCION</label>
                    <input type="text" name="direccion" class="form-control" placeholder="escriba la direccion" value="{{ $ventaRow->direccion }}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>TELEFONO</label>
                    <input type="text" name="telefono" class="form-control" placeholder="escriba el numero de telefono" value="{{ $ventaRow->telefono }}">
                  </div>
                  <div class="col-sm-6">
                    <label>REFERENCIA CATASTRAL</label>
                    <input type="text" name="referencia_catastral" class="form-control" placeholder="escriba la referencia" value="{{ $ventaRow->referencia_catastral }}">
                  </div>
                </div>
                <input type="hidden" name="id" value="{{$ventaRow->id}}">
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection