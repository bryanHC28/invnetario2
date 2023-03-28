@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> </h1>
@stop

@section('content')


    <div class="card">
        <div class="card-body">




            <table id="example" class="table table-striped display responsive nowrap" style="width:100%">



                <button type="button" class="button" id="centrar" type="button" data-bs-toggle="modal"
                    data-bs-target="#myModal">
                    <span class="button__text">Nueva pregunta</span>
                    <span class="button__icon">
                        <ion-icon name="add-outline"></ion-icon>
                    </span>
                </button>






                <thead class="bg-gra-02">


                    <tr>
                        <th style="color:#ffffff">Orden</th>
                        <th style="color:#ffffff">Categoria</th>
                        <th style="color:#ffffff">Checklist</th>
                        <th style="color:#ffffff">Nombre</th>
                        <th style="color:#ffffff">Tipo pregunta</th>
                        <th style="color:#ffffff">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($pregunta as $preguntas)
                        <tr>

                            <td>{{ $preguntas->orden_pregunta }} </td>
                            <td>
                                <li style="white-space: initial">  {{ $preguntas->checklist->categoriack->nombre }}</li>
                                </td>
                            <td>
                                <li style="white-space: initial"> {{ $preguntas->checklist->nombre }} </li>
                            </td>
                            <td>
                                <li style="white-space: initial">  {{ $preguntas->nombre_pregunta }}</li>
                                 </td>
                            <td>{{ $preguntas->tipo_pregunta }} </td>
                            <td>


                                <div class="btn-group">


                                    <a data-bs-toggle="modal" data-bs-target="#myModaledit{!! $preguntas->id !!}"
                                        class="btn btn-sm" style="background-color: #f1e1a5">
                                        <i data-bs-toggle="mensaje" title="Editar pregunta " class="fas fa-pencil-alt"></i>

                                    </a>




                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => '/preguntas/' . $preguntas->id,
                                        'class' => 'form-eliminar'
                                    ]) !!}
                                    <button data-bs-toggle="mensaje" title="Eliminar pregunta " style="margin-left: 10px"
                                        type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    {!! Form::close() !!}




                                </div>


                            </td>


                            <div class="container mt-5">

                                <div class="modal" id="myModaledit{!! $preguntas->id !!}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar pregunta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form onsubmit="Loader.show()" action="{{ route('preguntas.update', $preguntas->id) }}" method="POST"
                                                id="editform">
                                                @csrf @method('PUT')


                                                <div class="modal-body">



                                                    <div class="mb-3">



                                                        {!! Form::label('nombre_pregunta', 'Nombre de la pregunta:') !!}
                                                        {!! Form::text('nombre_pregunta', $preguntas->nombre_pregunta, [
                                                            'placeholder' => 'Ingresa nombre ',
                                                            'class' => 'form-control',
                                                            'required',
                                                            'onkeyup' => 'validaciones();',
                                                            'onkeypress' => 'return sololetras(event);',
                                                        ]) !!}
                                                    </div>


                                                    <div class="mb-3">



                                                        {!! Form::text('subcheck', $preguntas->id_checklist, [
                                                            'placeholder' => 'Ingresa nombre ',
                                                            'class' => 'form-control',
                                                            'required',
                                                            'hidden',
                                                            'onkeyup' => 'validaciones();',
                                                            'onkeypress' => 'return sololetras(event);',
                                                        ]) !!}
                                                    </div>
                                                    <div class="mb-3">

                                                        {!! Form::label('tipo_pregunta', 'Tipo de pregunta:') !!}
                                                        {!! Form::select(
                                                            'tipo_pregunta',

                                                            [
                                                                'text' => 'Texto',
                                                                'number' => 'numerico',
                                                                'date' => 'fecha',
                                                                'radio' => 'si-no- N/A',
                                                                'separador' => 'separador',
                                                                'radio2' => 'EV-Si cumple-No cumple- N/A',

                                                                'subtitulo' => 'subtitulo',
                                                                'nota' => 'nota',
                                                                'Celsius' => 'Celsius',
                                                                'Ohms' => 'Ohms',
                                                                'Hp' => 'Hp',
                                                                'Rpm' => 'Rpm',
                                                                'Volts' => 'Volts',
                                                                'Apm' => 'Apm',
                                                            ],
                                                            null,
                                                            [
                                                                'placeholder' => 'Seleccionar ...',
                                                                'class' => 'form-control',
                                                                'required',
                                                                'onkeyup' => 'validaciones();',
                                                            ],
                                                        ) !!}



                                                    </div>

                                                    <div class="mb-3">


                                                        {!! Form::label('orden_pregunta', 'Orden pregunta:') !!}
                                                        {!! Form::number('orden_pregunta', $preguntas->orden_pregunta, [
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
                        <th></th>
                        <th></th>
                    </tr>

                </tfoot>

            </table>











        </div>
    </div>


    <div class="container mt-5">

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nueva Pregunta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                    </div>
                    {{-- <p style="color: red">#NOTA: El nombre de las preguntas no pueden contener caracteres como: * / - # ni numeros, de la misma forma el sistema no aceptara preguntas repetidas en el mismo checklist o subchecklistm esto con fines de seguridad </p> --}}

                    <div class="modal-body">


                        {!! Form::open([
                            'url' => '/preguntas',
                            'style' => 'color:black;',
                            'id' => 'main-contact-form',
                            'class' => 'contact-form',
                            'name' => 'contact-form',
                            'onsubmit'=>'Loader.show()'
                        ]) !!}

                        <div class="mb-3">



                            {!! Form::text('id_checklist', $id_checklist, [
                                'placeholder' => 'Ingresa nombre ',
                                'class' => 'form-control',
                                'required',
                                'hidden',
                                'onkeyup' => 'validaciones();',
                            ]) !!}
                        </div>
                        <div class="mb-3">



                            {!! Form::text('id_subchecklist', $id_subchecklist, [
                                'placeholder' => 'Ingresa nombre ',
                                'class' => 'form-control',
                                'required',
                                'hidden',
                                'onkeyup' => 'validaciones();',
                            ]) !!}
                        </div>
                        <div class="mb-3">


                            {!! Form::label('nombre_pregunta', 'Nombre de la pregunta:') !!}
                            {!! Form::text('nombre_pregunta', null, [
                                'placeholder' => 'Ingresa nombre ',
                                'class' => 'form-control',
                                'required',
                                'onkeypress' => 'return sololetras(event);',
                            ]) !!}
                        </div>
                        <div class="mb-3">
                            @if (auth()->user()->id_sucursal == 1)
                                {!! Form::label('tipo_pregunta', 'Tipo de pregunta:') !!}
                                {!! Form::select(
                                    'tipo_pregunta',
                                    [
                                        'text' => 'Texto',
                                        'number' => 'numerico',
                                        'date' => 'fecha',
                                        'radio' => 'si-no- N/A',
                                        'separador' => 'separador',
                                        'radio2' => 'EV-Si cumple-No cumple- N/A',
                                        'subtitulo' => 'subtitulo',
                                        'nota' => 'nota',
                                        'Celsius' => 'Celsius',
                                        'Ohms' => 'Ohms',
                                        'Hp' => 'Hp',
                                        'Rpm' => 'Rpm',
                                        'Volts' => 'Volts',
                                        'Apm' => 'Apm',
                                    ],
                                    null,
                                    [
                                        'placeholder' => 'Seleccionar ...',
                                        'class' => 'form-control',
                                        'required',
                                        'onkeyup' => 'validaciones();',
                                    ],
                                ) !!}
                            @else
                                {!! Form::label('tipo_pregunta', 'Tipo de pregunta:') !!}
                                {!! Form::select(
                                    'tipo_pregunta',
                                    [
                                        'text' => 'Texto',
                                        'number' => 'numerico',
                                        'date' => 'fecha',
                                        'radio' => 'si-no- N/A',
                                        'separador' => 'separador',
                                        'radio2' => 'EV-Si cumple-No cumple- N/A',
                                        'subtitulo' => 'subtitulo',
                                        'nota' => 'nota',
                                    ],
                                    null,
                                    [
                                        'placeholder' => 'Seleccionar ...',
                                        'class' => 'form-control',
                                        'required',
                                        'onkeyup' => 'validaciones();',
                                    ],
                                ) !!}
                            @endif
                        </div>
                        <div class="mb-3">


                            {!! Form::label('orden_pregunta', 'Orden pregunta:') !!}
                            {!! Form::number('orden_pregunta', null, [
                                'placeholder' => 'Ingresa orden',
                                'class' => 'form-control',
                                'required',
                            ]) !!}
                        </div>



                    </div>
                    <div class="modal-footer">
                        {!! Form::submit('Guardar ', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}

                        <button data-bs-dismiss="modal" type="submit" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
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
    </style>

    <style>
        .bg-gra-02 {
            background: -webkit-gradient(linear, left bottom, right top, from(#0a003d), to(#fb5c00));
            background: -webkit-linear-gradient(bottom left, #0a003d 0%, #ff6207 100%);
            background: -moz-linear-gradient(bottom left, #0a003d 0%, #fb6209 100%);
            background: -o-linear-gradient(bottom left, #0a003d 0%, #f05800 100%);
            background: linear-gradient(to top right, #7BAA98 0%, #7BAA98 100%);
        }
    </style>


@stop

@section('js')

    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/tooltip.js') }}"></script>
    <script src="{{ asset('js/validacion_preguntas.js') }}"></script>
    <script src="{{ asset('js/piedatatable.js') }}"></script>
    <script src="{{ asset('js/loader.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.4/howler.js"></script>







    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'Su registro ha sido eliminado con exito!',
                'success'
            )

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

    @if (session('no_creado') == 'no')
        <script>
            Swal.fire(
                'Ups!',
                'El nombre de esta pregunta ya se encuentra en nuestros registros, por favor ingrese una diferente!',
                'warning'
            )
            let sound = new Howl({
              src: ["{{ asset('audio/success.mp4') }}"],
              volume: 1.0
            });

            sound.play()
        </script>
    @endif














@stop
