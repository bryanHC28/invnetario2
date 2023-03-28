<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Checklist</title>

    <!-- Icons font CSS-->
    <link type="text/css" rel="stylesheet" href="{{ asset ('css/lightgallery.css') }}" />
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <style>


.lg-actions .lg-prev:after{

display: none;
}

.lg-actions .lg-next:before{

    display: none;
}

span{
    display: none;
}


.lg-toolbar .lg-close:after{

    content: '✕'
}

.lg-toolbar .lg-download:after{
    content: '⇓'

}
        div.container {
width: 96%;
max-width: 960px;
margin: 0 auto;
}
img.imagen {
width: 100%;
height: auto;
}
         .textinput {
            float: left;
            width: 100%;
            min-height: 135px;
            outline: none;
            resize: none;
            border: 1px solid grey;
        }


.container {
            max-width: 820px;
            margin: 0px auto;
            margin-top: 50px;
        }

        .comment {
            float: left;
            width: 100%;
            height: auto;
        }

input.text {
    background: rgb(217, 241, 213);
   border: 1px solid #026c22;
   color: #393939;
   font-size:11px;
}
        .without_ampm::-webkit-datetime-edit-ampm-field {
            display: none;
        }

        input[type=time]::-webkit-clear-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            -o-appearance: none;
            -ms-appearance: none;
            appearance: none;
            margin: -10px;
        }

        .image-upload>input {
            display: none;

        }

        .image-upload img {
            width: 100px;
            height: 100px;
            cursor: pointer;
        }





        .brand-logo {
            max-height: 100px;
            top: 40px;
            right: 40px;
        }
    </style>
    <!-- Font special for pages-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('vendor/css/main.css') }}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">


                        <img align="right" class="brand-logo" src="{{ asset('img/sumapp.png') }}" alt="SuMapp">
                        <br>
                        <br>
                        <h2 class="title">RESPUESTAS</h2>


                        @foreach ($info as $datas )

                        <hr style="border-color:red;">
                        <br>
                        <br>

                        <input hidden  id="id_checklist" name="id_checklist" value="{{ $datas->id_checklist }}"
                            readonly="readonly" class="input--style-4" type="text" name="first_name">
                        <input hidden  id="id_subchecklist" name="id_subchecklist" value="{{ $datas->id_subchecklist }}"
                            readonly="readonly" class="input--style-4" type="text" name="first_name">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">CLAVE:</label>
                                    <input id="clave" name="clave" value="{{ $datas->controlmanto->equipos->clave }}" readonly="readonly"
                                        class="input--style-4" type="text" name="first_name">
                                </div>


                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">CATEGORIA:</label>
                                    <input id="categoria" name="categoria" value="{{$datas->controlmanto->equipos->categorias->nombre}}"
                                        readonly="readonly" class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>


                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Area:</label>
                                    <input id="area" name="area" value="{{ $datas->controlmanto->equipos->area->nombre }}"
                                        readonly="readonly" class="input--style-4" type="text" name="first_name">
                                </div>


                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Equipo:</label>
                                    <input id="equipo" name="equipo" value="{{ $datas->controlmanto->equipos->nombre_equipo }}"
                                        readonly="readonly" class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>


                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Responzable:</label>
                                    <input id="area" name="area" value="{{ $datas->usuario->name }}"
                                        readonly="readonly" class="input--style-4" type="text" name="first_name">
                                </div>


                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Fecha:</label>
                                    <input id="equipo" name="equipo" value="{{ $datas->created_at }}"
                                        readonly="readonly" class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>


                        </div>

                        <br>
                        <br>
                        @endforeach
                        <hr style="border-color:red;">
                        <br>
                        <br>








                        <form action="{{route('respuestas.update',$id)}}" method="POST" id="editform">
                            @csrf  @method('PUT')

                            <input type="number" hidden name="limite" value="{{$limite}}">
                       @for ($i=0;$i<$limite;$i++)

                       <label class="label"> {{$LABEL[$i]}} </label>

                       <input name="nodo[]" type="text" hidden value="{{$LABEL[$i]}}">

                       <input name="respuesta[]" value="{{$JSON[$i]}}"  class="input--style-4 without_ampm" type="text">
                       <br>
                       <br>
                       @if (empty($COMENTARIO[$i]))

                       <input class="input--style-4 text"  name="comentarios[]" placeholder="[SIN COMENTARIOS]"   type="text">


                    @else

                       <input  class="input--style-4 text" name="comentarios[]" value="{{$COMENTARIO[$i]}}" type="text">


                       @endif
                        <br>
                        <br>




                        @endfor

                        <br>
                        <h4>OBSERVACIONES</h4>
                        @foreach ($info as $datas )
                        <div class="container">
                            <div class="comment">
                                <textarea name="textarea" class="textinput" >{{$datas->observaciones}}</textarea>
                            </div>
                        </div>
                        @endforeach


                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>


                        @if (auth()->user()->tipo_cuenta==='Administrador' )


                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Guardar</button>
                        </div>
                    </form>

                    @endif
                        <br>
                        <br>
                        <hr style="border-color:red;">
                        <br>
                        <br>


                        <h2 style="text-align: center" class="title">FOTOS</h2>






                        <div id="lightgallery">
                        @for ($i=0;$i<$limite_foto;$i++)

                        <label id="as" class="label"> {{$preguntas_foto[$i]}} </label>


                            <a href="{{ asset($PICTURE[$i]) }}">
                                <img class="imagen" width="500" height="200" src="{{ asset($PICTURE[$i]) }}">
                            </a>

                        @endfor
                    </div>



{{--
                        <label class="label">LIMPIAR Y LUBRICAR LOS BASTAGOS </label>
                        <input value="{{$respuestas->LIMPIARYLUBRICARLOSBASTAGOS}}" readonly class="input--style-4 without_ampm" type="text">
                        <br>
                        <br>

                        <label class="label">REVISAR QUE CUENTEN CON MANERAL Y EN BUEN ESTADO </label>
                        <input value="{{$respuestas->REVISARQUECUENTENCONMANERALYENBUENESTADO}}" readonly class="input--style-4 without_ampm" type="text">
                        <br>
                        <br>

                        <label class="label">REVISAR QUE TENGAN PLACA DE IDENTIFICACION </label>
                        <input value="{{$respuestas->REVISARQUETENGANPLACADEIDENTIFICACION}}" readonly class="input--style-4 without_ampm" type="text">
                        <br>
                        <br>

                        <label class="label">CHECAR CADA UNA DE LAS VALVULAS QUE CONFORMAN EL EQUIPO </label>
                        <input value="{{$respuestas->CHECARCADAUNADELASVALVULASQUECONFORMANELEQUIPO}}" readonly class="input--style-4 without_ampm" type="text">
                        <br>
                        <br>

                        <label class="label">REVISION DE VALVULA DE SEGURIDAD TANTO EN CUERPO COMO CHAQUETA</label>
                        <input value="{{$respuestas->REVISIONDEVALVULADESEGURIDADTANTOENCUERPOCOMOCHAQUETA}}" readonly class="input--style-4 without_ampm" type="text">
                        <br>
                        <br>
                        <label class="label">REVISION DE DISCOS DE RUPTURA CUANDO APLIQUE</label>
                        <input value="{{$respuestas->REVISIONDEDISCOSDERUPTURACUANDOAPLIQUE}}" readonly class="input--style-4 without_ampm" type="text">
                        <br>
                        <br>

                        <label class="label">REALIZAR PURGA Y LIMPIEZA GENERAL DEL SISTEMA DEL TERMOSIFON</label>
                        <input value="{{$respuestas->REALIZARPURGAYLIMPIEZAGENERALDELSISTEMADELTERMOSIFON}}" readonly class="input--style-4 without_ampm" type="text">
                        <br>
                        <br>
                        <label class="label">VERIFICAR QUE NO EXISTAN FUGAS EN EL SELLO MECANICO DEL AGITADOR</label>
                        <input value="{{$respuestas->VERIFICARQUENOEXISTANFUGASENELSELLOMECANICODELAGITADOR}}" readonly class="input--style-4 without_ampm" type="text">
                        <br>
                        <br>
                        <label class="label">VERIFICAR QUE LA PINTURA SE ENCUENTRE EN BUENESTADO SI APLICA</label>
                        <input value="{{$respuestas->VERIFICARQUELAPINTURASEENCUENTREENBUENESTADOSIAPLICA}}" readonly class="input--style-4 without_ampm" type="text">
                        <br>
                        <br>

                        <label class="label">VERIFICAR QUE EL AISLAMIENTO TERMICO SE ENCUENTE EN BUEN ESTADO SI APLICA</label>
                        <input value="{{$respuestas->VERIFICARQUEELAISLAMIENTOTERMICOSEENCUENTEENBUENESTADOSIAPLICA}}" readonly class="input--style-4 without_ampm" type="text">
                        <br>
                        <br>

                        <label class="label">REVISAR QUE EL EQUIPO SE ENCUETRE IDENTIFICADO</label>
                        <input value="{{$respuestas->REVISARQUEELEQUIPOSEENCUETREIDENTIFICADO}}" readonly class="input--style-4 without_ampm" type="text">
                        <br>
                        <br>
                        <label class="label">foto</label>
                        <input value="{{$respuestas->foto}}" readonly class="input--style-4 without_ampm" type="text">

                        <img src="{{ asset('/storage/imagenes/JhbeDXL0ysLODAduWjgFSfwIyjr50Jgg6BYVovFr.png') }}">
                        <br>
                        <br>






 --}}




    <!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('vendor/js/global.js') }}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->



<script>
    //----------------------------------------- PREGUNTA_1 -----------------------------------------



    var emailInput1 = document.getElementById('1');
    document.getElementById('Pregunta1').addEventListener('click', function(e) {
        emailInput1.style.display = 'none';
    });
    document.getElementById('Pregunta2').addEventListener('click', function(e) {
        emailInput1.style.display = 'inline';
    });


    var emailInput2 = document.getElementById('2');
    document.getElementById('Pregunta3').addEventListener('click', function(e) {
        emailInput2.style.display = 'none';
    });
    document.getElementById('Pregunta4').addEventListener('click', function(e) {
        emailInput2.style.display = 'inline';
    });



    var emailInput3 = document.getElementById('3');
    document.getElementById('Pregunta5').addEventListener('click', function(e) {
        emailInput3.style.display = 'none';
    });
    document.getElementById('Pregunta6').addEventListener('click', function(e) {
        emailInput3.style.display = 'inline';
    });
    var emailInput4 = document.getElementById('4');
    document.getElementById('Pregunta7').addEventListener('click', function(e) {
        emailInput4.style.display = 'none';
    });
    document.getElementById('Pregunta8').addEventListener('click', function(e) {
        emailInput4.style.display = 'inline';
    });
    var emailInput5 = document.getElementById('5');
    document.getElementById('Pregunta9').addEventListener('click', function(e) {
        emailInput5.style.display = 'none';
    });
    document.getElementById('Pregunta10').addEventListener('click', function(e) {
        emailInput5.style.display = 'inline';
    });

    var emailInput6 = document.getElementById('6');
    document.getElementById('Pregunta11').addEventListener('click', function(e) {
        emailInput6.style.display = 'none';
    });
    document.getElementById('Pregunta12').addEventListener('click', function(e) {
        emailInput6.style.display = 'inline';
    });

    var emailInput7 = document.getElementById('7');
    document.getElementById('Pregunta13').addEventListener('click', function(e) {
        emailInput7.style.display = 'none';
    });
    document.getElementById('Pregunta14').addEventListener('click', function(e) {
        emailInput7.style.display = 'inline';
    });
    var emailInput8 = document.getElementById('8');
    document.getElementById('Pregunta13').addEventListener('click', function(e) {
        emailInput8.style.display = 'none';
    });
    document.getElementById('Pregunta14').addEventListener('click', function(e) {
        emailInput8.style.display = 'inline';
    });



</script>
<script src="{{ asset('js/lightgallery.min.js') }}"></script>
<script type="text/javascript">
    lightGallery(document.getElementById('lightgallery'));
</script>

</html>
<!-- end document-->
