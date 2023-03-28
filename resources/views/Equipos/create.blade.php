@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')






    <div class="container">
        <div class="row">
            <div class="col">
                <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                    <div style="background-color: #84B6F4" class="p-3 mb-2  bg-gradient fw-bold text-white">Nuevo Equipo</div>




                    {!! Form::open([
                        'url' => '/equipo',
                        'style' => 'color:black;',
                        'id' => 'main-contact-form',
                        'class' => 'row g-3 needs-validation',
                        'name' => 'contact-form',
                        'onsubmit'=>'Loader.show()'
                    ]) !!}

                    <div class="col-md-6">

                        {!! Form::label('clave', 'Clave de equipo:') !!}
                        {!! Form::text('clave', null, [
                            'placeholder' => 'Ingresa nombre ',
                            'class' => 'form-control',
                            'required',
                            'onkeyup' => 'validaciones();',
                        ]) !!}


                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-6">
                        {!! Form::label('nombre', 'Nombre del equipo:') !!}
                        {!! Form::text('nombre', null, [
                            'placeholder' => 'Ingresa nombre ',
                            'class' => 'form-control',
                            'required',
                            'onkeyup' => 'validaciones();',
                        ]) !!}






                    </div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-6">

                        {!! Form::label('id_sucursal', 'Sucursal:') !!}
                        {!! Form::select('id_sucursal', $sucursales->pluck('nombre_sucursal', 'id')->all(), null, [
                            'placeholder' => 'Seleccionar ..',
                            'class' => 'form-control',
                            'onclick' => 'llenar_areas(this.value);',
                            'required',
                            'onkeyup' => 'validaciones();',
                        ]) !!}

                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-6">

                        {!! Form::label('id_area', 'Area:') !!}
                        {!! Form::select('id_area', ['' => 'Seleccionar ...'], null, [
                            'placeholder' => 'Seleccionar ...',
                            'class' => 'form-control',
                            'onclick' => 'llenar_categorias(this.value);',
                            'required',
                            'onchange' => 'ShowSelected();',
                        ]) !!}

                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-6">



                        {!! Form::label('id_categoria', 'Categoria:') !!}
                        {!! Form::select('id_categoria', ['' => 'Seleccionar ...'], null, [
                            'placeholder' => 'Seleccionar ...',
                            'class' => 'form-control',
                            'required',
                            'onchange' => 'ShowSelectedcategoria();',
                        ]) !!}
                        <input hidden name="txtcategoria" type="text" id="txtcategoria" value="">




                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-6">



                        {!! Form::label('fecha', 'Fecha ultimo mantenimiento:') !!}
                        {!! Form::date('fecha', null, [
                            'placeholder' => 'Ingresa nombre ',
                            'class' => 'form-control',

                            'onkeyup' => 'validaciones();',
                        ]) !!}



                    </div>




                    <br>
                    <br>
                    <br>
                    <br>


                    <div class="col-md-6">



                        {!! Form::label('periodicidad', 'Periodicidad (dias):') !!}
                        {!! Form::number('periodicidad', null, [
                            'placeholder' => 'Ingresa ingrese la periodicidad que tendra este equipo ',
                            'class' => 'form-control',

                            'max' => 365,
                            'min' => 1,
                            'onkeyup' => 'validaciones();',
                        ]) !!}



                    </div>




                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-6">




                        {!! Form::label('id_checklist', 'Seleccione check-list aplicar:') !!}
                        {!! Form::select('id_checklist', ['' => 'Seleccionar ...'], null, [
                            'placeholder' => 'Seleccionar ...',
                            'class' => 'form-control',

                            'onclick' => 'query(this.value);',
                            'onkeyup' => 'validaciones();',
                        ]) !!}

                        <hr style="border-color:red;">



                    </div>

                    <br>
                    <br>
                    <br>
                    <br>

                    <div id="ajax" class="col-md-4">





                    </div>







                    <br>
                    <br>



                    <div  class="col-md-12">

                    <button class="button"  type="submit" >
                        <span class="button__text">Guardar</span>
                        <span class="button__icon">
                            <ion-icon name="paper-plane"></ion-icon>
                        </span>
                    </button>




                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
<link href="{{ asset('css/create.css') }}" rel="stylesheet" media="all">


@stop

@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.4/howler.js"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script>
        function llenar_areas(id_sucursal) {

            $('#id_area').empty();
            var asset = '{{ asset('') }}';
            var ruta = asset + 'llenar_area/' + id_sucursal;
            console.log(ruta);

            $.ajax({


                type: 'GET',

                url: ruta,




                success: function(data) {

                    var area = data;


                    $('#id_area').append('<option value="">Seleccionar...</option>');

                    for (var i = 0; i < area.length; i++) {

                        $('#id_area').append('<option value="' + area[i].id + '">' + area[i].nombre +
                            '</option>');
                    }

                }

            });





            $('#id_checklist').empty();
            var asset = '{{ asset('') }}';
            var ruta = asset + 'llenar_combo_checklist/' + id_sucursal;
            console.log(ruta);

            $.ajax({
                type: 'GET',

                url: ruta,

                success: function(data) {
                    var ck = data;
                    $('#id_checklist').append('<option value="">Seleccionar...</option>');
                    for (var i = 0; i < ck.length; i++) {
                        $('#id_checklist').append('<option value="' + ck[i].id + '">' + ck[i].nombre +
                            '</option>');
                    }

                }
            });





        }

    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('crear') == 'ok')
        <script>
            Swal.fire(
                'Creado!',
                'Su registro ha sido creado con exito!',
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
        function llenar_categorias(id_area) {

            $('#id_categoria').empty();
            var asset = '{{ asset('') }}';
            var ruta = asset + 'llenar_categoria/' + id_area;
            console.log(ruta);

            $.ajax({
                type: 'GET',

                url: ruta,

                success: function(data) {
                    var categoria = data;
                    $('#id_categoria').append('<option value="">Seleccionar...</option>');
                    for (var i = 0; i < categoria.length; i++) {
                        $('#id_categoria').append('<option value="' + categoria[i].id + '">' + categoria[i]
                            .nombre + '</option>');
                    }

                }
            });
        }
    </script>

    <script>
        function query(id) {



            var asset = '{{ asset('') }}';
            var ruta = asset + 'checkbox/' + id;

            console.log(ruta);

            $.ajax({
                type: 'GET',
                url: ruta,

                success: function(data) {
                    $("#ajax").html(data);
                }



            });

        }


        function ShowSelected() {



            /* Para obtener el texto */
            var combo = document.getElementById("id_area");
            var selected = combo.options[combo.selectedIndex].text;
            console.log(selected);
            document.getElementById("txtarea").value = selected;
        }


        function ShowSelectedcategoria() {

            /* Para obtener el texto */
            var combo = document.getElementById("id_categoria");
            var selected = combo.options[combo.selectedIndex].text;
            console.log(selected);

            document.getElementById("txtcategoria").value = selected;

        }

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    @if (session('mensaje') == 'ok')
    <script>
     Swal.fire({
      title: 'Atención!',
      text: 'Se ha guardando un registro sin asignación de checklist',
      imageUrl: "{{ asset('img/campana.jpg') }} ",
      imageWidth: 400,
      imageHeight: 250,
      imageAlt: 'Custom image',
    })

    let sound = new Howl({
              src: ["{{ asset('audio/success.mp4') }}"],
              volume: 1.0
            });

            sound.play()
    </script>
    @endif

    <script src="{{ asset('js/loader.js') }}"></script>
@stop
