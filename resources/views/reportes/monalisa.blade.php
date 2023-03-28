@extends('adminlte::page')


@section('title', 'Dashboard')


@section('content_header')

@stop

@section('content')

<br>



<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-6">
            <a href="{{ route('reporte_monalisa') }}">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Detalle por area</h6>
                    <h2 class="text-right"><i class="fas fa-city f-left"></i><span>Total: {{"  $".number_format($totalCost, 2)}}</span></h2>
                    <p class="m-b-0">Areas totales:<span class="f-right">{{$areas}}</span></p>
                </div>
            </div>
        </a>
        </div>



        {{-- <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Orders Received</h6>
                    <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>486</span></h2>
                    <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Orders Received</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>486</span></h2>
                    <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                </div>
            </div>
        </div> --}}
        <div class="col-md-4 col-xl-6">
            <a href="{{ route('categoria_monalisa') }}">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Detalle por categoria</h6>
                    <h2 class="text-right"><i class="fas fa-box f-left"></i><span>Total: {{"  $".number_format($totalCost, 2)}}</span></h2>
                    <p class="m-b-0">Categorias totales<span class="f-right">{{$categorias}}</span></p>
                </div>
            </div>
        </a>
        </div>
	</div>
</div>


<div class="row">

    <figure class="highcharts-figure col-lg-12 col-md-12">
        <div id="container"></div>
    </figure>

    </div>
@stop

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>

body{
    margin-top:20px;
    background:#FAFAFA;
}
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}

</style>
@stop

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Costo por area',
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

            @foreach ($total_areas as $areas)
        {
        name: "{{ $areas->nombre}} : {{'$'.$areas->Total}}   ",
        y: {{ $areas->Total}},
        },
        @endforeach]
        }]
    });










    </script>


@stop
