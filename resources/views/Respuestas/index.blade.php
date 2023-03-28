@extends('adminlte::page')


@section('title', 'Dashboard')


@section('content_header')

@stop

@section('content')


    <br>
    <br>







    <div class="card">
        <div class="card-body">


            <table id="example" class="table table-striped display responsive nowrap" style="font-size:14px">
                <thead class="bg-gra-02">
                    <tr>
                        <th style="color:#ffffff">Equipo</th>
                        <th style="color:#ffffff">Area</th>
                        <th style="color:#ffffff">Categoria</th>
                        <th style="color:#ffffff">Clave</th>
                        <th style="color:#ffffff">Contesto</th>
                        <th style="color:#ffffff">Estatus</th>
                        <th style="color:#ffffff">Cuestionario</th>
                        <th style="color:#ffffff">Acciones</th>
                        <th style="color:#ffffff">Fecha</th>





                    </tr>
                </thead>
                <tbody>

                    @foreach ($respuestas as $resp)
                        <tr>



                            <td>
                            <li style="white-space: initial"> {{ $resp->controlmanto->equipos->nombre_equipo}}</li>
                            </td>
                            <td>{{ $resp->controlmanto->equipos->area->nombre }}</td>
                            <td>{{ $resp->controlmanto->checklist->categoriack->nombre }}</td>
                            <td>{{ $resp->controlmanto->equipos->clave }}</td>

                            <td> {{ $resp->usuario->name }}</td>
                            <td><span
                                    class="@if ($resp->reporte->estatus_supervisor == 'EN REVISION') {{ 'badge badge-pill badge-warning' }} @elseif ($resp->reporte->estatus_supervisor == 'ACEPTADO') {{ 'badge badge-pill badge-success' }} @endif">
                                    {{ $resp->reporte->estatus_supervisor }}</span></td>


                            <td>
                                <li style="white-space: initial"> {{ $resp->controlmanto->checklist->nombre }}</li>
                            </td>

                            <td>


                                <div class="btn-group">

                                    <a onclick="Loader.show();" id="navegar" data-bs-toggle="mensaje"
                                        title="Visualizar respuestas de: {{ $resp->controlmanto->equipos->clave }} "
                                        href="{{ route('mostrarrespuestas', ['id' => $resp->id]) }}"
                                        style="background-color: #759ECA" class="btn btn-sm" type="button">
                                        <i style="color: rgb(0, 0, 0)" class="far fa-eye"> </i>
                                    </a>
                                    &nbsp;
                                    &nbsp;



                                    <a  id="navegar" data-bs-toggle="mensaje"
                                        title="Descargar PDF de : {{ $resp->controlmanto->equipos->clave }} "
                                        href="{{ route('pdf', ['id' => $resp->id]) }}"
                                        style="background-color: rgb(255, 255, 255)" class="btn  btn-sm" type="button">
                                        <i class='fas fa-file-pdf' style="color: rgb(122, 15, 15)"></i>
                                    </a>

                                    &nbsp;
                                    &nbsp;


                                    @if (auth()->user()->tipo_cuenta === 'Administrador' || auth()->user()->tipo_cuenta === 'Supervisor')

                                        <a onclick="Loader.show();" id="navegar" data-bs-toggle="mensaje" title="Aceptar cuestionario "
                                        href="{{ route('actualizar_status', ['id' => $resp->id]) }}"
                                            style="background-color: rgb(40, 55, 103)" class="btn  btn-sm" type="button">
                                            <i class="fas fa-check-circle" style="color: rgb(251, 251, 251)"></i>
                                        </a>

                                        &nbsp;
                                        &nbsp;

                                        <a onclick="Loader.show();" id="navegar" data-bs-toggle="mensaje" title="Regresar al estado anterior "
                                            style="background-color: rgb(255, 190, 77)" class="btn  btn-sm" type="button"
                                            href="{{ route('actualizar_status_back', ['id' => $resp->id]) }}">
                                            <i class="fas fa-redo-alt" style="color: rgb(0, 0, 0)"></i>
                                        </a>

                                        &nbsp;
                                        &nbsp;

                                        <a id="mensaje" title="Enviar reporte a cliente" data-bs-toggle="modal"
                                            data-bs-target="#myModaledit{!! $resp->id !!}"
                                            style="background-color: #7BAA98" class="btn  btn-sm" type="button">
                                            <i class="fa fa-envelope" style="color: rgb(0, 0, 0)"></i>
                                        </a>




                                </div>
                    @endif








        </div>
        </td>
        <td> {{ substr($resp->created_at, 0, 10) }}</td>
        <div id="boxLoading"></div>


        <div class="container mt-5">

            <div class="modal" id="myModaledit{!! $resp->id !!}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Enviar correo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <form onsubmit="Loader.show()" action="{{ route('correo.update', $resp->id) }}" method="POST" id="editform">
                            @csrf @method('PUT')


                            <div class="modal-body">
                                <div class="mb-3">



                                    {!! Form::text('clave', $resp->controlmanto->equipos->clave, [
                                        'placeholder' => 'Ingresa nombre ',
                                        'class' => 'form-control',
                                        'required',
                                        'hidden',
                                        'onkeyup' => 'validaciones();',
                                    ]) !!}
                                </div>



                                {!! Form::label('correo', 'Para:') !!}
                                @if (auth()->user()->id_empresa === 1)
                                    {!! Form::select(
                                        'correo',
                                        [
                                            'fsoto@organosintesis.com' => 'fsoto@organosintesis.com',
                                            'humberto@organosintesis.com' => 'humberto@organosintesis.com',
                                            'mcarrillo@organosintesis.com' => 'mcarrillo@organosintesis.com',
                                            'jdc@organosintesis.com' => 'jdc@organosintesis.com',
                                            'fernandoz@organosintesis.com' => 'fernandoz@organosintesis.com',
                                            'T.Valencia@organosintesis.com' => 'T.Valencia@organosintesis.com',
                                            'J.Luismartinez@organosintesis.com' => 'J.Luismartinez@organosintesis.com',
                                            'lecr@organosintesis.com' => 'lecr@organosintesis.com',
                                            'o.mondragon@organosintesis.com' => 'o.mondragon@organosintesis.com',
                                            'm.contreras@organosintesis.com' => 'm.contreras@organosintesis.com',
                                            'gromero@organosintesis.com' => 'gromero@organosintesis.com',
                                            'arv@organosintesis.com' => 'arv@organosintesis.com',
                                            'gsm@organosintesis.com' => 'gsm@organosintesis.com',
                                            'danielmejia@organosintesis.com' => 'danielmejia@organosintesis.com',
                                            'edgarlopez@organosintesis.com' => 'edgarlopez@organosintesis.com',
                                            'william@organosintesis.com' => 'william@organosintesis.com',
                                            'erikrodriguez@organosintesis.com' => 'erikrodriguez@organosintesis.com',
                                            'agomez@organosintesis.com' => 'agomez@organosintesis.com',
                                            'aux_alm@organosintesis.com' => 'aux_alm@organosintesis.com',
                                            'jlcr@organosintesis.com' => 'jlcr@organosintesis.com',
                                            'eaj@organosintesis.com' => 'eaj@organosintesis.com',
                                            'bhilario@empresavirtual.mx' => 'bhilario@empresavirtual.mx',
                                            'bryaaan99@gmail.com' => 'bryaaan99@gmail.com',
                                        ],
                                        null,
                                        [
                                            'placeholder' => 'Seleccionar ...',
                                            'class' => 'form-control',
                                            'required',
                                            'onkeyup' => 'validaciones();',
                                        ],
                                    ) !!}
                                @elseif (auth()->user()->id_empresa != 1)
                                    {!! Form::select(
                                        'correo',
                                        [

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
                            <div class="modal-footer">
                                <button  id="navegar"  type="submit"
                                    class="btn btn-success">Enviar <i class="fa fa-envelope"
                                        style="color: rgb(255, 255, 255)"></i></button>

                                <button  data-bs-dismiss="modal" type="submit" class="btn btn-danger">Cancelar</button>
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

                <th style="color:#000000"></th>
                <th style="color:#000000"></th>
                <th style="color:#000000"></th>

                <th style="color:#000000"></th>
                <th style="color:#000000"></th>
                <th style="color:#000000"></th>
                <th style="color:#000000"></th>
                <th style="color:#000000"></th>

                <th style="color:#000000"></th>
            </tr>
        </tfoot>
        </table>



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



    <style>
        .modal-header {
            background: #1AA8B7;
            color: #fff;
        }

        .required:after {
            content: "*";
            color: red;
        }

        .bg-gra-02 {
            background: -webkit-gradient(linear, left bottom, right top, from(#170183), to(#7ec7ff));
            background: -webkit-linear-gradient(bottom left, #0a003d 0%, #7ec7ff 100%);
            background: -moz-linear-gradient(bottom left, #0a003d 0%, #7ec7ff 100%);
            background: -o-linear-gradient(bottom left, #0a003d 0%, #7ec7ff 100%);
            background: linear-gradient(to top right, #759ECA 0%, #759ECA 100%);
        }

    </style>
@stop

@section('js')



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.4/howler.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/piedatatable.js') }}"></script>
    <script src="{{ asset('js/tooltip.js') }}"></script>
    <script src="{{ asset('js/loader.js') }}"></script>

    @if (session('validar') == 'ok')
        <script>
            Swal.fire(
                'Error!',
                'Este reporte ya ha sido enviado a un usuario!',
                'info'
            )
            let sound = new Howl({
              src: ["{{ asset('audio/success.mp4') }}"],
              volume: 1.0
            });

            sound.play()
        </script>
    @endif

    @if (session('enviado') == 'ok')
    <script>
        Swal.fire(
            'Correcto!',
            'El correo ha sido enviado con exito!',
            'success'
        )
        let sound = new Howl({
          src: ["{{ asset('audio/success.mp4') }}"],
          volume: 1.0
        });

        sound.play()
    </script>
@endif





    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@stop
