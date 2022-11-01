
<div class="card">
    <div class="card-body">


<table id="example" class="table table-striped" style="font-size:14px">
    <thead class="bg-primary">
        <tr>
            <th>Check-list</th>
            <th>Descripcion</th>
            <th>Tipo pregunta</th>
            <th>Acciones</th>


        </tr>
    </thead>
    <tbody>
        @foreach($pregunta as $preguntas)
        <tr>



            <td>{{$preguntas->checklist->nombre}}</td>
            <td>{{$preguntas->nombre_pregunta}}</td>
            <td>{{$preguntas->tipo_pregunta}}</td>
            <td>
                <div class="btn-group">



                            <a class="btn btn-warning btn-sm" >
                                <i class="fas fa-pencil-alt"></i>
                            </a>





                            {!! Form::open(['method' =>'DELETE','url'=>
                            '/preguntas/'.$preguntas->id])!!}
                                <button style="margin-left: 10px" type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            {!! Form::close() !!}




                </div>
            </td>


        </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Check-list</th>
                <th>Descripcion</th>
                <th>Tipo pregunta</th>
                <th>Acciones</th>

            </tr>
        </tfoot>
    </table>



</div>
</div>


