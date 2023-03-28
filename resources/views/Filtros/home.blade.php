@extends('adminlte::page')


@section('title', 'Dashboard')


@section('content_header')

@stop

@section('content')

    <br>





    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="form-group two-fields">
                    <label for="">Filtros</label>
                    <div class="input-group">
                        <div class="input-group-prepend ">
                            <div class="input-group-text bg-primary"><i class="fa fa-hourglass-start"
                                    aria-hidden="true"></i>&nbsp;Categoria</div>
                        </div>
                        {!! Form::label('categoriaS', 'Selecciona Subcheck-list:', ['hidden']) !!}

                        {!! Form::select('categoriaS', $combobox->pluck('nombre', 'id')->all(), null, [
                            'placeholder' => 'Seleccionar',
                            'class' => 'form-control filter-select',
                            'data-column' => 7,
                            'required',
                            'onkeyup' => 'validaciones();',
                        ]) !!}


                    </div>
                </div>
            </div>
        </div>
    </div>








    <div class="card">
        <div class="card-body">





            <table id="example" class="table table-striped display responsive nowrap" style="font-size:14px">
                <thead style="background-color: #759ECA">
                    <tr>
                        <th style="color:#ffffff">Claves</th>
                        <th style="color:#ffffff">Equipo</th>
                        <th style="color:#ffffff">Sig Manto</th>
                        <th style="color:#ffffff">Dias restantes</th>
                        <th style="color:#ffffff">Checklist</th>
                        <th style="color:#ffffff">Area</th>
                        <th style="color:#ffffff">Categoria</th>
                        <th hidden style="color:#ffffff">id</th>
                        <th style="color:#ffffff">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos_tabla as $preguntas)
                        <tr>
                            <td>#{{ $preguntas->programanto->equipos->clave }}</td>




                            <td>
                                <li style="white-space: initial"> {{ $preguntas->programanto->equipos->nombre_equipo }}</li>
                            </td>

                            <td><span class="{{ 'badge badge-pill badge-info' }}"> {{ $preguntas->proxima_fecha }} </span></td>





                            @php
                                $fechaActual = date('Y-m-d', $mod_date);
                                $fecha_prox = date('Y-m-d', strtotime($preguntas->proxima_fecha));
                                $fecha1 = date_create($fechaActual);
                                $fecha2 = date_create($fecha_prox);
                                $dias = date_diff($fecha1, $fecha2)->format('%R%a');
                            @endphp


                            <td><span
                                    class="@if ($dias >= +0 && $dias <= +7) {{ 'badge badge-pill badge-danger' }} @elseif ($dias > +7 && $dias <= +30){{ 'badge badge-pill badge-warning' }}@elseif ($dias > +30 && $dias <= +182){{ 'badge badge-pill badge-primary' }}@elseif ($dias > +182 && $dias <= +365){{ 'badge badge-pill badge-success' }}@elseif ($dias > 365){{ 'badge badge-pill badge-info' }}@elseif ($dias < +0){{ 'badge badge-pill badge-dark' }} @endif">{{ $dias }}
                                    dias</span></td>
                            <td>
                                <li style="white-space: initial">{{ $preguntas->programanto->checklist->nombre}}</li>
                            </td>
                            <td>{{ $preguntas->programanto->equipos->area->nombre }}</td>
                            <td>{{ $preguntas->programanto->checklist->categoriack->nombre }}</td>
                            <td hidden>{{ $preguntas->programanto->checklist->categoriack->id }}</td>
                            <td>
                                <div class="btn-group">
                                    <a data-bs-toggle="mensaje" title="Contestar cuestionario para: {{$preguntas->programanto->equipos->clave}}" style="background-color: #759ECA" class="btn  btn-sm" type="button"
                                        href="{{ route('formularios',['id'=>$preguntas->id,'Checklist'=>$preguntas->programanto->checklist->nombre,'id_equipo'=>$preguntas->programanto->equipos->id,'id_subchecklist'=>$preguntas->programanto->checklist->id])}}">
                                            <i class="fas fa-marker">   </i>
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
                        <th hidden></th>
                    </tr>
                </tfoot>
            </table>








        </div>
    </div>
    </div>



@stop

@section('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">





@stop

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('js/paginaciondatatable.js') }}"></script>
    <script src="{{ asset('js/tooltip.js') }}"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>












@stop
