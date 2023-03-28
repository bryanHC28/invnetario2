






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
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
    <style>
        #header h1 { display:inline; }
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
   background: rgb(241, 229, 213);
   border: 1px solid #ff6f00;

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

                    <form action="{{ route('respuestas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('POST')

                        <img align="right" class="brand-logo" src="{{ asset('img/sumapp.png') }}" alt="SuMapp">
                        <br>
                        <br>
                        <h2 class="title"></h2>



                        <hr style="border-color:red;">
                        <br>
                        <br>

                        <input hidden name="id_controlmto" value="{{ $id_controlmto }}"
                        readonly="readonly" class="input--style-4" type="text" name="first_name">


                        @foreach ($informacion_principal as $informacion )



                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">CLAVE:</label>
                                    <input id="clave" name="clave" value="{{ $informacion->clave }}" readonly="readonly"
                                        class="input--style-4" type="text" name="first_name">
                                </div>


                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">CATEGORIA:</label>
                                    <input id="categoria" name="categoria" value="{{ $informacion->categorias->nombre }}"
                                        readonly="readonly" class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>


                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Area:</label>
                                    <input id="area" name="area" value="{{ $informacion->area->nombre }}"
                                        readonly="readonly" class="input--style-4" type="text" name="first_name">
                                </div>


                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Equipo:</label>
                                    <input id="equipo" name="equipo" value="{{ $informacion->nombre_equipo }}"
                                        readonly="readonly" class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>


                        </div>




                        <div class="input-group">
                            {{-- <label class="label">Subchecklist</label> --}}
                            <div class="rs-select2 js-select-simple select--no-search">
                                <input hidden class="input--style-4" type="text" name="phone">

                            </div>
                        </div>
                        <br>
                        <br>

                        <hr style="border-color:red;">
                        <br>
                        <br>

                        @endforeach

                        <h2 style="text-align: center" class="title">{{$checklist}}</h2>
                        @php
                            $i = 0;
                            $j = 1;
                            $k=0;
                        @endphp



                        @foreach ($preguntas as $pregunta)

                            @if ($pregunta->tipo_pregunta == 'date' ||
                                $pregunta->tipo_pregunta == 'text' ||
                                $pregunta->tipo_pregunta == 'number' ||
                                $pregunta->tipo_pregunta == 'time' ||
                                $pregunta->tipo_pregunta == 'radio' ||
                                $pregunta->tipo_pregunta == 'radio3' ||
                                $pregunta->tipo_pregunta == 'Celsius' ||
                                $pregunta->tipo_pregunta == 'Ohms' ||
                                $pregunta->tipo_pregunta == 'Hp' ||
                                $pregunta->tipo_pregunta == 'Rpm' ||
                                $pregunta->tipo_pregunta == 'Volts' ||
                                $pregunta->tipo_pregunta == 'Apm' ||
                                $pregunta->tipo_pregunta == 'radio2')
                                @php
                                    $i++;

                                @endphp
                            @endif


                            @if ( $pregunta->tipo_pregunta == 'radio2')
                                @php
                                    $k++;
                                @endphp
                            @endif
                            @if ($pregunta->tipo_pregunta == 'subtitulo')
                                <h4>
                                    <font color="blue"> {{ $pregunta->nombre_pregunta }}</font>
                                </h4>
                                <br>
                                <br>
                            @endif
                            @if ($pregunta->tipo_pregunta == 'nota')
                                <font color="red">{{ $pregunta->nombre_pregunta }}</font>
                                <br>
                                <br>
                            @endif


                            @if ($pregunta->tipo_pregunta == 'radio2')
                                <br>


                                <label class="label">{{$pregunta->orden_pregunta}}.- {{ $pregunta->nombre_pregunta }}</label>
                                <label class="radio-container m-r-45">SI CUMPLE
                                    <input required name="respuestas[{{$i}}]" id="Pregunta{{$j++}}" type="radio" value="Evidencia_SI CUMPLE">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">NO CUMPLE
                                    <input required name="respuestas[{{$i}}]" id="Pregunta{{$j++}}" type="radio" value="Evidencia_NO CUMPLE">
                                    <span class="checkmark"></span>
                                </label>

                                <label class="radio-container">NO APLICA
                                    <input required name="respuestas[{{$i}}]" id="Pregunta{{$j++}}" type="radio" value="NO APLICA">
                                    <span class="checkmark"></span>
                                </label>
                                <br>
                                <br>

                                <div hidden class="form no_mostrar" id="{{$k}}">
                                    <div class="image-upload">
                                        <label for="file-input">
                                            <input name="file{{$k}}" id="file-input" type="file" accept="image/*" capture="camera" />
                                        </label>



                                    </div>
                                </div>






                                <input hidden class="input--style-4 without_ampm" type="text"
                                name="preguntas[{{ $i }}]" value="{{ $pregunta->nombre_pregunta }}">

                                <input hidden class="input--style-4 without_ampm" type="text"
                                name="fotos[{{ $k }}]" value="{{ $pregunta->nombre_pregunta }}">


                                <input hidden  class="input--style-4 without_ampm" type="text"
                                name="limite_photos" value="{{ $k}}">

<br>
                                <input placeholder="[ SECCION DE COMENTARIOS PARA PREGUNTA: {{$i}} ]" type="text" name="comentarios[{{ $i }}]" class="input--style-4 text" />



                                <br>
                                <br>
                                <br>
                            @endif
                            @if ($pregunta->tipo_pregunta == 'separador')
                                <br>
                                <hr style="border-color:red;">
                                <br>
                            @endif

                            @if ($pregunta->tipo_pregunta == 'foto')
                                <br>


                                <div class="image-upload">

                                    <label class="label">{{ $pregunta->nombre_pregunta }}</label>
                                    <label for="file-input">
                                        <img src="{{ asset('img/camara.png') }}" alt="Click aquí para subir tu foto"
                                            title="Click aquí para subir tu foto">
                                    </label>

                                    <input id="file-input" type="file" accept="image/*" capture="camera" />

                                </div>




                                <br>
                                <br>
                            @endif



                            @if ($pregunta->tipo_pregunta == 'date' ||
                                $pregunta->tipo_pregunta == 'text' ||
                                $pregunta->tipo_pregunta == 'number' ||
                                $pregunta->tipo_pregunta == 'time')
                                <div class="input-group">
                                    <label class="label">{{$pregunta->orden_pregunta}}.- {{ $pregunta->nombre_pregunta }}</label>
                                    <input required class="input--style-4 without_ampm" type="{{ $pregunta->tipo_pregunta }}"
                                        name="respuestas[{{ $i }}]">

                                    <input hidden class="input--style-4 without_ampm" type="text"
                                        name="preguntas[{{ $i }}]"
                                        value="{{ $pregunta->nombre_pregunta }}">
                                </div>



<br>
<input placeholder="[ SECCION DE COMENTARIOS PARA PREGUNTA: {{$i}} ]" type="text" name="comentarios[{{ $i }}]" class="input--style-4 text" />



<br>
<br>
<br>
                            @endif


                            @if ($pregunta->tipo_pregunta == 'Celsius')
                            <div class="input-group">
                                <label class="label">{{$pregunta->orden_pregunta}}.- {{ $pregunta->nombre_pregunta }}</label>
                                <div id="header">
                                <input  style="width : 200px;" id="input1" required class="input--style-4 without_ampm" type="number"><h1>°C</h1>
                                </div>

                                <input    hidden class="input--style-4 without_ampm" type="text"
                                    name="preguntas[{{ $i }}]"
                                    value="{{ $pregunta->nombre_pregunta }}">

                                    <input hidden name="respuestas[{{ $i }}]" type="text" id="input2" />

                            </div>



<br>
<input placeholder="[ SECCION DE COMENTARIOS PARA PREGUNTA: {{$i}} ]" type="text" name="comentarios[{{ $i }}]" class="input--style-4 text" />



<br>
<br>
<br>
                        @endif


                        @if ($pregunta->tipo_pregunta == 'Ohms')
                        <div class="input-group">
                            <label class="label">{{$pregunta->orden_pregunta}}.- {{ $pregunta->nombre_pregunta }}</label>
                            <div id="header">
                            <input  style="width : 200px;" id="input3" required class="input--style-4 without_ampm" type="number"><h1>Ω</h1>
                            </div>

                            <input    hidden class="input--style-4 without_ampm" type="text"
                                name="preguntas[{{ $i }}]"
                                value="{{ $pregunta->nombre_pregunta }}">

                                <input hidden name="respuestas[{{ $i }}]" type="text" id="input4" />

                        </div>



<br>
<input placeholder="[ SECCION DE COMENTARIOS PARA PREGUNTA: {{$i}} ]" type="text" name="comentarios[{{ $i }}]" class="input--style-4 text" />



<br>
<br>
<br>
                    @endif



                    @if ($pregunta->tipo_pregunta == 'Hp')
                    <div class="input-group">
                        <label class="label">{{$pregunta->orden_pregunta}}.- {{ $pregunta->nombre_pregunta }}</label>
                        <div id="header">
                        <input  style="width : 200px;" id="input5" required class="input--style-4 without_ampm" type="number"><h1>Hp</h1>
                        </div>

                        <input    hidden class="input--style-4 without_ampm" type="text"
                            name="preguntas[{{ $i }}]"
                            value="{{ $pregunta->nombre_pregunta }}">

                            <input hidden name="respuestas[{{ $i }}]" type="text" id="input6" />

                    </div>



<br>
<input placeholder="[ SECCION DE COMENTARIOS PARA PREGUNTA: {{$i}} ]" type="text" name="comentarios[{{ $i }}]" class="input--style-4 text" />



<br>
<br>
<br>
                @endif



                @if ($pregunta->tipo_pregunta == 'Rpm')
                <div class="input-group">
                    <label class="label">{{$pregunta->orden_pregunta}}.- {{ $pregunta->nombre_pregunta }}</label>
                    <div id="header">
                    <input  style="width : 200px;" id="input7" required class="input--style-4 without_ampm" type="number"><h1>RPM</h1>
                    </div>

                    <input    hidden class="input--style-4 without_ampm" type="text"
                        name="preguntas[{{ $i }}]"
                        value="{{ $pregunta->nombre_pregunta }}">

                        <input hidden name="respuestas[{{ $i }}]" type="text" id="input8" />

                </div>



<br>
<input placeholder="[ SECCION DE COMENTARIOS PARA PREGUNTA: {{$i}} ]" type="text" name="comentarios[{{ $i }}]" class="input--style-4 text" />



<br>
<br>
<br>
            @endif
            @if ($pregunta->tipo_pregunta == 'Volts')
            <div class="input-group">
                <label class="label">{{$pregunta->orden_pregunta}}.- {{ $pregunta->nombre_pregunta }}</label>
                <div id="header">
                <input  style="width : 200px;" id="input9" required class="input--style-4 without_ampm" type="number"><h1>Volts</h1>
                </div>

                <input    hidden class="input--style-4 without_ampm" type="text"
                    name="preguntas[{{ $i }}]"
                    value="{{ $pregunta->nombre_pregunta }}">

                    <input hidden name="respuestas[{{ $i }}]" type="text" id="input10" />

            </div>



<br>
<input placeholder="[ SECCION DE COMENTARIOS PARA PREGUNTA: {{$i}} ]" type="text" name="comentarios[{{ $i }}]" class="input--style-4 text" />



<br>
<br>
<br>


        @endif

        @if ($pregunta->tipo_pregunta == 'Apm')
        <div class="input-group">
            <label class="label">{{$pregunta->orden_pregunta}}.- {{ $pregunta->nombre_pregunta }}</label>
            <div id="header">
            <input  style="width : 200px;" id="input11" required class="input--style-4 without_ampm" type="number"><h1>APM</h1>
            </div>

            <input    hidden class="input--style-4 without_ampm" type="text"
                name="preguntas[{{ $i }}]"
                value="{{ $pregunta->nombre_pregunta }}">

                <input hidden name="respuestas[{{ $i }}]" type="text" id="input12" />

        </div>



<br>
<input placeholder="[ SECCION DE COMENTARIOS PARA PREGUNTA: {{$i}} ]" type="text" name="comentarios[{{ $i }}]" class="input--style-4 text" />



<br>
<br>
<br>
    @endif
                            @if ($pregunta->tipo_pregunta == 'radio')
                                <label class="label">{{$pregunta->orden_pregunta}}.- {{ $pregunta->nombre_pregunta }}</label>

                                <label class="radio-container m-r-45">SI
                                    <input required name="respuestas[{{ $i }}]" type="radio" value="SI">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container m-r-45">NO
                                    <input required name="respuestas[{{ $i }}]" type="radio" value="NO">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">NO APLICA
                                    <input required name="respuestas[{{ $i }}]" type="radio" value="NO APLICA">
                                    <span class="checkmark"></span>
                                </label>
                                <br>
                                <br>
                                <br>
                                <input hidden class="input--style-4 without_ampm" type="text"
                                    name="preguntas[{{ $i }}]" value="{{ $pregunta->nombre_pregunta }}">



                                    <input placeholder="[ SECCION DE COMENTARIOS PARA PREGUNTA: {{$i}} ]" type="text" name="comentarios[{{ $i }}]" class="input--style-4 text" />



<br>
<br>
<br>

                            @endif

                            @if ($pregunta->tipo_pregunta == 'radio3')
                                <label class="label">{{$pregunta->orden_pregunta}}.- {{ $pregunta->nombre_pregunta }}</label>
                                <label class="radio-container m-r-45">SI CUMPLE
                                    <input required name="respuestas[{{ $i }}]" type="radio" value="SI CUMPLE">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container m-r-45">NO CUMPLE
                                    <input required name="respuestas[{{ $i }}]" type="radio" value="NO CUMPLE">
                                    <span class="checkmark"></span>
                                </label>

                                <label class="radio-container">NO APLICA
                                    <input required name="respuestas[{{ $i }}]" type="radio" value="NO APLICA">
                                    <span class="checkmark"></span>
                                </label>
                                <br>
                                <br>
                                <br>
                                <input hidden class="input--style-4 without_ampm" type="text"
                                    name="preguntas[{{ $i }}]" value="{{ $pregunta->nombre_pregunta }}">

<br>
<input placeholder="[ SECCION DE COMENTARIOS PARA PREGUNTA: {{$i}} ]" type="text" name="comentarios[{{ $i }}]" class="text" />



<br>
<br>
<br>

                            @endif
                        @endforeach

                        <input hidden name="limite" value="{{ $i }}" />



                        <h4>OBSERVACIONES</h4>


                        <div class="container">
                            <div class="comment">
                                <textarea name="textarea" class="textinput" ></textarea>
                            </div>
                        </div>

                        <br>
                        <br>

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <hr style="border-color:red;">
<br>


<div class="input-group">
    <label class="label">Correo</label>
    <div class="rs-select2 js-select-simple select--no-search">




            <div class="input-group">

                <div class="rs-select2 js-select-simple select--no-search">
                    <select multiple name="correo[]">
                        <option disabled="disabled" selected="selected">Seleccione....</option>
                 @foreach ($combobox as $correos )

                     <option value="{{$correos->email}}">{{$correos->email}}</option>

                @endforeach
                    </select>
                    <div class="select-dropdown"></div>
                </div>
            </div>


            {{-- {!! Form::select(
                'correo',
                [

                    'ivan.clement@organosintesis.com' => 'ivan.clement@organosintesis.com',
                    'aom@organosintesis.com' => 'aom@organosintesis.com',
                    'eriequintanilla@organosintesis.com' => 'eriequintanilla@organosintesis.com',
                    'gpa@organosintesis.com' => 'gpa@organosintesis.com',
                    'o.mondragon@organosintesis.com' => 'o.mondragon@organosintesis.com',
                    'bhilario@empresavirtual.mx' => 'bhilario@empresavirtual.mx',


                ],
                null,
                [
                    'placeholder' => 'Seleccion un correo...',
                    'class' => 'form-control',
                    'required',
                    'onkeyup' => 'validaciones();',
                ],
            ) !!} --}}




        <div class="select-dropdown"></div>
    </div>
</div>


<br>
<br>
<br>
<br>



                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.2.1.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    <!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('vendor/js/global.js') }}"></script>
    <div id="loading-screen" style="display:none">
        <img src="{{ asset('img/spinning-circles.svg')}}">
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->



<script>

$(document).ready(function () {
    $("#input1").keyup(function () {
        var value = $(this).val()+' Celsius';
        $("#input2").val(value);
    });
});
$(document).ready(function () {
    $("#input3").keyup(function () {
        var value = $(this).val()+' Ohms';
        $("#input4").val(value);
    });
});
$(document).ready(function () {
    $("#input5").keyup(function () {
        var value = $(this).val()+' Hp';
        $("#input6").val(value);
    });
});

$(document).ready(function () {
    $("#input7").keyup(function () {
        var value = $(this).val()+' RPM';
        $("#input8").val(value);
    });
});
$(document).ready(function () {
    $("#input9").keyup(function () {
        var value = $(this).val()+' Volts';
        $("#input10").val(value);
    });
});

$(document).ready(function () {
    $("#input11").keyup(function () {
        var value = $(this).val()+' APM';
        $("#input12").val(value);
    });
});
    //----------------------------------------- PREGUNTA_1 -----------------------------------------



    var emailInput1 = document.getElementById('1');
    document.getElementById('Pregunta1').addEventListener('click', function(e) {
        emailInput1.style.display = 'inline';
    });
    document.getElementById('Pregunta2').addEventListener('click', function(e) {
        emailInput1.style.display = 'inline';
    });

    document.getElementById('Pregunta3').addEventListener('click', function(e) {
        emailInput1.style.display = 'none';
    });





    var emailInput2 = document.getElementById('2');
    document.getElementById('Pregunta4').addEventListener('click', function(e) {
        emailInput2.style.display = 'inline';
    });
    document.getElementById('Pregunta5').addEventListener('click', function(e) {
        emailInput2.style.display = 'inline';
    });
    document.getElementById('Pregunta6').addEventListener('click', function(e) {
        emailInput2.style.display = 'none';
    });



    var emailInput3 = document.getElementById('3');
    document.getElementById('Pregunta7').addEventListener('click', function(e) {
        emailInput3.style.display = 'inline';
    });
    document.getElementById('Pregunta8').addEventListener('click', function(e) {
        emailInput3.style.display = 'inline';
    });

    document.getElementById('Pregunta9').addEventListener('click', function(e) {
        emailInput3.style.display = 'none';
    });







    var emailInput4 = document.getElementById('4');
    document.getElementById('Pregunta10').addEventListener('click', function(e) {
        emailInput4.style.display = 'inline';
    });
    document.getElementById('Pregunta11').addEventListener('click', function(e) {
        emailInput4.style.display = 'inline';
    });

    document.getElementById('Pregunta12').addEventListener('click', function(e) {
        emailInput4.style.display = 'none';
    });





    var emailInput5 = document.getElementById('5');
    document.getElementById('Pregunta13').addEventListener('click', function(e) {
        emailInput5.style.display = 'inline';
    });
    document.getElementById('Pregunta14').addEventListener('click', function(e) {
        emailInput5.style.display = 'inline';
    });

    document.getElementById('Pregunta15').addEventListener('click', function(e) {
        emailInput5.style.display = 'none';
    });






    var emailInput6 = document.getElementById('6');
    document.getElementById('Pregunta16').addEventListener('click', function(e) {
        emailInput6.style.display = 'inline';
    });
    document.getElementById('Pregunta17').addEventListener('click', function(e) {
        emailInput6.style.display = 'inline';
    });

    document.getElementById('Pregunta18').addEventListener('click', function(e) {
        emailInput6.style.display = 'none';
    });






    var emailInput7 = document.getElementById('7');
    document.getElementById('Pregunta19').addEventListener('click', function(e) {
        emailInput7.style.display = 'inline';
    });
    document.getElementById('Pregunta20').addEventListener('click', function(e) {
        emailInput7.style.display = 'inline';
    });

    document.getElementById('Pregunta21').addEventListener('click', function(e) {
        emailInput7.style.display = 'none';
    });





    var emailInput8 = document.getElementById('8');
     document.getElementById('Pregunta22').addEventListener('click', function(e) {
        emailInput8.style.display = 'inline';
    });
    document.getElementById('Pregunta23').addEventListener('click', function(e) {
        emailInput8.style.display = 'inline';
    });

    document.getElementById('Pregunta24').addEventListener('click', function(e) {
        emailInput8.style.display = 'none';
    });


    var emailInput9 = document.getElementById('9');
     document.getElementById('Pregunta25').addEventListener('click', function(e) {
        emailInput9.style.display = 'inline';
    });
    document.getElementById('Pregunta26').addEventListener('click', function(e) {
        emailInput9.style.display = 'inline';
    });

    document.getElementById('Pregunta27').addEventListener('click', function(e) {
        emailInput9.style.display = 'none';
    });


    var emailInput10 = document.getElementById('10');
     document.getElementById('Pregunta28').addEventListener('click', function(e) {
        emailInput10.style.display = 'inline';
    });
    document.getElementById('Pregunta29').addEventListener('click', function(e) {
        emailInput10.style.display = 'inline';
    });

    document.getElementById('Pregunta30').addEventListener('click', function(e) {
        emailInput10.style.display = 'none';
    });






    var emailInput11 = document.getElementById('11');
     document.getElementById('Pregunta31').addEventListener('click', function(e) {
        emailInput11.style.display = 'inline';
    });
    document.getElementById('Pregunta32').addEventListener('click', function(e) {
        emailInput11.style.display = 'inline';
    });

    document.getElementById('Pregunta33').addEventListener('click', function(e) {
        emailInput11.style.display = 'none';
    });





    var emailInput12 = document.getElementById('12');
     document.getElementById('Pregunta34').addEventListener('click', function(e) {
        emailInput12.style.display = 'inline';
    });
    document.getElementById('Pregunta35').addEventListener('click', function(e) {
        emailInput12.style.display = 'inline';
    });

    document.getElementById('Pregunta36').addEventListener('click', function(e) {
        emailInput12.style.display = 'none';
    });




    var emailInput13 = document.getElementById('13');
     document.getElementById('Pregunta37').addEventListener('click', function(e) {
        emailInput13.style.display = 'inline';
    });
    document.getElementById('Pregunta38').addEventListener('click', function(e) {
        emailInput13.style.display = 'inline';
    });

    document.getElementById('Pregunta39').addEventListener('click', function(e) {
        emailInput13.style.display = 'none';
    });




    var emailInput14 = document.getElementById('14');
     document.getElementById('Pregunta40').addEventListener('click', function(e) {
        emailInput14.style.display = 'inline';
    });
    document.getElementById('Pregunta41').addEventListener('click', function(e) {
        emailInput14.style.display = 'inline';
    });

    document.getElementById('Pregunta42').addEventListener('click', function(e) {
        emailInput14.style.display = 'none';
    });



    var emailInput15 = document.getElementById('15');
     document.getElementById('Pregunta43').addEventListener('click', function(e) {
        emailInput15.style.display = 'inline';
    });
    document.getElementById('Pregunta44').addEventListener('click', function(e) {
        emailInput15.style.display = 'inline';
    });

    document.getElementById('Pregunta45').addEventListener('click', function(e) {
        emailInput15.style.display = 'none';
    });


    var emailInput16 = document.getElementById('16');
     document.getElementById('Pregunta46').addEventListener('click', function(e) {
        emailInput16.style.display = 'inline';
    });
    document.getElementById('Pregunta47').addEventListener('click', function(e) {
        emailInput16.style.display = 'inline';
    });

    document.getElementById('Pregunta48').addEventListener('click', function(e) {
        emailInput16.style.display = 'none';
    });



    var emailInput17 = document.getElementById('17');
     document.getElementById('Pregunta49').addEventListener('click', function(e) {
        emailInput17.style.display = 'inline';
    });
    document.getElementById('Pregunta50').addEventListener('click', function(e) {
        emailInput17.style.display = 'inline';
    });

    document.getElementById('Pregunta51').addEventListener('click', function(e) {
        emailInput17.style.display = 'none';
    });


    var emailInput18 = document.getElementById('18');
     document.getElementById('Pregunta52').addEventListener('click', function(e) {
        emailInput18.style.display = 'inline';
    });
    document.getElementById('Pregunta53').addEventListener('click', function(e) {
        emailInput18.style.display = 'inline';
    });

    document.getElementById('Pregunta54').addEventListener('click', function(e) {
        emailInput18.style.display = 'none';
    });




    var emailInput19 = document.getElementById('19');
     document.getElementById('Pregunta55').addEventListener('click', function(e) {
        emailInput19.style.display = 'inline';
    });
    document.getElementById('Pregunta56').addEventListener('click', function(e) {
        emailInput19.style.display = 'inline';
    });

    document.getElementById('Pregunta57').addEventListener('click', function(e) {
        emailInput19.style.display = 'none';
    });





    var emailInput20 = document.getElementById('20');
     document.getElementById('Pregunta58').addEventListener('click', function(e) {
        emailInput20.style.display = 'inline';
    });
    document.getElementById('Pregunta59').addEventListener('click', function(e) {
        emailInput20.style.display = 'inline';
    });

    document.getElementById('Pregunta60').addEventListener('click', function(e) {
        emailInput20.style.display = 'none';
    });


</script>


</html>
<!-- end document-->
