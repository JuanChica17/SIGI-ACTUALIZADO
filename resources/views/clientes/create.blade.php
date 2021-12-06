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
                <h1 class="h4 text-gray-900 mb-4">REGISTRAR CLIENTES</h1>
              </div>
              <form action="{{route('clientes.store')}}" method="post">
              @csrf
              @method('post')
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>NOMBRE</label>
                    <input type="text" name="nombre" class="form-control" placeholder="escriba el nombre" required="">
                  </div>
                  <div class="col-sm-6">
                    <label>APELLIDO</label>
                    <input type="text" name="apellido" class="form-control" placeholder="escriba el apellido" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>CORREO</label>
                    <input type="text" name="correo" class="form-control" placeholder="escriba el correo electronico" required="">
                  </div>
                  <div class="col-sm-6">
                  <label>DIRECCION</label>
                    <input type="text" name="direccion" class="form-control" placeholder="escriba la direccion" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>TELEFONO</label>
                    <input type="text" name="telefono" class="form-control" placeholder="escriba el numero de telefono" required="">
                  </div>
                  <div class="col-sm-6">
                    <label>CUENTA BANCARIA</label>
                    <input type="text" name="cuenta_bancaria" class="form-control" placeholder="escriba la cuenta bancaria" required="">
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