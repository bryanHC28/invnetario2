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




                    <form class="row g-3 needs-validation" onsubmit="Loader.show()" action="{{ route('monalisa') }}" method="POST" id="editform">
                        @csrf @method('POST')

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

                        {!! Form::label('modelo', 'Modelo del equipo:') !!}
                        {!! Form::text('modelo', null, [
                            'placeholder' => 'Ingresa modelo del equipo ',
                            'class' => 'form-control',
                            'required',
                            'onkeyup' => 'validaciones();',
                        ]) !!}

                    </div>

                    <div class="col-md-6">

                        {!! Form::label('id_sucursal', 'Sucursal:') !!}
                        {!! Form::select('id_sucursal', $sucursales->pluck('nombre_sucursal', 'id')->all(), null, [
                            'placeholder' => 'Seleccionar ..',
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

                        {!! Form::label('id_area', 'Area:') !!}
                        {!! Form::select('id_area', $combo_areas->pluck('nombre', 'id')->all(), null, [
                            'placeholder' => 'Seleccionar ..',
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



                        {!! Form::label('id_categoria', 'Categoria:') !!}
                        {!! Form::select('id_categoria', $categoria_equipos->pluck('nombre', 'id')->all(), null, [
                            'placeholder' => 'Seleccionar ..',
                            'class' => 'form-control',
                            'onclick' => 'llenar_areas(this.value);',
                            'required',
                            'onkeyup' => 'validaciones();',
                        ]) !!}
                        <input hidden name="txtcategoria" type="text" id="txtcategoria" value="">




                    </div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-6">



                        {!! Form::label('fecha_ingreso', 'fecha de ingreso') !!}
                        {!! Form::date('fecha_ingreso', null, [
                            'placeholder' => 'seleccione la fecha de ingreso',
                            'class' => 'form-control',
                            'onkeyup' => 'validaciones();',
                        ]) !!}



                    </div>


                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-6">



                        {!! Form::label('fecha_vencimiento', 'fecha de vencimiento') !!}
                        {!! Form::date('fecha_vencimiento', null, [
                            'placeholder' => 'seleccione la fecha de vencimiento',
                            'class' => 'form-control',
                            'onkeyup' => 'validaciones();',
                        ]) !!}



                    </div>


                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-6">



                        {!! Form::label('cantidad', 'Cantidad') !!}
                        {!! Form::number('cantidad', null, [
                            'placeholder' => 'Ingresa cantidad de equipos agregar ',
                            'class' => 'form-control',

                            'onkeyup' => 'validaciones();',
                        ]) !!}



                    </div>


                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-6">



                        {!! Form::label('costo', 'Costo') !!}
                        {!! Form::number('costo', null, [
                            'placeholder' => 'Ingresa costo del equipo ',
                            'class' => 'form-control',

                            'onkeyup' => 'validaciones();',
                        ]) !!}



                    </div>


                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>



                    <div  class="col-md-12">

                    <button class="button"  type="submit" >
                        <span class="button__text">Guardar</span>
                        <span class="button__icon">
                            <ion-icon name="paper-plane"></ion-icon>
                        </span>
                    </button>

                </form>


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
