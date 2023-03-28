
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
    <thead style="background-color:">
        <tr>
            <th style="color:#000000">Sucursal</th>
            <th style="color:#000000">Categoria</th>
            <th style="color:#000000">Total $</th>
            <th style="color:#000000">Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($total_categorias as $categorias)
        <tr>
            <td>{{$categorias->nombre_sucursal}}</td>
            <td>{{$categorias->nombre}}</td>
            <td>{{"$".number_format($categorias->Total, 2)}}</td>
            <td>

                <a href="{{ route('pdf_areas_monalisa', ['id_area' => $categorias->id_categoriaequipos]) }}" style="padding: 3px 6px;" class="btn btn-danger"><i class="far fa-file-pdf"></i></a>
                &nbsp;

                {{-- <button style="padding: 3px 6px;" class="btn btn-success"><i class="fas fa-file-excel"></i></button> --}}
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

        </tr>
    </tfoot>
</table>

</div>
</div>

@stop



@section('css')

<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
<style>
    .dt-button {
  padding: 0;
  border: none;
}

</style>
@stop
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script>

 $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [

        {
        //Botón para Excel
        extend: 'copy',
        footer: true,
        title: 'Archivo',
        filename: 'Export_File',

        //Aquí es donde generas el botón personalizado
        text: '<button class="btn btn-dark"><i class="fas fa-copy"></i></button>'
      },

        {
        //Botón para Excel
        extend: 'excel',
        footer: true,
        title: 'Archivo',
        filename: 'Export_File',

        //Aquí es donde generas el botón personalizado
        text: '<button class="btn btn-success"><i class="fas fa-file-excel"></i></button>'
      },


        //Botón para PDF
        {
        extend: 'pdf',
        footer: true,
        title: 'Archivo PDF',
        filename: 'Export_File_pdf',
        text: '<button class="btn btn-danger"><i class="far fa-file-pdf"></i></button>'
      },
        //Botón para PDF
        {
        extend: 'print',
        footer: true,
        title: 'Archivo PDF',
        filename: 'Export_File_pdf',
        text: '<button class="btn btn-warning"><i class="fas fa-print"></i></button>'
      }








        ],
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



    } );
} );


</script>
@stop
