@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')













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

                    <form class=" flexbox"@if (auth()->user()->id_sucursal==1)action="{{route('tabla.store')}}" @elseif (auth()->user()->id_sucursal==2)action="{{route('excel_monalisa')}}"@endif method="POST" enctype="multipart/form-data">
                        @csrf


                        <input type="file" name="import_file" />

                        <button class="btn btn-primary" type="submit">Importar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<br>



<div class="card">
    <div class="card-body">


<table id="example" class="table table-striped display responsive nowrap" style="font-size:14px">
    <thead style="background-color: #759ECA">
        <tr>
            <th style="color:#ffffff">Clave</th>
            <th style="color:#ffffff">Area</th>
            <th style="color:#ffffff">Categoria</th>
            <th style="color:#ffffff">Nombre</th>
            <th style="color:#ffffff">Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach($JSON as $preguntas)
        <tr>


@if (empty($preguntas->clave))
<td>Sin clave</td>
@else
<td>{{$preguntas->clave}}</td>
@endif

            <td><li style="white-space: initial"> {{$preguntas->area->nombre}}</li></td>
            <td>{{$preguntas->categorias->nombre}}</td>
            <td><li style="white-space: initial"> {{$preguntas->nombre_equipo}}</li></td>

            <td>

                <div class="btn-group">



                            <a onclick="Loader.show()" style="background-color: #F1E1A5" data-bs-toggle="mensaje" title="Asignar nuevo cuestionario para: {{$preguntas->clave}}"  class="btn btn-sm" href="{!! asset('equipo/'.$preguntas->id.'/edit') !!}" >
                                <i  class="	fas fa-compress"></i>
                            </a>


                            &nbsp;
                            &nbsp;


                            {!! Form::open(['method' =>'DELETE','url'=>
                            '/equipo/'.$preguntas->id,'class'=>'form-eliminar'])!!}
                                <button style="background-color: #A42121 " data-bs-toggle="mensaje" title="Eliminar equipo: {{$preguntas->clave}}" style="margin-left: 10px" type="submit" class="btn btn-sm">
                                    <i style="color: #ffffff" class="fas fa-trash-alt"></i>
                                </button>
                            {!! Form::close() !!}





                </div>
            </td>

            <div id="boxLoading"></div>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

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


.loading {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url('https://hackernoon.imgix.net/images/0*4Gzjgh9Y7Gu8KEtZ.gif') 50% 50% no-repeat rgb(249, 249, 249);
  opacity: .8;
}
    </style>
@stop


@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.4/howler.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('js/piedatatable.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('js/tooltip.js') }}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
<script src="{{ asset('js/loader.js') }}"></script>


@if (session('actualizar') == 'ok')
<script>
    Swal.fire(
        'Actualizado!',
        'Su registro ha sido actualizado con exito!',
        'success'
    )
    let sound = new Howl({
              src: ["{{ asset('audio/success.mp4') }}"],
              volume: 1.0
            });

            sound.play()
</script>
@endif




@if(session('eliminar')=='ok')
<script>
  Swal.fire(
       'Eliminado!',
       'Su registro ha sido eliminado con exito!',
       'success'
     )
     let sound = new Howl({
              src: ["{{ asset('audio/success.mp4') }}"],
              volume: 1.0
            });

            sound.play()
</script>


@endif


@stop
