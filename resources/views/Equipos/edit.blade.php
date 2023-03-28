@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> </h1>
@stop

@section('content')



<div class="card">
    <div class="card-body">
        <div style="background-color: #90C0A8" class="p-3 mb-2 bg-gradient fw-bold text-white">Asignar cuestionario para: {{$equipo->clave}}</div>

        {!! Form::open(['method'=>'PATCH','url'=>'/equipo/'.$equipo->id,'style'=>'color:black;','id'=>'main-contact-form','class'=>'contact-form','name'=>'contact-form','onsubmit'=>'Loader.show()'])!!}

    <div class="form-row">
      <div class="form-group col-md-6">
        {!! Form::label ('clave','Clave de equipo:')!!}
        {!! Form::text ('clave',$equipo->clave,['placeholder'=>'Sin clave...','class'=>'form-control' ,'readonly','required','onkeyup'=>'validaciones();'])!!}

        {!! Form::text ('id_equipo',$equipo->id,['placeholder'=>'Sin clave...','class'=>'form-control' ,'hidden','readonly','required','onkeyup'=>'validaciones();'])!!}
      </div>



      <div class="form-group col-md-6">
        {!! Form::label ('nombre','Nombre del equipo:')!!}
        {!! Form::text ('nombre',$equipo->nombre_equipo,['placeholder'=>'Ingresa nombre ','class'=>'form-control' ,'readonly','required','onkeyup'=>'validaciones();'])!!}


      </div>

    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        {!! Form::label ('id_area','Area:') !!}
        {!! Form::text ('id_area',$equipo->area->nombre,['placeholder'=>'Seleccionar ...','class'=>'form-control','readonly','required','onkeyup'=>'validaciones();'])
        !!}
        {!! Form::label ('id_areas','Categoria:','hidden') !!}
        {!! Form::text ('id_areas',$equipo->id_area,['placeholder'=>'Seleccionar ...','class'=>'form-control','hidden','readonly','required','onkeyup'=>'validaciones();'])!!}

      </div>
      <div class="form-group col-md-4">


        {!! Form::label ('cate','Categoria:')!!}
        {!! Form::text ('cate',$equipo->categorias->nombre,['placeholder'=>'Sin clave...','class'=>'form-control' ,'readonly','required','onkeyup'=>'validaciones();'])!!}
        {!! Form::label ('id_categoria','Categoria:','hidden') !!}
        {!! Form::text ('id_categoria',$equipo->id_categoriaequipos,['placeholder'=>'Seleccionar ...','class'=>'form-control','hidden','readonly','required','onkeyup'=>'validaciones();'])!!}
      </div>





      <div class="form-group col-md-4">
        {!! Form::label ('SigMMTO','Fecha ultimo mantenimiento:')!!}
        {!! Form::date ('SigMMTO',NULL,['placeholder'=>'Sin fecha asignada ','class'=>'form-control' ,'onkeyup'=>'validaciones();'])!!}
      </div>
      <div class="form-group col-md-4">


        {!! Form::label('periodicidad', 'Periodicidad (dias):') !!}
        {!! Form::number('periodicidad', null, [
            'placeholder' => 'Ingresa ingrese la periodicidad que tendra este equipo ',
            'class' => 'form-control',

            'min' => 1,
            'onkeyup' => 'validaciones();',
        ]) !!}
      </div>

      <div class="form-group col-md-4">
        {!! Form::label ('id_checklist','Seleccione nuevo check-list aplicar:')!!}
        {!! Form::select ('id_checklist',$Nchecklist->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar ...','class'=>'form-control','onclick' => 'query(this.value);','onkeyup'=>'validaciones();'])!!}


      </div>
      <div id="ajax" class="form-group col-md-4 col-md-4">





      </div>

    </div>
<br>



<button   class="button" id="centrar" type="submit">
                                    <span class="button__text">Guardar</span>
                                    <span class="button__icon">
                                        <ion-icon name="paper-plane"></ion-icon>
                                    </span>
                                </button>



</div>
</div>






@stop

@section('css')
<link href="{{ asset('css/edit.css') }}" rel="stylesheet" media="all">

@stop

@section('js')
<script src="{{ asset('js/loader.js') }}"></script>

<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script>

  function query(id) {



      var asset = '{{ asset('') }}';
      var ruta = asset + 'checkbox/' + id;

      console.log(ruta);

      $.ajax({
          type: 'GET',
          url: ruta,

          success: function(data) {
              $("#ajax").html(data);
          }



      });

  }
</script>




@stop
