@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> </h1>
@stop

@section('content')
    <p> </p>



<input hidden id="estado" name="estado" type="text" value="{{$variable}}">


<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">

            <div class="form-group two-fields">
                <label for="">Filtros</label>
                <div class="input-group">
                    <div class="input-group-prepend ">
                        <div class="input-group-text bg-primary"><i class="fa fa-hourglass-start" aria-hidden="true"></i>&nbsp;Categoria</div>
                    </div>
                    {!! Form::label ('categoriaS','Selecciona Subcheck-list:',['hidden']) !!}

                    {!! Form::select ('categoriaS', $data2->pluck('nombre','id')->all() ,null,['placeholder'=>'Seleccionar','class'=>'form-control','onclick'=>'filtroS(document.getElementById("categoriaS").value,document.getElementById("estado").value);','required','onkeyup'=>'validaciones();'])
                    !!}


                </div>
            </div>
        </div>
    </div>
</div>







<div class="card">
    <div class="card-body">


<table id="example" class="table table-striped display responsive nowrap" style="font-size:14px">
    <thead style="background-color: #759ECA">
        <tr>
            <th  style="color:#ffffff">Clave</th>


            <th  style="color:#ffffff">Equipo</th>
            <th  style="color:#ffffff">Sig Manto</th>
            <th  style="color:#ffffff">Dias restantes</th>
            <th style="color:#ffffff">Checklist</th>
            <th  style="color:#ffffff">Area</th>
            <th  style="color:#ffffff">Categoria</th>
            <th  style="color:#ffffff">Acciones</th>



        </tr>
    </thead>
    <tbody>
        @foreach($JSON as $preguntas)
        <tr>



            <td>#{{$preguntas->clave}}</td>

            <td><li style="white-space: initial">  {{$preguntas->nombre_equipo}}</li></td>




            <td><span class="@if($preguntas->mtto== 'null') {{'badge badge-pill badge-warning'}}@else{{'badge badge-pill badge-info'}}  @endif">{{ $preguntas->mtto }}</span></td>



            @php
            $fechaActual=date('Y-m-d',$mod_date);
            $fecha_prox = date('Y-m-d',strtotime($preguntas->mtto) );
            $fecha1 = date_create( $fechaActual);
             $fecha2 = date_create( $fecha_prox);
             $dias = date_diff($fecha1, $fecha2)->format('%R%a');
                @endphp

            <td><span class="@if($dias >= +0 && $dias <= +7) {{'badge badge-pill badge-danger'}} @elseif ($dias > +7 && $dias <= +30){{'badge badge-pill badge-warning'}}@elseif ($dias > +30 && $dias <= +182){{'badge badge-pill badge-primary'}}@elseif ($dias > +182 && $dias <= +365){{'badge badge-pill badge-success'}}@elseif ($dias > 365 ){{'badge badge-pill badge-info'}}@elseif ($dias < +0 ){{'badge badge-pill badge-dark'}}@endif">{{ $dias }} dias</span></td>
            <td><li style="white-space: initial">{{$preguntas->subchecklist}}</li></td>

            <td>{{$preguntas->categoria}}</td>
            <td>{{$preguntas->area}}</td>

            <td>
                <div class="btn-group">
                <a data-bs-toggle="mensaje" title="Contestar cuestionario para:{{$preguntas->clave}}" style="background-color: #759ECA" class="btn btn-sm" type="button"  onclick="ejecutar_formulario({!!$preguntas->id_checklist !!},{!!$preguntas->id_subchecklist !!},'{!!$preguntas->clave!!}','{!!$preguntas->categoria!!}','{!!$preguntas->area!!}','{!!$preguntas->nombre_equipo!!}','{!!$preguntas->subchecklist!!}',{!!$preguntas->id_equipo!!});">
                    <i class="fas fa-marker">  </i>
                </a>




                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Clave</th>

                <th>Equipo</th>
                <th>Subchecklist</th>
                <th> Manto</th>
                <th>Dias restantes</th>
                <th>Categoria</th>
                <th>Area</th>
                <th>Acciones</th>

            </tr>
        </tfoot>
    </table>



</div>
</div>







@stop
@section('css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">





    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <style>
         .flexbox {
            text-align: center;

}
    </style>




<style>

    .bg-gra-02 {
      background: -webkit-gradient(linear, left bottom, right top, from(#170183), to(#7ec7ff));
      background: -webkit-linear-gradient(bottom left, #0a003d 0%, #7ec7ff 100%);
      background: -moz-linear-gradient(bottom left, #0a003d 0%, #7ec7ff 100%);
      background: -o-linear-gradient(bottom left, #0a003d 0%, #7ec7ff 100%);
      background: linear-gradient(to top right, #0a003d 0%, #7ec7ff 100%);
    }
        </style>
@stop


@section('js')


<script>

function ejecutar_formulario(id_checklist,id_subchecklist,clave,categoria,area,equipo,subchecklist,id_equipo ){


    var asset = '{{ asset('') }}';
//dar formato con las "/" para que al momento de mandarlo por get no mande error en la url solo con clave y equipo
    let clv=[]


    for(let i=0;i<clave.length; i++){

        let cadena = clave[i].replace("/", "-");
        clv.push(cadena)

    }



    let cl= clv.join('');




    let eqp=[]


for(let i=0;i<equipo.length; i++){

    let cadena2 = equipo[i].replace("/", "-");
    eqp.push(cadena2)

}



let eq= eqp.join('');









    var ruta = asset + 'formularios/'+id_checklist+'/'+id_subchecklist+'/'+cl+'/'+categoria+'/'+area+'/'+eq+'/'+subchecklist+'/'+id_equipo ;





location.href=ruta






  }

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>


$(document).ready(function(){
$('#example').DataTable({
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


function filtroS(categoriaS,variable){

if(categoriaS.length===0){

}else{
  var asset = '{{ asset('') }}';
  var ruta = asset + 'llenar_filtroSS/'+categoriaS+'/'+variable;
  location.href=ruta

  console.log(ruta);
}

}
</script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="mensaje"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl){


        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    </script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
@stop
