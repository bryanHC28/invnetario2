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
                        <th style="color:#ffffff">ID REPORTE</th>
                        <th style="color:#ffffff">ESTATUS CLIENTE</th>
                        <th style="color:#ffffff">ESTATUS VISOR</th>
                        <th style="color:#ffffff">CLAVE</th>
                        <th style="color:#ffffff">EQUIPO</th>
                        <th style="color:#ffffff">USUARIO</th>
                        <th style="color:#ffffff">VISOR</th>
                        <th style="color:#ffffff">ACCIONES</th>







                    </tr>
                </thead>
                <tbody>

@foreach ($tabla_aceptados as $reporte)
<tr>



    <td>#{{ $reporte->id }}</td>
 <td><span class="@if($reporte->estatus_cliente== 'EN REVISION') {{'badge badge-pill badge-warning'}} @elseif ($reporte->estatus_cliente == 'ACEPTADO') {{'badge badge-pill badge-success'}} @endif"> {{$reporte->estatus_cliente}}</span></td>
<td><span class="@if($reporte->estatus_supervisor== 'EN REVISION') {{'badge badge-pill badge-warning'}} @elseif ($reporte->estatus_supervisor == 'ACEPTADO') {{'badge badge-pill badge-success'}} @endif"> {{$reporte->estatus_supervisor}}</span></td>
    <td>{{ $reporte->respuestas->controlmanto->equipos->clave }}</td>
   <td><li style="white-space: initial"> {{ $reporte->respuestas->controlmanto->equipos->nombre_equipo }}</li></td>

   @if (empty($reporte->usuarios->name))
   <td><li style="white-space: initial"> Sin usuario asignado </li></td>
   @else
   <td><li style="white-space: initial"> {{ $reporte->usuarios->name }}</li></td>
   @endif



   @if (empty($reporte->emisores->name))
   <td><li style="white-space: initial"> Este reporte no a sido enviado por ningun visor </li></td>
   @else
   <td><li style="white-space: initial"> {{ $reporte->emisores->name }}</li></td>
   @endif

    <td>


        <div class="btn-group">
            {!! Form::open(['method' => 'DELETE', 'url' => '/reportes/' . $reporte->id, 'class' => 'form-eliminar']) !!}
            <button style="margin-left: 10px" type="submit"
                class="btn btn-danger btn-sm">
                <i class="fas fa-trash-alt"></i>
            </button>
            {!! Form::close() !!}
            &nbsp;
            &nbsp;










        </div>
    </td>











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
     <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="{{ asset('js/sweetalert.js') }}"></script>

@stop
