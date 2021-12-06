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
                <h1 class="h4 text-gray-900 mb-4">EDITAR INMUEBLES</h1>
              </div>
              <form action="{{route('inmuebles.update', $inmuebleRow->id)}}" method="post">
              @csrf
              @method('put')
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>NOMBRE INMUEBLE</label>
                    <input type="text" name="nombre_inmueble" class="form-control" placeholder="escriba el nombre del inmueble" value="{{ $inmuebleRow->nombre_inmueble }}">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>DIRECCION</label>
                    <input type="text" name="direccion" class="form-control" placeholder="escriba la direccion" value="{{ $inmuebleRow->direccion }}">
                  </div>
                  <div class="col-sm-6">
                    <label>TIPO</label>
                    <select name="tipo" class="form-control">
                    <option>Seleccione...</option>
                    <option>Casa</option>
                    <option>Apartamento</option>
                    <option>Local Comercial</option>
                    <option>Lote</option>
                    </select>
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>PRECIO VENTA</label>
                    <input type="number" name="precio_venta" class="form-control" placeholder="escriba el precio" value="{{ $inmuebleRow->precio_venta }}">
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>PRECIO ALQUILER</label>
                    <input type="number" name="precio_alquiler" class="form-control" placeholder="escriba el precio" value="{{ $inmuebleRow->precio_alquiler }}">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>ESTADO</label>
                    <select name="estado" class="form-control">
                    <option>Seleccione...</option>
                    <option>Desocupado</option>
                    <option>Alquiler/Venta</option>
                    <option>Alquilado</option>
                    <option>Vendido</option>
                    </select>
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>NOMBRE PROPIETARIO</label>
                    <select name="id_cliente" class="form-control">
                    @foreach($clienteRows as $row)
                    <option value="{{ $row->id }}" {{ ($row->id == $inmuebleRow->id_cliente) ? 'selected' : ''}}>{{ $row->nombre }}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>DESCRIPCION</label>
                    <textarea name="descripcion" class="form-control" placeholder="describe algo..." id="floatingTextarea2">{{$inmuebleRow->descripcion}}</textarea>
                </div>
                </div>
                <input type="hidden" name="id" value="{{$inmuebleRow->id}}">
                <button style="margin-top: 50px" type="submit" class="btn btn-primary">Actualizar</button>  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection