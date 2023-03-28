@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


    <br>



    <div class="card">
        <div class="card-body">


            <table id="example" class="table table-striped display responsive nowrap" style="font-size:14px">
                <thead style="background-color: #759ECA">
                    <tr>
                        <th style="color:#ffffff">Clave</th>
                        <th style="color:#ffffff">Sig Manto</th>
                        <th style="color:#ffffff">Dias restantes</th>
                        <th style="color:#ffffff">Checklist</th>
                        <th style="color:#ffffff">Area</th>
                        <th style="color:#ffffff">Categoria</th>
                        <th style="color:#ffffff">Nombre del equipo</th>
                        <th style="color:#ffffff">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tabla_fecha as $fecha)
                        <tr>
                            <td>{{ $fecha->equipos->clave }}</td>
                            <td><span class="{{ 'badge badge-pill badge-info' }}"> {{ $fecha->programanto->proxima_fecha }} </span></td>
                            @php
                                $fechaActual = date('Y-m-d', $mod_date);
                                $fecha_prox = date('Y-m-d', strtotime($fecha->programanto->proxima_fecha));
                                $fecha1 = date_create($fechaActual);
                                $fecha2 = date_create($fecha_prox);
                                $dias = date_diff($fecha1, $fecha2)->format('%R%a');
                            @endphp
                            <td><span
                                    class="@if ($dias >= +0 && $dias <= +7) {{ 'badge badge-pill badge-danger' }} @elseif ($dias > +7 && $dias <= +30){{ 'badge badge-pill badge-warning' }}@elseif ($dias > +30 && $dias <= +182){{ 'badge badge-pill badge-primary' }}@elseif ($dias > +182 && $dias <= +365){{ 'badge badge-pill badge-success' }}@elseif ($dias > 365){{ 'badge badge-pill badge-info' }}@elseif ($dias < +0){{ 'badge badge-pill badge-dark' }} @endif">{{ $dias }}
                                    dias</span></td>
                            <td>
                                <li style="white-space: initial"> {{ $fecha->checklist->nombre }}</li>
                            </td>
                            <td>{{ $fecha->equipos->area->nombre }}</td>
                            <td>{{ $fecha->equipos->categorias->nombre }}</td>
                            <td>
                                <li style="white-space: initial">{{ $fecha->equipos->nombre_equipo }}</li>
                            </td>
                            <td>

                                <div class="btn-group">



                                    <a id="navegar" onclick="Loader.show()" data-bs-toggle="mensaje"
                                        title="Cambiar fecha para: {{ $fecha->clave }}" style="background-color: #283767"
                                        class="btn btn-sm" href="{!! asset('fecha/' . $fecha->id_programanto . '/edit') !!}">
                                        <i style="color: #ffffff" class="fa fa-calendar"></i>
                                    </a>

                                </div>
                            </td>


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
                        <th></th>
                        <th></th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>




@stop

@section('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.4/howler.js"></script>
    <script src="{{ asset('js/piedatatable.js') }}"></script>
    <script src="{{ asset('js/tooltip.js') }}"></script>
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


@stop
