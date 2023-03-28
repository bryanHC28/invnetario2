<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subchecklist</title>



</head>

<body>







            <table id="examples" class="table table-striped display responsive nowrap" style="width:100%">
                <thead class="bg-gra-02">
                    <tr>
                        <th style="color:#ffffff">Categoria</th>
                        <th style="color:#ffffff">Nombre checklist</th>
                        <th style="color:#ffffff">Status</th>
                        <th style="color:#ffffff">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($subchecklist as $subchecklists)
                        <tr>
                            <td>
                                <li style="white-space: initial"> {{ $subchecklists->categoriack->nombre }}</li>
                                 </td>
                            <td>
                                <li style="white-space: initial"> {{ $subchecklists->nombre }} </li>

                            </td>
                            <td><span class="badge badge-pill badge-success">Activo</span> </td>
                            <td>
                                <div class="btn-group">


                                    <a onclick="Loader.show()" data-bs-toggle="mensaje" title="Ver preguntas"
                                    href="{{ route('preguntassck', ['subck' => $subchecklists->id,'cateck' => $subchecklists->id_categoriachecklist]) }}"
                                        class="btn btn-sm" style="background-color: #63b782">
                                        <i data-bs-toggle="mensaje" title="Ver preguntas " class="fas fa-question"></i>
                                    </a>





                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => '/subchecklist/' . $subchecklists->id,
                                        'class' => 'form-eliminar'

                                    ]) !!}
                                    <button data-bs-toggle="mensaje" title="Eliminar cuestionario " style="margin-left: 10px" type="submit" class="btn btn-danger btn-sm">
                                        <i data-bs-toggle="mensaje" title="Eliminar cuestionario " class="fas fa-trash-alt"></i>
                                    </button>
                                    {!! Form::close() !!}



                                </div>


                            </td>





                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th style="color:#ffffff">Categoria</th>
                        <th style="color:#ffffff">Checklist</th>
                        <th style="color:#ffffff">Status</th>
                        <th style="color:#ffffff">Acciones</th>

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
