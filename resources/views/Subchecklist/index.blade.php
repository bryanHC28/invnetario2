@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> </h1>
@stop

@section('content')


<div class="card">
    <div class="card-body">




        <table id="example" class="table table-striped" style="width:100%">
            <button id="centrar" type="button" class="btn btn-success fw-bold" data-bs-toggle="modal"
            data-bs-target="#myModal">Crear Check list</button>
<br>
<br>



            <thead class="bg-danger">


                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Status</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($pregunta as $preguntas)

                    <tr>

                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>






                    </tr>

            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>


    </div>
</div>




@stop

@section('css')


<style type="text/css">
    .flexbox {
        text-align: center;

    }


    #centrar {

        width: 400px;
        height: 35px;
        margin-left: 315px;
        margin-right: auto;
    }


    .modal-header {
        background: #000000;
        color: #fff;
    }

    .required:after {
        content: "*";
        color: red;
    }
</style>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet"
href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $('#example').DataTable({
        responsive: true,
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
</script>

@stop
