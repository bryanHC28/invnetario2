@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> </h1>
@stop

@section('content')
    <p> </p>






            <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
<div class="p-3 mb-2 bg-primary bg-gradient fw-bold text-white">Check-list</div>
            <div class="row g-3 needs-validation">



                        <div class="col-md-12">

                            {!! Form::label ('categoria','Selecciona Check-list:') !!}
                            {!! Form::select ('categoria', $checklist->pluck('nombre','id')->all() ,null,['placeholder'=>'Seleccionar','class'=>'form-control','onclick'=>'filtro(document.getElementById("categoria").value);','required','onkeyup'=>'validaciones();'])
                            !!}

                        </div>


                    </div>
                    </div>





<div class="card">
    <div class="card-body">


<table id="example" class="table table-striped" style="font-size:14px">
    <thead class="bg-warning">
        <tr>
            <th>Clave</th>
            <th>Categoria</th>
            <th>Area</th>
            <th>Nombre</th>
            <th>Sig Manto</th>
            <th>Acciones</th>



        </tr>
    </thead>
    <tbody>
        @foreach($JSON as $preguntas)
        <tr>



            <td>#{{$preguntas->clave}}</td>
            <td>{{$preguntas->categoria}}</td>
            <td>{{$preguntas->area}}</td>
            <td>{{$preguntas->nombre}}</td>
            <td><span class="@if($preguntas->SigMMTO== 'null') {{'badge badge-pill badge-warning'}} @endif">{{ $preguntas->SigMMTO }}</span></td>

            <td>
                <div class="btn-group">
                <a class="btn btn-info btn-sm" type="button"  onclick="ejecutar_formulario({!!$preguntas->id_checklist !!});">
                    <i class="far fa-eye">  Contestar</i>
                </a>




                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Clave</th>
                <th>Categoria</th>
                <th>Nombre</th>
                <th>Sig Manto</th>
                <th>Acciones</th>
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


<script>

function ejecutar_formulario(id_formulario){
    var asset = '{{ asset('') }}';
    var ruta = asset + 'formulario/'+id_formulario;





location.href=ruta






  }

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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

function filtro(categoria){

    if(categoria.length===0){

    }else{
      var asset = '{{ asset('') }}';
      var ruta = asset + 'llenar_filtro/'+categoria;
      location.href=ruta

      console.log(ruta);
    }

    }

</script>

<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
@stop
