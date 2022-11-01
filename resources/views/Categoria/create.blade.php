@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@section('content')





<div class="container">
    <div class="row">
        <div class="col">
            <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
<div class="p-3 mb-2 bg-primary bg-gradient fw-bold text-white">Nueva Categoria</div>


                        {!! Form::open(['url'=>'/categoria','style'=>'color:black;','id'=>'main-contact-form','class'=>'row g-3 needs-validation','name'=>'contact-form'])!!}
                        <div class="col-md-4">


    {!! Form::label ('nombre','Nombre categoria:')!!}
    {!! Form::text ('nombre',null,['placeholder'=>'Ingresa nombre ','class'=>'form-control' ,'required','onkeyup'=>'validaciones();'])!!}
                        <!-- Mensajes para validación   -->
                        <div class="valid-feedback">¡Campo válido!</div>
                        <div class="invalid-feedback">Debe completar los datos.</div>

                        </div>
                        <div class="col-md-4">
                            {!! Form::label ('id_area','Area:') !!}
                            {!! Form::select ('id_area',$area->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar ...','class'=>'form-control','onchange'=>'llenar_formulario(this.value);','required','onkeyup'=>'validaciones();'])
                            !!}




                        <!-- Mensajes para validación   -->
                        <div class="valid-feedback">¡Campo válido!</div>
                        <div class="invalid-feedback">Debe completar los datos.</div>

                        </div>
                        <div class="col-md-4">



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

    {!! Form::submit('Guardar ',['class'=>'btn btn-success fw-bold','id'=>'centrar'])!!}
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('crear') == 'ok')
<script>
    Swal.fire(
        'Creado!',
        'Su registro ha sido creado con exito!',
        'success'
    )
</script>
@endif
@stop
