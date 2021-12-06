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
                <h1 class="h4 text-gray-900 mb-4">REGISTRAR PAGOS</h1>
              </div>
              <form action="{{route('pagos.store')}}" method="post">
              @csrf
              @method('post')
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>FECHA</label>
                    <input type="date" name="fecha" class="form-control" required="">
                  </div>
                  <div class="col-sm-6">
                    <label>VALOR</label>
                    <input type="number" name="valor" class="form-control" placeholder="escriba el valor" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>TOTAL PAGADO</label>
                    <input type="number" name="total_pago" class="form-control" placeholder="escriba el total pagado" required="">
                  </div>
                  <div class="col-sm-6">
                  <label>COMENTARIOS</label>
                    <input type="text" name="comentarios" class="form-control" placeholder="escriba los comentarios" required="">
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>NOMBRE INQUILINO</label>
                    <select name="id_cliente" class="form-control" required="">
                    <option>Seleccione...</option>
                    @foreach($rows as $row)
                    <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection