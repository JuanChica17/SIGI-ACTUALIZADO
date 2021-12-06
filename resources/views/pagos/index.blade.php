@extends('Layouts.template')

@section('css')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<script type="text/javascript">
    function ConfirmAdd(){
      var respuesta = confirm("¿Estas seguro que deseas registrar un pago?");
      if(respuesta == true){
        return true;
      }else{
        return false;
      }
    }
  </script>
<script type="text/javascript">
    function ConfirmUpdate(){
      var respuesta = confirm("¿Estas seguro que deseas modificar este pago?");
      if(respuesta == true){
        return true;
      }else{
        return false;
      }
    }
  </script>
  <script type="text/javascript">
    function ConfirmDelete(){
      var respuesta = confirm("¿Estas seguro que deseas eliminar este pago?");
      if(respuesta == true){
        return true;
      }else{
        return false;
      }
    }
  </script>
<div class="card shadow mb-4">
            <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary">LISTADO DE PAGOS</h1>
            <!--<form style="margin-top: 0px; margin-left: 700px; margin-top: 0px">
            <input type="date" class="form-control" name="texto" value="{{$texto}}" placeholder="busca algo...">
            <input style="margin-top: 20px;" type="submit" class="btn btn-primary" value="Buscar">
            </form>-->
              <a href="{{route('pagos.create')}}" onclick="return ConfirmAdd()" class="btn btn-primary btn-circle">
                        <i class="fas fa-plus-square"></i>
                        </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered shadow-lg mt-4" id="pagos" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NOMBRE_INQUILINO</th>
                      <th>FECHA</th>
                      <th>VALOR</th>
                      <th>TOTAL_PAGADO</th>
                      <th>COMENTARIOS</th>
                      <th>EDITAR</th>
                      <th>BORRAR</th>
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
                        <td>{{$row->nombreInquilinos}}</td>
                        <td>{{$row->fecha}}</td>
                        <td>{{ number_format($row->valor,2) }}</td>
                        <td>{{ number_format($row->total_pago,2) }}</td>
                        <td>{{$row->comentarios}}</td>
                        <td>
                        <a href="{{route('pagos.edit', $row->id)}}" onclick="return ConfirmUpdate()" class="btn btn-success btn-circle">
                        <i class="fas fa-edit"></i>
                        </a>
                        </td>
                        <td>
                        <form action="{{route('pagos.destroy', $row->id)}}" onclick="return ConfirmDelete()" method="post">
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
    $('#pagos').DataTable({
      "lengthMenu": [[1,10, 50, -1], [1, 10, 50, "All"]],
    });
} );
</script>

@endsection
@endsection
