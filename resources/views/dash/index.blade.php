

@extends('adminlte::page')


@section('title', 'Dashboard')


@section('content_header')

@stop

@section('content')

<br>




@if (auth()->user()->tipo_cuenta === 'Usuario')
<figure>
    <div class="face top"><h1 id="s"></h1></div>
    <div class="face front"><h1 id="m"></h1></div>
    <div class="face left"><h1 id="h"></h1></div>
  </figure>


@section('css')


<style>
@font-face {
  font-family: 'Digital-7';
  src: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/184191/Digital-7.eot?#iefix') format('embedded-opentype'),  url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/184191/Digital-7.woff') format('woff'), url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/184191/Digital-7.ttf')  format('truetype'), url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/184191/Digital-7.svg#Digital-7') format('svg');font-weight: normal;font-style: normal;}
::selection{background:#333;}::-moz-selection{background:#111;}
*,html{margin:0;}
body{background:#333}
figure{width:210px;height:210px;position:absolute;top:50%;left:58%;margin-top:-105px;margin-left:-105px;transform-style: preserve-3d;-webkit-transform-style: preserve-3d;-webkit-transform: rotateX(-35deg) rotateY(45deg);transform: rotateX(-35deg) rotateY(45deg);transition:2s;}
figure:hover{-webkit-transform:rotateX(-50deg) rotateY(45deg);transform:rotateX(-50deg) rotateY(45deg);}
.face{width:100%;height:100%;position:absolute;-webkit-transform-origin: center;transform-origin: center;background:#000;text-align:center;}
h1{font-size:180px;font-family: 'Digital-7';margin-top:20px;color:#2982FF;text-shadow:0px 0px 5px #000;-webkit-animation:color 10s infinite;animation:color 10s infinite;line-height:180px;}
.front{-webkit-transform: translate3d(0, 0, 105px);transform: translate3d(0, 0, 105px);background:#111;}
.left{-webkit-transform: rotateY(-90deg) translate3d(0, 0, 105px);transform: rotateY(-90deg) translate3d(0, 0, 105px);background:#151515;}
.top{-webkit-transform: rotateX(90deg) translate3d(0, 0, 105px);transform: rotateX(90deg) translate3d(0, 0, 105px);background:#222;}

@keyframes color{
  0%{color:#2982ff;text-shadow:0px 0px 5px #000;}
  50%{color:#cc4343;text-shadow:0px 0px 5px #ff0000;}
}
@-webkit-keyframes color{
  0%{color:#2982ff;text-shadow:0px 0px 5px #000;}
  50%{color:#cc4343;text-shadow:0px 0px 5px #ff0000;}
}
</style>
@stop
@section('js')
<script>
 function date_time(id)
{
        date = new Date;
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        document.getElementById("s").innerHTML = ''+s;
        document.getElementById("m").innerHTML = ''+m;
        document.getElementById("h").innerHTML = ''+h;
        setTimeout('date_time("'+"s"+'");','1000');
        return true;
}
window.onload = date_time('s');
</script>
@stop

@endif


  @if (auth()->user()->tipo_cuenta != 'Usuario')

<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3>{{$Estado_fecha->vencido}}</h3>
                <p>Checklist vencidos</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('filtro',['Estado'=>'vencido'])}}" class="small-box-footer">
                Ver <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>





    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$Estado_fecha->esta_semana}}</h3>
                <p>Realizar proximos 7 dias</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('filtro',['Estado'=>'esta semana'])}}" class="small-box-footer">
                Ver <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$Estado_fecha->este_mes}}</h3>
                <p>Realizar 7-30 dias</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('filtro',['Estado'=>'este mes'])}}" class="small-box-footer">
                Ver <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>



    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$Estado_fecha->medio_año}}</h3>
                <p>Realizar 1-6 meses</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('filtro',['Estado'=>'medio año'])}}" class="small-box-footer">
                Ver <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$Estado_fecha->este_año}}</h3>
                <p>Realizar 6-12 meses</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('filtro',['Estado'=>'este año'])}}" class="small-box-footer">
                Ver <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box" style="background-color: rgb(159, 106, 228)">
            <div class="inner">
                <h3 style="color: white">{{$Estado_fecha->mas_del_año}}</h3>
                <p style="color: white">Realizar mayor a 1 año</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('filtro',['Estado'=>'mas del año'])}}" class="small-box-footer">
                Ver <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-12 col-md-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $Estado_fecha->vencido + $Estado_fecha->esta_semana + $Estado_fecha->este_mes + $Estado_fecha->medio_año + $Estado_fecha->este_año + $Estado_fecha->mas_del_año }}</h3>
                <p>Total</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('responder.index')}}" class="small-box-footer">
                Ver <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>




<div class="row">

<figure class="highcharts-figure col-lg-6 col-md-6">
    <div id="container"></div>
</figure>
<figure class="highcharts-figure col-lg-6 col-md-6">
    <div id="check_x_equipo"></div>
</figure>

</div>





@endif


@stop

@section('css')

@stop

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('error') == 'ok')
<script>
 Swal.fire({
  title: 'Oppps!',
  text: 'Ocurrio un error, por favor reportalo a tus proveedores',
  imageUrl: "{{ asset('img/error.jpeg') }} ",
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: 'Custom image',
})
</script>
@endif


<script>
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Personal con equipos responzables',
        align: 'center'
    },
    tooltip: {
        pointFormat: '{series.name}'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> '
            }
        }
    },
    series: [{
        name: ' ',
        colorByPoint: true,
        data: [

        @foreach ($responzables as $equip)
    {
    name: "{{ $equip->responsable}} : {{ $equip->totalresponsable}}   ",
    y: {{ $equip->totalresponsable}},
    },
    @endforeach]
    }]
});



Highcharts.chart('check_x_equipo', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Checklist asignados por equipo',
        align: 'center'
    },
    tooltip: {
        pointFormat: '{series.name}'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> '
            }
        }
    },
    series: [{
        name: '',
        colorByPoint: true,
        data: [

        @foreach ($equipos as $equip)
    {
    name: "{{ $equip->clave}} : {{ $equip->totalchecklist}}   ",
    y: {{ $equip->totalchecklist}},
    },
    @endforeach]
    }]
});










</script>
@stop
