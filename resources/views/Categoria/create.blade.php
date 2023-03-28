@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@section('content')





    <div class="container">
        <div class="row">
            <div class="col">
                <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                    <div style="background-color: #84B6F4" class="p-3 mb-2 bg-gradient fw-bold text-white">Nueva Categoria</div>


                    {!! Form::open([
                        'url' => '/categoria',
                        'style' => 'color:black;',
                        'id' => 'main-contact-form',
                        'class' => 'row g-3 needs-validation',
                        'name' => 'contact-form',
                        'onsubmit'=>'Loader.show()'
                    ]) !!}
                    <div class="col-md-6">


                        {!! Form::label('nombre', 'Nombre categoria:') !!}
                        {!! Form::text('nombre', null, [
                            'placeholder' => 'Ingresa nombre ',
                            'class' => 'form-control',
                            'required',
                            'onkeyup' => 'validaciones();',
                        ]) !!}



                    </div>
                    <div class="col-md-6">
                        {!! Form::label('id_area', 'Area:') !!}
                        {!! Form::select('id_area', $area->pluck('nombre', 'id')->all(), null, [
                            'placeholder' => 'Seleccionar ...',
                            'class' => 'form-control',
                            'onchange' => 'llenar_formulario(this.value);',
                            'required',
                            'onkeyup' => 'validaciones();',
                        ]) !!}






                    </div>

                    <br>
                    <br>
                    <br>
                    <br>

                    <button class="button" id="centrar" type="submit" >
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
<script src="{{ asset('js/loader.js') }}"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.4/howler.js"></script>
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
@stop
