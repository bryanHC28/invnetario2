<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Longevidad</title>



</head>

<body>





            <table id="examples" class="table table-striped display responsive nowrap" style="font-size:14px">
                <thead style="background-color: #759ECA">
                    <tr>
                        <th style="color:#ffffff">Equipo</th>
                        <th style="color:#ffffff">Modelo</th>
                        <th style="color:#ffffff">Fecha de ingreso</th>
                        <th style="color:#ffffff">Fecha de vencimiento</th>
                        <th style="color:#ffffff">Costo</th>
                        <th style="color:#ffffff">Tiempo de vida</th>
                        <th style="color:#ffffff">Eliminar</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($control_longevidad as $longevidad)
                        <tr>

                            @if (empty($longevidad->equipo->nombre_equipo))
                            <td><span class="badge badge-pill badge-danger">Sin datos</span></td>
                            @else
                            <td>{{$longevidad->equipo->nombre_equipo}}</td>
                            @endif

                            @if (empty($longevidad->equipo->modelo))
                            <td><span class="badge badge-pill badge-danger">Sin registro</span></td>
                            @else
                            <td>{{$longevidad->equipo->modelo}}</td>
                            @endif


                            @if (empty($longevidad->longevidad->fecha_ingreso))
                            <td><span class="badge badge-pill badge-danger">Sin fecha</span></td>
                            @else
                            <td>{{$longevidad->longevidad->fecha_ingreso}}</td>
                            @endif



                            @if (empty($longevidad->longevidad->fecha_vencimiento))
                            <td><span class="badge badge-pill badge-danger">Sin fecha</span></td>
                            @else
                            <td>{{$longevidad->longevidad->fecha_vencimiento}}</td>
                            @endif


                            @if (empty($longevidad->longevidad->costo_unitario))
                            <td><span class="badge badge-pill badge-danger">Costo no registrado</span></td>
                            @else
                            <td>{{"$".$longevidad->longevidad->costo_unitario}}</td>
                            @endif





                            @if (empty($longevidad->longevidad->fecha_vencimiento))
                            <td><span class="badge badge-pill badge-danger">Sin fecha</span></td>
                            @else
                            @php
                            $fechaActual=date('Y-m-d',$mod_date);
                            $fecha_prox = date('Y-m-d',strtotime($longevidad->longevidad->fecha_vencimiento) );
                            $fecha1 = date_create( $fechaActual);
                             $fecha2 = date_create( $fecha_prox);
                             $dias = date_diff($fecha1, $fecha2)->format('%R%a');
                                @endphp


                                <td><span class="@if($dias >= +0 && $dias <= +7) {{'badge badge-pill badge-danger'}} @elseif ($dias > +7 && $dias <= +30){{'badge badge-pill badge-warning'}}@elseif ($dias > +30 && $dias <= +182){{'badge badge-pill badge-primary'}}@elseif ($dias > +182 && $dias <= +365){{'badge badge-pill badge-success'}}@elseif ($dias > 365 ){{'badge badge-pill badge-info'}}@elseif ($dias < +0 ){{'badge badge-pill badge-dark'}}@endif">{{ $dias }} dias</span></td>
                            @endif






                            <td>

                                <a onclick="Loader.show();" id="navegar" data-bs-toggle="mensaje"
                                title="Visualizar respuestas de: "
                                href="{{ route('delete_longevidad', ['id' => $longevidad->id,'id_equipo'=>$longevidad->id_equipo]) }}"
                                style="background-color: #A42121" class="btn btn-sm" type="button">
                                <i style="color: rgb(255, 255, 255)" class="fas fa-trash-alt"> </i>
                            </a>




                            </td>




                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th style="color:#ffffff">Equipo</th>
                        <th style="color:#ffffff">Modelo</th>
                        <th style="color:#ffffff">Fecha de ingreso</th>
                        <th style="color:#ffffff">Fecha de vencimiento</th>
                        <th style="color:#ffffff">Costo</th>
                        <th style="color:#ffffff">Tiempo de vida</th>
                        <th style="color:#ffffff">Eliminar</th>

                    </tr>
                </tfoot>
            </table>



   <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/tooltip.js') }}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
<script src="{{ asset('js/loader.js') }}"></script>

@if (session('eliminar') == 'ok')
    <script>
        Swal.fire(
            'Eliminado!',
            'Su registro ha sido eliminado con exito!',
            'success'
        )


    </script>
@endif

<script>

    Swal.fire({
        title: 'CORRECTO!',
        text: 'Su consulta se encuentra en la parte posterior de la ventana',
        icon: 'success',
        imageWidth: 150,
        imageHeight: 150,
        imageAlt: 'Custom image',
    })

</script>

<script>
$(document).ready(function() {
    $('#examples').DataTable({
        autoWidth: false,


        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Sin registros  - disculpa",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search': "Buscar",
            'paginate': {
                'next': 'Siguiente',
                'previous': 'Anterior'

            }

        }
    });


});


</script>
</body>


</html>
