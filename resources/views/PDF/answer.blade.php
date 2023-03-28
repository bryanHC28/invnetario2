<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <style>
        .performance-facts {
  border: 1px solid black;
  margin: 30px;
  float: left;
  width: 90%;
  padding: 0.5rem;
  table {
    border-collapse: collapse;
  }
}

.performance-facts__title {
  font-weight: bold;
  font-size: 2rem;
  margin: 0 0 0.25rem 0;
}
.performance-facts__header {
  border-bottom: 10px solid black;
  padding: 0 0 0.25rem 0;
  margin: 0 0 0.5rem 0;
  p {
    margin: 0;
  }
}







        @page {
            @bottom-right {
                content: counter(page) " of " counter(pages);
            }
        }
        .box {


  width: 600px;
  word-wrap: break-word;
}
    </style>
</head>

<body>
    <div align="center">
    <img  src="{{ asset('img/pilot.jpg') }}"  width="450" height="90">
    </div>
    <br>
    <br>


    @foreach ($info as $data )

    <header class="performance-facts__header">
        <h1 class="performance-facts__title">REPORTE-PILOT</h1>
        <p>Equipo: {{$data->controlmanto->equipos->nombre_equipo}}
        <p>Clave: {{$data->controlmanto->equipos->clave}}</p>
        <p>Area: {{$data->controlmanto->equipos->area->nombre}}</p>
        <p>Categoria: {{$data->controlmanto->equipos->categorias->nombre}}</p>
        <u style="color: red">Contesto: {{$data->usuario->name}}</u>
      </header>
      @endforeach


<br>
<br>
<br>

    <div   >

        <table class="table table-bordered table-condensed">
            <tbody>

@php
    $j=1
@endphp

                @for ($i=0;$i<$limite;$i++)
                <tr>
                    <td>
                        <h6>
                            <strong style="color: rgb(151, 5, 5)">{{$j++}}.- {{$LABEL[$i]}}</strong>
                        </h6>
                        <div class="box"> {{$JSON[$i]}}</div>
                        @if (empty($COMENTARIO[$i]))

                        <div style="color: rgb(20, 4, 92)" class="box">SIN COMENTARIOS.... </div>


                     @else
                     <div style="color: rgb(20, 4, 92)" class="box">COMENTARIO: {{$COMENTARIO[$i]}}</div>



                        @endif

                    </td>
                </tr>
                @endfor



            </tbody>
        </table>
        <hr/>


        <hr/>


        <table class="table table-bordered table-condensed">
            <tbody>
                <tr>
                    <td>
                        <h6>
                            <div align="center">
                            <h2>EVIDENCIAS</h2>

                              </div>
                        </h6>

                        @for ($i=0;$i<$limite_foto;$i++)

    <div align="center">
        <b style="color:rgb(151, 5, 5)">{{$preguntas_foto[$i]}}</b>
        <br>
                        <img class="imagen" width="500" height="200" src="{{ asset($PICTURE[$i]) }}">

    </div>
                        @endfor


                    </td>
                </tr>

            </tbody>
        </table>
        <br>
        <br>


  <hr style="border-color:red;">

  <h3 style="text-align: center" class="small-info">--FIRMA DE CONFORMIDAD--</h3>
  <br>

  <br>
  <br>


  <h3 style="text-align: center">_____________________________________</h3>

  <br>
  <br>




    </div>
</body>

</html>
