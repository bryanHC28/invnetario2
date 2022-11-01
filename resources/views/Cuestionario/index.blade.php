@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> </h1>
@stop

@section('content')
    <p> </p>




    <div class="container">
        <div class="row">
            <div class="col">
                <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                    <div class="p-3 mb-2 bg-primary bg-gradient fw-bold text-white">Check-list</div>
                    <div class="row g-3 needs-validation">



                        <div class="col-md-12">

                            {!! Form::label('categoria', 'Check-list existentes:') !!}
                            {!! Form::select('categoria', $checklist->pluck('nombre', 'id')->all(), null, [
                                'placeholder' => 'Seleccionar',
                                'class' => 'form-control',
                                'required',
                                'onclick' => 'filtro(document.getElementById("categoria").value);',
                                'onchange' => 'boton(document.getElementById("categoria").value);',
                            ]) !!}


                        </div>
                        <br>
                        <br>
                        <br>
                        <br>



                        <div class="col-md-6">



                            <button id="centrar" type="button" class="btn btn-success fw-bold" data-bs-toggle="modal"
                                data-bs-target="#myModal">Crear Check list</button>

                        </div>
                        <div class="col-md-6">






                            <button id="centrar" type="button" class="btn btn-warning fw-bold" data-bs-toggle="modal"
                                data-bs-target="#myModal2">Nueva Pregunta</button>

                        </div>
                    </div>





                </div>













                <div class="container mt-5">

                    <div class="modal" id="myModal2">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Crear pregunta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">



                                    {!! Form::open([
                                        'url' => '/preguntas',
                                        'style' => 'color:black;',
                                        'id' => 'main-contact-form',
                                        'class' => 'contact-form',
                                        'name' => 'contact-form',
                                    ]) !!}
                                    <div class="mb-3">


                                        {!! Form::label('nombre_pregunta', 'Nombre de la pregunta:') !!}
                                        {!! Form::text('nombre_pregunta', null, [
                                            'placeholder' => 'Ingresa nombre ',
                                            'class' => 'form-control',
                                            'required',
                                            'onkeyup' => 'validaciones();',
                                        ]) !!}
                                    </div>
                                    <div class="mb-3">

                                        {!! Form::label('tipo_pregunta', 'Tipo de pregunta:') !!}
                                        {!! Form::select('tipo_pregunta', ['text' => 'Texto', 'number' => 'numerico', 'date' => 'fecha'], null, [
                                            'placeholder' => 'Seleccionar ...',
                                            'class' => 'form-control',
                                            'required',
                                            'onkeyup' => 'validaciones();',
                                        ]) !!}


                                    </div>
                                    <div class="mb-3">


                                        {!! Form::text('checklist', $id_checklist, [
                                            'placeholder' => 'Ingresa nombre ',
                                            'class' => 'form-control',
                                            'hidden',
                                            'required',
                                            'onkeyup' => 'validaciones();',
                                        ]) !!}

                                    </div>


                                    <div class="mb-3">

                                        {!! Form::label('status', 'Estatus:') !!}
                                        {!! Form::select('status', ['1' => 'Activo', '0' => 'Baja'], null, [
                                            'placeholder' => 'Seleccionar',
                                            'class' => 'form-control',
                                            'required',
                                            'onkeyup' => 'validaciones();',
                                        ]) !!}
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    {!! Form::submit('Guardar ', ['class' => 'btn btn-success']) !!}
                                    {!! Form::close() !!}

                                    <button data-bs-dismiss="modal" type="submit" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







                <div class="container mt-5">

                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Nuevo Check-list</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">


                                    {!! Form::open([
                                        'url' => '/checklist',
                                        'style' => 'color:black;',
                                        'id' => 'main-contact-form',
                                        'class' => 'contact-form',
                                        'name' => 'contact-form',
                                    ]) !!}
                                    <div class="mb-3">


                                        {!! Form::label('nombre', 'Nombre del check-list:') !!}
                                        {!! Form::text('nombre', null, [
                                            'placeholder' => 'Ingresa nombre ',
                                            'class' => 'form-control',
                                            'required',
                                            'onkeyup' => 'validaciones();',
                                        ]) !!}
                                    </div>

                                    <div class="mb-3">


                                        {!! Form::select('status', ['1' => 'Activo', '0' => 'Baja'], null, [
                                            'class' => 'form-control',
                                            'required',
                                            'hidden',
                                            'onkeyup' => 'validaciones();',
                                        ]) !!}
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    {!! Form::submit('Guardar ', ['class' => 'btn btn-success']) !!}
                                    {!! Form::close() !!}

                                    <button data-bs-dismiss="modal" type="submit" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-body">


                        <table id="example" class="table table-striped" style="width:100%">
                            <thead class="bg-danger">
                                <tr>
                                    <th>Checklist</th>
                                    <th>Descripcion</th>
                                    <th>Tipo pregunta</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pregunta as $preguntas)
                                    <tr>

                                        <td>{{ $preguntas->checklist->nombre }}</td>
                                        <td>{{ $preguntas->nombre_pregunta }}</td>
                                        <td>{{ $preguntas->tipo_pregunta }}</td>
                                        <td>
                                            <div class="btn-group">




                                                <a data-bs-toggle="modal" data-bs-target="#myModaledit{!! $preguntas->id !!}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-pencil-alt"></i>

                                                </a>












                                                {!! Form::open(['method' => 'DELETE', 'url' => '/preguntas/' . $preguntas->id, 'class' => 'form-eliminar']) !!}
                                                <button style="margin-left: 10px" type="submit"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                {!! Form::close() !!}




                                            </div>

                                        </td>


                                        <div class="container mt-5">

                                            <div class="modal" id="myModaledit{!! $preguntas->id !!}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar pregunta</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <form action="{{route('preguntas.update',$preguntas->id)}}" method="POST" id="editform">
                                                            @csrf  @method('PUT')


                                                            <div class="modal-body">



                                                                <div class="mb-3">



                                                                    {!! Form::label('nombre_pregunta', 'Nombre de la pregunta:') !!}
                                                                    {!! Form::text('nombre_pregunta', $preguntas->nombre_pregunta, [
                                                                        'placeholder' => 'Ingresa nombre ',
                                                                        'class' => 'form-control',
                                                                        'required',
                                                                        'onkeyup' => 'validaciones();',
                                                                    ]) !!}
                                                                </div>
                                                                <div class="mb-3">

                                                                    {!! Form::label('tipo_pregunta', 'Tipo de pregunta:') !!}
                                                                    {!! Form::select('tipo_pregunta', ['text' => 'Texto', 'number' => 'numerico', 'date' => 'fecha'], $preguntas->tipo_pregunta, [
                                                                        'placeholder' => 'Seleccionar ...',
                                                                        'class' => 'form-control',
                                                                        'required',
                                                                        'onkeyup' => 'validaciones();',
                                                                    ]) !!}


                                                                </div>
                                                                <div class="mb-3">



                                                                    {!! Form::text('check', $preguntas->id_checklist, [
                                                                        'placeholder' => 'Ingresa nombre ',
                                                                        'class' => 'form-control',
                                                                        'required',
                                                                        'hidden',
                                                                        'onkeyup' => 'validaciones();',
                                                                    ]) !!}


                                                                </div>


                                                                <div class="mb-3">

                                                                    {!! Form::label('status', 'Estatus:') !!}
                                                                    {!! Form::select('status', ['1' => 'Activo', '0' => 'Baja'], $preguntas->status, [
                                                                        'placeholder' => 'Seleccionar',
                                                                        'class' => 'form-control',
                                                                        'required',
                                                                        'disabled',
                                                                        'onkeyup' => 'validaciones();',
                                                                    ]) !!}
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">Guardar</button>

                                                                <button data-bs-dismiss="modal" type="submit"
                                                                    class="btn btn-danger">Cancel</button>
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
                                    <th>Checklist</th>
                                    <th>Descripcion</th>
                                    <th>Tipo pregunta</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>







                    </div>
                </div>

























                <div id="tabla">








                </div>








            @stop



            @section('css')



                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
                <link rel="stylesheet"
                    href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">

                <style type="text/css">
                    .flexbox {
                        text-align: center;

                    }


                    #centrar {

                        width: 400px;
                        height: 35px;
                        margin-left: auto;
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



            @stop


            @section('js')


                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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




                @if (session('eliminar') == 'ok')
                    <script>
                        Swal.fire(
                            'Eliminado!',
                            'Su registro ha sido eliminado con exito!',
                            'success'
                        )
                    </script>
                @endif


                @if (session('actualizar') == 'ok')
                    <script>
                        Swal.fire(
                            'Actualizado!',
                            'Su registro ha sido actualizado con exito!',
                            'success'
                        )
                    </script>
                @endif


                <script>
                    $('.form-eliminar').submit(function(e) {
                        e.preventDefault();


                        Swal.fire({
                            title: '¿Estas seguro de querer eliminar este registro?',
                            text: "¡No podrás revertir esto!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, borrar!',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.value) {


                                this.submit();
                                // Swal.fire(
                                //   'Deleted!',
                                //   'Your file has been deleted.',
                                //   'success'
                                // )
                            }
                        })

                    });
                </script>

                <script>
                    function filtro(categoria) {





                        if (categoria.length === 0) {


                        } else {
                            var asset = '{{ asset('') }}';
                            var ruta = asset + 'llenar_preguntas/' + categoria;

                            location.href = ruta


                            console.log(ruta);

                        }

                        // let boton = document.getElementById("centra")
                        // if(categoria==1){
                        //     boton.disabled=true;

                        // }else{
                        //     boton.disabled=false;

                        // }




                    }
                </script>





            @stop
