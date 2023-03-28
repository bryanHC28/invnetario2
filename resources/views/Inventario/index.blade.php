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

                    <form  onsubmit="Loader.show()" class=" flexbox"@if (auth()->user()->id_sucursal==1)action="{{route('tabla.store')}}" @elseif (auth()->user()->id_sucursal==2)action="{{route('excel_monalisa')}}"@endif method="POST" enctype="multipart/form-data">
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

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">

            <div class="form-group two-fields">
                <label for="">Filtros</label>
                <div class="input-group">
                    <div class="input-group-prepend ">
                        <div class="input-group-text bg-primary"><i class="fa fa-hourglass-start"
                                aria-hidden="true"></i>&nbsp;Areas</div>
                    </div>


                    {!! Form::select('categoriaS', $combo_areas->pluck('nombre', 'nombre')->all(), null, [
                        'placeholder' => 'Todos',
                        'class' => 'form-control filter-select',
                        'data-column' => 4,
                        'required',
                        'onkeyup' => 'validaciones();',
                    ]) !!}

&nbsp;
&nbsp;

            <div class="input-group-prepend">
                <div class="input-group-text bg-info"><i class="fa fa-cube"
                        aria-hidden="true"></i>&nbsp;Categoria</div>
            </div>
            {!! Form::select('categoriaS', $combo_categorias->pluck('nombre', 'nombre')->all(), null, [
                'placeholder' => 'Todos',
                'class' => 'form-control filter-select',
                'data-column' => 3,
                'required',
                'onkeyup' => 'validaciones();',
            ]) !!}
        </div>
    </div>
</div>
</div>
</div>















<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">


        </div>
    </div>
</div>
<br>


<div class="card">
    <div class="card-body">





<table id="example" class="table table-striped display responsive nowrap" style="font-size:14px">



    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#compromisos">
    <span class="button__text">Movimientos</span>

    </a>




    <thead style="background-color: #759ECA">
        <tr>
            <th style="color:#ffffff">Clave</th>
            <th style="color:#ffffff">Equipo</th>
            <th style="color:#ffffff">Modelo</th>
            <th style="color:#ffffff">Categoria</th>
            <th style="color:#ffffff">Area</th>
            <th style="color:#ffffff">Stock</th>
            <th style="color:#ffffff">Agregar</th>

        </tr>
    </thead>
    <tbody>
        @foreach($inventarios as $inventario)

        <tr>

@if (empty($inventario->equipos->clave))
<td > <span class="badge badge-pill badge-danger">Sin clave</span></td>
@else
<td>{{$inventario->equipos->clave}}</td>
@endif

<td><li style="white-space: initial"> {{$inventario->equipos->nombre_equipo}}</li></td>

            @if (empty($inventario->equipos->modelo))
            <td><span class="badge badge-pill badge-danger">Sin modelo</span></td>
            @else
            <td>{{$inventario->equipos->modelo}}</td>
            @endif

            <td>{{$inventario->equipos->categorias->nombre}}</td>
            <td>{{$inventario->equipos->area->nombre}}</td>
            <td><span class="badge badge-pill badge-success">{{$inventario->stock}}</span></td>


            <td>

                <div class="btn-group">



                            <a class="button button2" data-bs-toggle="modal"
                            data-bs-target="#myModalinventiario{!! $inventario->id_equipo !!}">
                                <i class="fas fa-plus"></i>
                            </a>




                            <a class="button button3" onclick="query({!! $inventario->id_equipo !!} )"  >
                                <i class="far fa-eye"></i>
                            </a>







                </div>
            </td>

            <div id="boxLoading"></div>


            <div class="container mt-5">

                <div class="modal" id="myModalinventiario{!! $inventario->id_equipo !!}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Incrementar inventario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form onsubmit="Loader.show()" action="{{ route('inventario.update', $inventario->id) }}" method="POST" id="editform">
                                @csrf @method('PUT')


                            <div class="modal-body">
                                <div class="container-fluid">

                                    <div class="row">


                                       <div class="form-group col-md-12">
                                        <label for="nombre">Usuario conectado</label>
                                        <i class="fas fa-user"></i> <input  value={{auth()->user()->name}} type="text" class="form-control" readonly>
                                      </div>

                                      <div class="form-group col-md-4">
                                        <label for="nombre">Id equipo</label>
                                        <input name="id_equipo"  value="{{$inventario->id_equipo}}" type="text" class="form-control" readonly>
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="nombre">Clave</label>
                                        <input value="{{$inventario->equipos->clave}}" type="text" class="form-control" readonly>
                                      </div>

                                      <div class="form-group col-md-4">
                                        <label for="observaciones">Categoria</label>
                                        <input value="{{$inventario->equipos->categorias->nombre}}" type="text" class="form-control" readonly>
                                      </div>


                                    </div>
                                    <div class="row">
                                      <div class="form-group col-md-6">
                                        <label for="observaciones">Modelo</label>
                                        <input value="{{$inventario->equipos->modelo}}" type="text" class="form-control" readonly>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="descripcion">Equipo</label>
                                        <input value="{{$inventario->equipos->nombre_equipo}}" type="text" class="form-control" readonly>
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="nombre">Fecha de ingreso</label>
                                        <input type="date" name="fecha_ingreso"  class="form-control" >
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="nombre">Fecha de vencimiento</label>
                                        <input type="date" name="fecha_vencimiento" class="form-control" >
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="observaciones">Costo</label>
                                        <input type="number" name="costo_unitario" class="form-control">
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="cantidad">Cantidad a incrementar:</label>
                                        <input name="cantidad" min="1" type="number" class="form-control">
                                      </div>


                                </div>
                              </div>









                                <div class="modal-footer">
                                    <button  id="navegar"  type="submit"
                                        class="btn btn-primary">Agregar <i class="fa fa-save"
                                        style="color: rgb(255, 255, 255)"></i> </button>

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

    <br>
    <br>
    <br>
    <div id="campos">


    </div>
</div>
</div>



<div class="modal fade" id="compromisos" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Movimientos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example2" class="display nowrap table-responsive">
                    <thead>
                      <tr>
                          <th>Equipo</th>
                          <th>Modelo</th>
                          <th>Realizo</th>
                          <th>Cantidad</th>
                          <th>Fecha</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach($entradas as $entrada)

                        <tr>
                            <td>
                                <li style="white-space: initial"> {{$entrada->inventario->equipos->nombre_equipo}}</li>
                                </td>
                                <td>
                                    <li style="white-space: initial"> {{$entrada->inventario->equipos->modelo}}</li>
                                    </td>
                                <td>
                                    <li style="white-space: initial"> {{$entrada->usuario->name}}</li>
                                    </td>
                                    <td> <span class="badge badge-pill badge-success"> {{$entrada->cantidad}} </span>     </td>
                                    <td> {{ substr($entrada->created_at, 0, 10) }}</td>



                        </tr>
                        @endforeach
                        @foreach($salidas as $salida)

                        <tr>

                            <td>
                                <li style="white-space: initial"> {{$salida->inventario->equipos->nombre_equipo}}</li>
                                </td>
                                <td>
                                    <li style="white-space: initial"> {{$salida->inventario->equipos->modelo}}</li>
                                    </td>
                                <td>
                                    <li style="white-space: initial"> {{$salida->usuario->name}}</li>
                                    </td>
                                    <td > <span class="badge badge-pill badge-danger"> {{$salida->cantidad}} </span></td>
                                    <td> {{ substr($salida->created_at, 0, 10) }}</td>


                        </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>







@stop
@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/inventario.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
@stop


@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.4/howler.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('js/paginaciondatatable.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('js/tooltip.js') }}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
<script src="{{ asset('js/loader.js') }}"></script>


@if (session('incrementar') == 'ok')
<script>
    Swal.fire(
        'Actualizado!',
        'El inventario ha sido incrementado con exito!',
        'success'
    )
    let sound = new Howl({
              src: ["{{ asset('audio/success.mp4') }}"],
              volume: 1.0
            });

            sound.play()
</script>
@endif

@if (session('decrementar') == 'ok')
<script>
    Swal.fire(
        'Actualizado!',
        'El inventario ha sido decrementado con exito!',
        'success'
    )
    let sound = new Howl({
              src: ["{{ asset('audio/success.mp4') }}"],
              volume: 1.0
            });

            sound.play()
</script>
@endif


<script>



$(document).ready(function(){
    var table= $('#example2').DataTable({
     autoWidth:false,


     "language": {
             "lengthMenu": "Mostrar _MENU_ registros  ",
             "zeroRecords": "Sin registros  - disculpa",
             "info": "Mostrando la pagina _PAGE_ de _PAGES_",
             "infoEmpty": "No records available",
             "infoFiltered": "(filtrado de _MAX_ registros totales)",
             'search': "Buscar",
             'paginate':{
                 'next':'Siguiente',
                 'previous':'Anterior'

             }

         }
     });




});






</script>
<script>
    function query(ch) {
        var asset = '{{ asset('') }}';
        var ruta = asset + 'longevidad/' + ch;

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

@stop
