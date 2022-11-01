@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')






<div class="container">
    <div class="row">
        <div class="col">
            <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
<div class="p-3 mb-2 bg-primary bg-gradient fw-bold text-white">Nuevo Equipo</div>




                        {!! Form::open(['url'=>'/equipo','style'=>'color:black;','id'=>'main-contact-form','class'=>'row g-3 needs-validation','name'=>'contact-form'])!!}
                        <div class="col-md-6">

                            {!! Form::label ('clave','Clave de equipo:')!!}
                            {!! Form::text ('clave',null,['placeholder'=>'Ingresa nombre ','class'=>'form-control' ,'required','onkeyup'=>'validaciones();'])!!}
                        <!-- Mensajes para validación   -->
                        <div class="valid-feedback">¡Campo válido!</div>
                        <div class="invalid-feedback">Debe completar los datos.</div>

                        </div>
                        <div class="col-md-6">
                            {!! Form::label ('nombre','Nombre del equipo:')!!}
                            {!! Form::text ('nombre',null,['placeholder'=>'Ingresa nombre ','class'=>'form-control' ,'required','onkeyup'=>'validaciones();'])!!}




                        <!-- Mensajes para validación   -->
                        <div class="valid-feedback">¡Campo válido!</div>
                        <div class="invalid-feedback">Debe completar los datos.</div>

                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="col-md-6">

        {!! Form::label ('id_area','Area:') !!}
        {!! Form::select ('id_area',$area->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar ...','class'=>'form-control','onchange'=>'llenar_categorias(this.value);','required','onkeyup'=>'validaciones();'])
        !!}






                        <!-- Mensajes para validación   -->
                        <div class="valid-feedback">¡Campo válido!</div>
                        <div class="invalid-feedback">Debe completar los datos.</div>
                        </div>
                        <div class="col-md-6">



                            {!! Form::label ('id_categoria','Categoria:') !!}
                            {!! Form::select ('id_categoria',array(''=>'Seleccionar ...'),null,['placeholder'=>'Seleccionar ...','class'=>'form-control','onchange'=>'llenar_formulario(this.value);','required','onkeyup'=>'validaciones();'])
                            !!}


                        <!-- Mensajes para validación   -->
                        <div class="valid-feedback">¡Campo válido!</div>
                        <div class="invalid-feedback">Debe completar los datos.</div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="col-md-6">



                            {!! Form::label ('fecha','Fecha siguiente mantenimiento:')!!}
            {!! Form::date ('fecha',null,['placeholder'=>'Ingresa nombre ','class'=>'form-control' ,'required','onkeyup'=>'validaciones();'])!!}


                        <!-- Mensajes para validación   -->
                        <div class="valid-feedback">¡Campo válido!</div>
                        <div class="invalid-feedback">Debe completar los datos.</div>
                        </div>
                        <div class="col-md-6">



                            {!! Form::label ('status','Estatus:')!!}
                            {!! Form::select ('status',array('1'=>'Activo','0'=>'Baja'),null,['placeholder'=>'Seleccionar','class'=>'form-control','required','onkeyup'=>'validaciones();'])!!}


                        <!-- Mensajes para validación   -->
                        <div class="valid-feedback">¡Campo válido!</div>
                        <div class="invalid-feedback">Debe completar los datos.</div>
                        </div>


<br>
<br>
<br>
<br>

    {!! Form::submit('Guardar ',['class'=>'btn btn-warning fw-bold','id'=>'centrar'])!!}
    {!! Form::close() !!}




                    </form>
             </div>
            </div>
        </div>
    </div>

@stop

@section('css')
<style type="text/css">
    #centrar{

    width: 400px;
    height: 35px;
    margin-left: auto;
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
var formularios = data;
for (var i = 0; i < formularios.length; i++) {
$('#id_categoria').append('<option value="' + formularios[i].id + '">' + formularios[i].nombre + '</option>');
}

}
});
}
</script>

@stop
