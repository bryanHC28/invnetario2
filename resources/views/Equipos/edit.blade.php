@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> </h1>
@stop

@section('content')



<div class="card">
    <div class="card-body">
        <div class="p-3 mb-2 bg-warning bg-gradient fw-bold text-white">EDITAR EQUIPO</div>

        {!! Form::open(['method'=>'PATCH','url'=>'/equipo/'.$equipo->id,'style'=>'color:black;','id'=>'main-contact-form','class'=>'contact-form','name'=>'contact-form'])!!}

    <div class="form-row">
      <div class="form-group col-md-6">
        {!! Form::label ('clave','Clave de equipo:')!!}
        {!! Form::text ('clave',$CLAVE,['placeholder'=>'Sin clave...','class'=>'form-control' ,'required','onkeyup'=>'validaciones();'])!!}
      </div>


      <div class="form-group col-md-6">
        {!! Form::label ('nombre','Nombre del equipo:')!!}
        {!! Form::text ('nombre',$NOMBRE,['placeholder'=>'Ingresa nombre ','class'=>'form-control' ,'required','onkeyup'=>'validaciones();'])!!}


      </div>

    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        {!! Form::label ('id_area','Area:') !!}
        {!! Form::text ('id_area',$AREA,['placeholder'=>'Seleccionar ...','class'=>'form-control','disabled','onchange'=>'llenar_categorias(this.value);','required','onkeyup'=>'validaciones();'])
        !!}

      </div>
      <div class="form-group col-md-4">
        {!! Form::label ('id_categoria','Categoria:') !!}
        {!! Form::text ('id_categoria',$CATEGORIA,['placeholder'=>'Seleccionar ...','class'=>'form-control','disabled','onchange'=>'llenar_formulario(this.value);','required','onkeyup'=>'validaciones();'])!!}
      </div>

      <div class="form-group col-md-4">
        {!! Form::label ('SigMMTO','Fecha actual de mantenimiento:')!!}
        {!! Form::text ('SigMMTO',$equipo->SigMMTO,['placeholder'=>'[Sin fecha asignada]','class'=>'form-control' ,'disabled','onkeyup'=>'validaciones();'])!!}
      </div>

      <div class="form-group col-md-4">
        {!! Form::label ('SigMMTO','Nueva fecha:')!!}
        {!! Form::date ('SigMMTO',NULL,['placeholder'=>'Sin fecha asignada ','class'=>'form-control' ,'onkeyup'=>'validaciones();'])!!}
      </div>
      <div class="form-group col-md-4">
        {!! Form::label ('checklist','Checklist actual:')!!}
        {!! Form::text ('checklist',$check,['placeholder'=>'[Check list no asignado]','disabled','class'=>'form-control' ,'onkeyup'=>'validaciones();'])!!}
      </div>
      <div class="form-group col-md-4">
        {!! Form::label ('id_checklist','Seleccione nuevo check-list aplicar:')!!}
        {!! Form::select ('id_checklist',$Nchecklist->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar ...','class'=>'form-control','required','onkeyup'=>'validaciones();'])!!}


      </div>
    </div>
<br>


{!! Form::submit('Guardar',['class'=>'btn btn-success btn-lg','id'=>'centrar'])!!}
{!! Form::close() !!}



</div>
</div>






@stop

@section('css')
<style type="text/css">
    #centrar{

    width: 400px;
    height: 35px;
    margin-left: 350px;
    margin-right: auto;
    }
    </style>

@stop

@section('js')

<script>


    function llenar_categorias(id_area) {

    $('#id_categoria').empty();
    var asset = '{{ asset ('') }}';
    var ruta = asset + 'llenar_categoria/' + id_area;
    console.log(ruta);

    $.ajax({
    type: 'GET',

    url: ruta,

    success: function(data) {
    var categoria = data;
    for (var i = 0; i < categoria.length; i++) {
    $('#id_categoria').append('<option value="' + categoria[i].id + '">' + categoria[i].nombre + '</option>');
    }

    }
    });
    }
    </script>


@stop
