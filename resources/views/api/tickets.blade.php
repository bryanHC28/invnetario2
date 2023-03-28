@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1>Listado de Tickets</h1>
@stop

@section('content')
<br>


  <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="col text-center">
						<a href="https://tickets.sumapp.cloud/auth/login">
                           <button class="btn btn-primary"><i class="fas fa-receipt"
                                aria-hidden="true"></i>&nbsp;Ir a tickets</button></a>
                    </div>
                    <div class="form-group two-fields">
                        <label for="">Filtros</label>
                        <div class="input-group">

                            <div class="input-group-prepend ">
                                <div class="input-group-text bg-primary"><i class="fa fa-hourglass-start"
                                        aria-hidden="true"></i>&nbsp;Estado</div>
                            </div>
                            <select    class="form-control filter-select" data-column="4">
                                <option value="">Todos</option>
                               <option value="Abierto">Abierto</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Cerrado">Cerrado</option>
                                <option value="Cancelado">Cancelado</option>
                                <option value="Cierre final">Cierre final</option>
							 
                            </select>
							
				 
 
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fa fa-cube"
                                        aria-hidden="true"></i>&nbsp;Tipo</div>
                            </div>
                            <select  class="form-control filter-select" data-column="8">
                                <option value="">Todos</option>
                                <option value="Preventivo">Preventivo</option>
                                <option value="Correctivo">Correctivo</option>
                                <option value="Modificaciones">Modificaciones</option>
                                <option value="Rutinario">Rutinario</option>
                            </select>


  
                        </div>
                    </div>
                </div>
            </div>
        </div>

<br>



<div class="card">
    <div class="card-body">


<table id="example" class="table table-striped display responsive nowrap" style="font-size:14px">
    <thead class="bg-primary">
        <tr>
           <th style="color:#ffffff">Folio</th>
            <th style="color:#ffffff">Creación</th>
            <th style="color:#ffffff">Entrega a mantenimiento</th>
            <th style="color:#ffffff">Fecha cierre</th>
            <th style="color:#ffffff">Estado</th>
            <th style="color:#ffffff">Prioridad</th>
            <th style="color:#ffffff">Area</th>
            <th style="color:#ffffff">Categoria</th>
			<th style="color:#ffffff">Tipo ticket</th>
			<th style="color:#ffffff">Equipo</th>
			<th style="color:#ffffff">Usuario</th>
			<th style="color:#ffffff">Realizado por</th>
			<th style="color:#ffffff">Accion</th>
			<th style="color:#ffffff">Condicion</th>

        </tr>
    </thead>
    <tbody>

          @foreach($tcs as $tickets)
        <tr>



            <td>#{{$tickets['id']}}</td>
			<td>{{SUBSTR($tickets['created_at'], 0, 10) ?? 'Desconocido' }}</td>
			<td>{{SUBSTR($tickets['fecha_estimada'], 0, 10) ?? 'Desconocido' }}</td>
			<td>{{SUBSTR($tickets['close_at'], 0, 10) ?? 'Desconocido' }}</td>
		 
<td ><span
                                    class="@if ($tickets['estatus'] == 'Abierto') {{ 'badge badge-pill badge-primary' }} @elseif ($tickets['estatus'] == 'En proceso') {{ 'badge badge-pill badge-warning' }}@elseif ($tickets['estatus'] == 'Pausado')  {{ 'badge badge-pill badge-dark' }} @elseif ($tickets['estatus'] == 'Cancelado')  {{ 'badge badge-pill badge-dark' }}  @elseif ($tickets['estatus'] == 'Cerrado')  {{ 'badge badge-pill badge-success' }} @elseif ($tickets['estatus'] == 'Cierre final' || $tickets['estatus'] == 'Terminado')  {{ 'badge badge-pill badge-secondary' }} @endif">{{ $tickets['estatus']}}</span>
                            </td>
			
			  <td><span
                                    class="@if ($tickets['prioridad'] == 'Alta') {{ 'badge badge-pill badge-danger' }} @elseif ($tickets['prioridad'] == 'Media') {{ 'badge badge-pill badge-warning' }}@elseif ($tickets['prioridad'] == 'Baja')  {{ 'badge badge-pill badge-success' }} @endif">{{ $tickets['prioridad'] }}</span>
                            </td>
			
			
			
			<td>{{$tickets['area']}}</td>
            <td>{{$tickets['categoria']}}</td>
			 <td><span
                                        class="@if ($tickets['tipo_ticket'] == 'Preventivo') {{ 'badge badge-pill badge-info' }}@elseif($tickets['tipo_ticket'] == 'Correctivo'){{ 'badge badge-pill badge-danger' }}@elseif($tickets['tipo_ticket'] == 'Modificaciones'){{ 'badge badge-pill badge-dark' }} @endif">{{ $tickets['tipo_ticket'] ?? 'Ninguno' }}</span>
                                </td>
			<td>{{$tickets['inventario']}}</td>
            <td>{{$tickets['usuario']}}</td>
			
			 <td><span
                                        class="@if (empty($tickets['realizo'])) {{ 'badge badge-pill badge-danger' }} @else  {{ 'badge badge-pill badge-success' }} @endif">{{ $tickets['realizo'] ?? 'Sin registro' }}</span>


                                </td>
			<td></td>
			 <td >



                                            <span
                                                class="@if (empty($tickets['estado'])) {{ 'badge badge-pill badge-warning' }} @elseif ($tickets['estado'] == 'Aceptado') {{ 'badge badge-pill badge-success' }}@elseif ($tickets['estado'] == 'Rechazado')  {{ 'badge badge-pill badge-danger' }} @endif">
                                                @if (empty($tickets['estado']))
                                                    En revision @else{{ $tickets['estado'] }}
                                                @endif
                                            </span>



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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('js/paginaciondatatable.js') }}"></script>
<script src="{{ asset('js/tooltip.js') }}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('js/loader.js') }}"></script>

 

@stop
