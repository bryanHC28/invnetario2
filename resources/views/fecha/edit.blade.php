@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> </h1>
@stop

@section('content')



<div class="card">
    <div class="card-body">
        <div style="background-color: #84B6F4" class="p-3 mb-2 bg-gradient fw-bold text-white">Cambiar fecha para: {{$controlprogramantos->equipos->clave}}</div>

        {!! Form::open(['method'=>'PATCH','url'=>'/fecha/'.$controlprogramantos->id_programanto,'style'=>'color:black;','id'=>'main-contact-form','class'=>'contact-form','name'=>'contact-form','onsubmit'=>'Loader.show()'])!!}

    <div class="form-row">

      <div class="form-group col-md-6">
        {!! Form::label ('clave','Clave de equipo:')!!}
        {!! Form::text ('clave',$controlprogramantos->equipos->clave,['placeholder'=>'Sin clave...','class'=>'form-control' ,'readonly','required','onkeyup'=>'validaciones();'])!!}
      </div>


      <div class="form-group col-md-6">
        {!! Form::label ('nombre','Nombre del equipo:')!!}
        {!! Form::text ('nombre',$controlprogramantos->equipos->nombre_equipo,['placeholder'=>'Ingresa nombre ','class'=>'form-control' ,'readonly','required','onkeyup'=>'validaciones();'])!!}


      </div>

    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        {!! Form::label ('id_area','Area:') !!}
        {!! Form::text ('id_area',$controlprogramantos->equipos->area->nombre,['placeholder'=>'Seleccionar ...','class'=>'form-control','readonly','required','onkeyup'=>'validaciones();'])
        !!}

      </div>
      <div class="form-group col-md-4">

        {!! Form::label ('cate','Categoria:')!!}
        {!! Form::text ('cate',$controlprogramantos->equipos->categorias->nombre,['placeholder'=>'Sin clave...','class'=>'form-control' ,'readonly','required','onkeyup'=>'validaciones();'])!!}

        {!! Form::label ('id_categoria','Categoria:','hidden') !!}
        {!! Form::text ('id_categoria',$controlprogramantos->equipos->id_categoriaequipos,['placeholder'=>'Seleccionar ...','class'=>'form-control','hidden','readonly','required','onkeyup'=>'validaciones();'])!!}
      </div>



      <div class="form-group col-md-4">
        {!! Form::label ('SigMMTo','Fecha actual:')!!}
        {!! Form::text ('SigMMTO',$controlprogramantos->programanto->proxima_fecha,['placeholder'=>'Sin fecha asignada ','readonly','class'=>'form-control' ,'onkeyup'=>'validaciones();'])!!}
      </div>

      <div class="form-group col-md-4">
        {!! Form::label ('nueva_fecha','Nueva fecha:')!!}
        {!! Form::date ('nueva_fecha',NULL,['placeholder'=>'Sin fecha asignada ','class'=>'form-control' ,'required','onkeyup'=>'validaciones();'])!!}
      </div>

    </div>
<br>

<button onclick="executeAjaxRequest2();" class="button" id="centrar" type="submit"
                                >
                                    <span class="button__text">Guardar</span>
                                    <span class="button__icon">
                                        <ion-icon name="paper-plane"></ion-icon>
                                    </span>
                                </button>




</div>
</div>






@stop

@section('css')
<link href="{{ asset('css/create.css') }}" rel="stylesheet" media="all">


@stop

@section('js')
<script src="{{ asset('js/loader.js') }}"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>




@stop
