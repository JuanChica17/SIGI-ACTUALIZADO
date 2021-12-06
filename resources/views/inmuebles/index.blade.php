@extends('Layouts.template')

@section('css')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<script type="text/javascript">
    function ConfirmAdd(){
      var respuesta = confirm("¿Estas seguro que deseas registrar un inmueble?");
      if(respuesta == true){
        return true;
      }else{
        return false;
      }
    }
  </script>
<script type="text/javascript">
    function ConfirmUpdate(){
      var respuesta = confirm("¿Estas seguro que deseas modificar este inmueble?");
      if(respuesta == true){
        return true;
      }else{
        return false;
      }
    }
  </script>
  <script type="text/javascript">
    function ConfirmDelete(){
      var respuesta = confirm("¿Estas seguro que deseas eliminar este inmueble?");
      if(respuesta == true){
        return true;
      }else{
        return false;
      }
    }
  </script>
<div class="card shadow mb-4">
            <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary">LISTADO DE INMUEBLES</h1>
            <!--<form style="margin-top: 0px; margin-left: 700px; margin-top: 0px">
            <input type="text" class="form-control" name="texto" value="{{$texto}}" placeholder="busca algo...">
            <input style="margin-top: 20px;" type="submit" class="btn btn-primary" value="Buscar">
            </form>-->
              <a href="{{route('inmuebles.create')}}" onclick="return ConfirmAdd()" class="btn btn-primary btn-circle">
                        <i class="fas fa-plus-square"></i>
                        </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered shadow-lg mt-4" id="inmuebles" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NOMBRE_INMUEBLE</th>
                      <th>DIRECCION</th>
                      <th>TIPO</th>
                      <th>PRECIO_VENTA</th>
                      <th>PRECIO_ALQUILER</th>
                      <th>ESTADO</th>
                      <th>NOMBRE_PROPIETARIO</th>
                      <th>DESCRIPCION</th>
                      <th>EDITAR</th>
                      <th>ELIMINAR</th>
                 </tr>
                  </thead>
                  <tbody>
                  @if(count($rows)<=0)
                  <tr>
                  <td colspan="8">No hay registros</td>
                  </tr>
                  @else
                  @foreach($rows as $row)
                        <tr>
                        <td>{{$row->nombre_inmueble}}</td>
                        <td>{{$row->direccion}}</td>
                        <td>{{$row->tipo}}</td>
                        <td>{{ number_format($row->precio_venta,2) }}</td>
                        <td>{{ number_format($row->precio_alquiler,2) }}</td>
                        <td>{{$row->estado}}</td>
                        <td>{{$row->nombrePropietarios}}</td>
                        <td>{{$row->descripcion}}</td>
                        <td>
                        <a href="{{route('inmuebles.edit', $row->id)}}" onclick="return ConfirmUpdate()" class="btn btn-success btn-circle">
                        <i class="fas fa-edit"></i>
                        </a>
                        </td>
                        <td>
                        <form action="{{route('inmuebles.destroy', $row->id)}}" onclick="return ConfirmDelete()" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-circle">
                        <i class="fas fa-trash"></i>
                        </button>
                        </form>
                        </td>
                        </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                <div style="margin-left: 500px">
                {{$rows->links()}}
                </div>
              </div>
            </div>
          </div>
@section('js')
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script>
  $(document).ready(function() {
    $('#inmuebles').DataTable({
      "lengthMenu": [[1,10, 50, -1], [1, 10, 50, "All"]],
    });
} );
</script>

@endsection
@endsection
