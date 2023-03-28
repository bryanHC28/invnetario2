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
                        <th style="color:#ffffff">ID</th>
                        <th style="color:#ffffff">Equipo</th>
                        <th style="color:#ffffff">Area</th>
                        <th style="color:#ffffff">Categoria</th>
                        <th style="color:#ffffff">Clave</th>

                        <th style="color:#ffffff">Emisor</th>
                        <th style="color:#ffffff">Estatus</th>
                        <th style="color:#ffffff">Fecha</th>
                        <th style="color:#ffffff">Acciones</th>






                    </tr>
                </thead>
                <tbody>

@foreach ($tabla_reportes as $resp)
<tr>


    <td>#{{ $resp->id }}</td>
    <td><li style="white-space: initial"> {{ $resp->respuestas->controlmanto->equipos->nombre_equipo }}</li></td>
    <td><li style="white-space: initial"> {{ $resp->respuestas->controlmanto->equipos->area->nombre }}</li></td>
    <td><li style="white-space: initial"> {{ $resp->respuestas->controlmanto->equipos->categorias->nombre }}</li></td>
    <td><li style="white-space: initial"> {{ $resp->respuestas->controlmanto->equipos->clave }}</li></td>


    <td><li style="white-space: initial"> {{ $resp->emisores->name }}</li></td>
    <td><span class="@if($resp->estatus_cliente== 'EN REVISION') {{'badge badge-pill badge-warning'}} @elseif ($resp->estatus_cliente == 'ACEPTADO') {{'badge badge-pill badge-success'}} @endif"> {{$resp->estatus_cliente}}</span></td>


    <td> {{ substr($resp->created_at,0,10) }}</td>
    <td>


        <div class="btn-group">
            <a id="navegar" data-bs-toggle="mensaje"
            title="Visualizar respuestas de: {{ $resp->clave }} "
            href="{{ route('mostrarrespuestas', ['id' => $resp->id_respuesta]) }}"
            style="background-color: #759ECA" class="btn btn-sm" type="button">
            <i style="color: rgb(0, 0, 0)" class="far fa-eye"> </i>
        </a>
            &nbsp;
            &nbsp;


            <a id="navegar" data-bs-toggle="mensaje"
            title="Descargar PDF de : {{ $resp->clave }} "
            href="{{ route('pdf', ['id' => $resp->id_respuesta]) }}"
            style="background-color: rgb(164, 33, 33)" class="btn  btn-sm" type="button">
            <i class='fas fa-file-pdf' style="color: white"></i>
        </a>
            &nbsp;
            &nbsp;




            <a id="navegar" data-bs-toggle="mensaje" title="Aceptar cuestionario "
            href="{{ route('actualizar_status_usuario', ['id' => $resp->id]) }}"
                style="background-color: rgb(40, 55, 103)" class="btn  btn-sm" type="button">
                <i class="fas fa-check-circle" style="color: rgb(251, 251, 251)"></i>
            </a>


            &nbsp;
            &nbsp;

            <a data-bs-toggle="mensaje" title="Regresar al estado anterior " style="background-color: rgb(255, 190, 77)" class="btn  btn-sm" type="button"
            href="{{ route('actualizar_status_back_usuario', ['id' => $resp->id]) }}">
                <i class="fas fa-redo-alt" style="color: rgb(0, 0, 0)"></i>
            </a>













        </div>
    </td>

    <div id="boxLoading"></div>









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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />


    <style>



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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="{{ asset('js/piedatatable.js') }}"></script>


<script>
    var tooltipTriggerList = [].slice.call(document.getElementById('mensaje'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl){


        return new bootstrap.Tooltip(tooltipTriggerEl)
    })




    </script>
     <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@stop
