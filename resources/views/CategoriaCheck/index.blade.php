@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> </h1>
@stop

@section('content')


{{--

    @if ($usuario->tipo_cuenta === 'SuperAdmin')

        <div class="card">
            <div class="card-body">




                <table id="example" class="table table-striped display responsive nowrap" style="width:100%">




                    <thead class="bg-gra-02">


                        <tr>
                            <th style="color:#ffffff">ID EMPRESA</th>
                            <th style="color:#ffffff">NOMBRE EMPRESA</th>
                            <th style="color:#ffffff">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas as $empresa)
                            <tr>

                                <td>{{ $empresa->id }}</td>
                                <td>{{ $empresa->nombre_empresa }}</td>

                                <td>

                                    <div class="btn-group">




                                        <a id="ck" onclick="sucursales({!! $empresa->id !!} )" class="btn btn-sm"
                                            style="background-color: #15ff00ce">
                                            <i class="fas fa-bars"></i>

                                        </a>


                                        &nbsp;
                                        &nbsp;





                                    </div>
                                </td>







                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID EMPRESA</th>
                            <th>NOMBRE EMPRESA</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>


            </div>
        </div>

    @endif








 --}}

























        <div class="card">
            <div class="card-body">




                <table id="example" class="table table-striped display responsive nowrap" style="width:100%">





                                <button  type="button" class="button" id="centrar" type="button" data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                    <span class="button__text">Categoria</span>
                                    <span class="button__icon">
                                        <ion-icon name="add-outline"></ion-icon>
                                    </span>
                                </button>

                    <thead class="bg-gra-02">


                        <tr>
                            <th style="color:#ffffff">ID</th>
                            <th style="color:#ffffff">Nombre categoria</th>
                            <th style="color:#ffffff">Status</th>
                            <th style="color:#ffffff">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($checklist as $checklists)
                            <tr>

                                <td>{{ $checklists->id }}</td>
                                <td>{{ $checklists->nombre }}</td>
                                <td><span
                                        class="@if ($checklists->Estado_eliminado == 1) {{ 'badge badge-pill badge-success' }} @endif">Activo</span>
                                </td>
                                <td>

                                    <div class="btn-group">







                                        <a   data-bs-toggle="mensaje" title="Ver cuestionarios "   id="ck" onclick="query({!! $checklists->id !!} )" class="btn btn-sm"
                                            style="background-color: #f1e1a5">
                                            <i  data-bs-toggle="mensaje" title="Ver cuestionarios "  class="fas fa-eye"></i>

                                        </a>



                                        &nbsp;
                                        &nbsp;




                                        <a  data-bs-toggle="modal"
                                            data-bs-target="#myModalsubchecklist{!! $checklists->id !!}" class="btn btn-sm"
                                            style="background-color: #63b782">
                                            <i data-bs-toggle="mensaje" title="Crear cuestionario " class="fas fa-file-alt"></i>

                                        </a>





                                        {!! Form::open(['method' => 'DELETE', 'url' => '/checklist/' . $checklists->id, 'class' => 'form-eliminar']) !!}
                                        <button  style="margin-left: 10px" type="submit" class="btn btn-danger btn-sm">
                                            <i data-bs-toggle="mensaje" title="Eliminar categoria"  class="fas fa-trash-alt"></i>
                                        </button>
                                        {!! Form::close() !!}

                                    </div>
                                </td>







                                <div class="container mt-5">

                                    <div class="modal" id="myModalsubchecklist{!! $checklists->id !!}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Checklist para: {!! $checklists->nombre !!}
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <form onsubmit="Loader.show()" action="{{ route('subchecklist.store') }}" method="POST">
                                                    @csrf @method('POST')


                                                    <div class="modal-body">



                                                        <div class="mb-3">




                                                            {!! Form::text('id_checklist', $checklists->id, [
                                                                'placeholder' => 'Ingresa nombre ',
                                                                'class' => 'form-control',
                                                                'required',
                                                                'hidden',
                                                                'onkeyup' => 'validaciones();',
                                                            ]) !!}
                                                        </div>
                                                        <div class="mb-3">

                                                            {!! Form::label('nombre', 'Ingrese nombre del Checklist:') !!}
                                                            {!! Form::text('nombre', null, [
                                                                'placeholder' => 'Ingresa nombre ',
                                                                'class' => 'form-control',
                                                                'required',
                                                                'onkeyup' => 'validaciones();',
                                                            ]) !!}


                                                        </div>





                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Guardar</button>

                                                        <button data-bs-dismiss="modal" type="submit"
                                                            class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>







                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
							 <th></th>
                <th></th>
                <th></th>
                <th></th>

                        </tr>
                    </tfoot>
                </table>








    <div class="container mt-5">

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nueva categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">


                        {!! Form::open([
                            'url' => '/checklist',
                            'style' => 'color:black;',
                            'id' => 'main-contact-form',
                            'class' => 'contact-form',
                            'name' => 'contact-form',
                            'onsubmit'=>'Loader.show()'
                        ]) !!}


                        <div class="mb-3">


                            {!! Form::label('nombre', 'Nombre de la categoria:') !!}
                            {!! Form::text('nombre', null, [
                                'placeholder' => 'Ingresa nombre ',
                                'class' => 'form-control',
                                'required',
                                'onkeyup' => 'validaciones();',
                            ]) !!}
                        </div>


                        <div class="mb-3">

                            {!! Form::text('id_empresas', auth()->user()->id_empresa, [
                                'placeholder' => 'Ingresa nombre ',
                                'class' => 'form-control',
                                'required',
                                'hidden',
                                'onkeyup' => 'validaciones();',
                            ]) !!}
                        </div>
                        <div class="mb-3">

                            {!! Form::text('id_sucursales', auth()->user()->id_sucursal, [
                                'placeholder' => 'Ingresa nombre ',
                                'class' => 'form-control',
                                'required',
                                'hidden',
                                'onkeyup' => 'validaciones();',
                            ]) !!}
                        </div>





                    </div>
                    <div class="modal-footer">
                        {!! Form::submit('Guardar ', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}

                        <button  data-bs-dismiss="modal" type="submit" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="boxLoading"></div>



    <div id="campos">


    </div>



    </div>

    <div id="sucursales">

    </div>



    </div>
    </div>






@stop

@section('css')


    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />


    <style>
        .bg-gra-02 {
            background: -webkit-gradient(linear, left bottom, right top, from(#0a003d), to(#fb5c00));
            background: -webkit-linear-gradient(bottom left, #0a003d 0%, #ff6207 100%);
            background: -moz-linear-gradient(bottom left, #0a003d 0%, #fb6209 100%);
            background: -o-linear-gradient(bottom left, #0a003d 0%, #f05800 100%);
            background: linear-gradient(to top right, #7BAA98 0%, #7BAA98 100%);
        }
    </style>

    <style type="text/css">
        .flexbox {
            text-align: center;

        }




        .modal-header {
            background: #1AA8B7;
            color: #fff;
        }

        .required:after {
            content: "*";
            color: red;
        }

        .button {
	display: flex;
	height: 30px;
	padding: 0;
	background: #009578;
	border: none;
	outline: none;
	border-radius: 5px;
	overflow: hidden;
	font-family: "Quicksand", sans-serif;
	font-size: 16px;
	font-weight: 500;
	cursor: pointer;
}

.button:hover {
	background: #008168;
}

.button:active {
	background: #006e58;
}

.button__text,
.button__icon {
	display: inline-flex;
	align-items: center;
	padding: 0 24px;
	color: #fff;
	height: 120%;
}

.button__icon {
	font-size: 1.5em;
	background: rgba(0, 0, 0, 0.08);
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

<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.4/howler.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/piedatatable.js') }}"></script>
    <script src="{{ asset('js/tooltip.js') }}"></script>
    <script src="{{ asset('js/loader.js') }}"></script>


    <script>
        function query(ch) {
            var asset = '{{ asset('') }}';
            var ruta = asset + 'query/' + ch;

            console.log(ruta);

            $.ajax({
                type: 'GET',
                url: ruta,

                success: function(data) {
                    $("#campos").html(data);
                }



            });

        }
    </script>

    <script>
        function sucursales(id_empresa) {
            var asset = '{{ asset('') }}';
            var ruta = asset + 'sucursales/' + id_empresa;

            console.log(ruta);

            $.ajax({
                type: 'GET',
                url: ruta,

                success: function(data) {
                    $("#sucursales").html(data);
                }



            });

        }
    </script>

    @if (session('eliminar') == 'ok')
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

    @if (session('crear') == 'ok')
    <script>
        Swal.fire(
            'Creado!',
            'Su registro ha sido creado con exito!',
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
