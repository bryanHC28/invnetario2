@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> </h1>
@stop

@section('content')

<div class="row">
<div class="col-lg-3 col-md-6">
    <div class="small-box bg-danger">
        <div class="inner">
            <h3></h3>
            <p>Checklist vencidos</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href=" " class="small-box-footer">
            Ver <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3> </h3>
            <p>Checklist proximos a realizar</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href=" " class="small-box-footer">
            Ver <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="small-box bg-success">
        <div class="inner">
            <h3> </h3>
            <p>Checklist realizados</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href=" " class="small-box-footer">
            Ver <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>


</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
