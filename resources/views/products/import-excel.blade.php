@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')











@can('tabla.index')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div  class="card-header text-white flexbox"  style="background-color: #00AA9E;">Importar equipos</div>

                <div class="card-body">
                    @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                        {{$error}}
                        @endforeach
                    </div>
                    @endif

                    <form class=" flexbox" action="{{route('tabla.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <input type="file" name="import_file" />

                        <button class="btn btn-primary" type="submit">Importar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endcan


<div class="card">
    <div class="card-body">


<table id="example" class="table table-striped" style="font-size:14px">
    <thead class="bg-primary">
        <tr>
            <th>Clave</th>
            <th>Area</th>
            <th>Categoria</th>
            <th>Nombre</th>
            @can('tabla.index')
            <th>Acciones</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($JSON as $preguntas)
        <tr>



            <td>{{$preguntas->clave}}</td>
            <td>{{$preguntas->area}}</td>
            <td>{{$preguntas->categoria}}</td>
            <td>{{$preguntas->nombre}}</td>
            @can('tabla.index')
            <td>

                <div class="btn-group">



                            <a class="btn btn-warning btn-sm" href="{!! asset('equipo/'.$preguntas->id.'/edit') !!}" >
                                <i class="fas fa-pencil-alt"></i>
                            </a>



                            {!! Form::open(['method' =>'DELETE','url'=>
                            '/equipo/'.$preguntas->id,'class'=>'form-eliminar'])!!}
                                <button style="margin-left: 10px" type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            {!! Form::close() !!}





                </div>
            </td>
            @endcan

        </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Clave</th>
                <th>Area</th>
                <th>Categoria</th>
                <th>Nombre</th>
                @can('tabla.index')
                <th>Acciones</th>
                @endcan
            </tr>
        </tfoot>
    </table>



</div>
</div>




@stop

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <style>
         .flexbox {
            text-align: center;

}
    </style>
@stop


@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>


    $('#example').DataTable({
        responsive:true,
        autoWidth:false,


        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Sin registros  - disculpa",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search': "Buscar",
            'paginate':{
                'next':'Siguiente',
                'previous':'Anterior'

            }

        }

});


</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>



@if (session('actualizar') == 'ok')
<script>
    Swal.fire(
        'Actualizado!',
        'Su registro ha sido actualizado con exito!',
        'success'
    )
</script>
@endif




@if(session('eliminar')=='ok')
<script>
  Swal.fire(
       'Eliminado!',
       'Su registro ha sido eliminado con exito!',
       'success'
     )

</script>


@endif
<script>
    $('.form-eliminar').submit(function(e){
e.preventDefault();


Swal.fire({
  title: '¿Estas seguro de querer eliminar este registro?',
  text: "¡No podrás revertir esto!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, borrar!',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.value) {


this.submit();
    // Swal.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )
  }
})

});

</script>
@stop
