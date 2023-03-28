

@extends('adminlte::page')


@section('title', 'Dashboard')


@section('content_header')

@stop

@section('content')

<div id="gantt_here" style="width:100%; height:90%;"></div>
@stop

@section('css')
<link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">

<style type="text/css">


    .gantt_grid_head_cell.gantt_grid_head_add{

    display: none;
    }
    .gantt_add, .gantt_grid_head_add{

    display: none;
    he
    }



        </style>
@stop

@section('js')
<script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
<script type="text/javascript">



    gantt.config.autosize = "xy";
    gantt.config.date_format = "%Y-%m-%d";
     gantt.init("gantt_here");
     gantt.load("api/data");
     gantt.i18n.setLocale("es");


    var dp = new gantt.dataProcessor("api");
    dp.init(gantt);
    dp.setTransactionMode("REST");


    document.addEventListener("DOMContentLoaded", function(event) {

gantt.config.scale_unit = "month";
gantt.config.date_scale = "%F, %Y";
gantt.config.scale_height = 50;
gantt.config.subscales = [
    {unit: "day", step: 1, date: "%j, %D"}
];


var filterValue = "";
var delay;
gantt.$doFilter = function(value){
    filterValue = value;
    clearTimeout(delay);
    delay = setTimeout(function(){
        gantt.render();
        gantt.$root.querySelector("[data-text-filter]").focus();
    }, 200)
}


gantt.attachEvent("onBeforeTaskDisplay", function(id, task){
if(!filterValue) return true;

    var normalizedText = task.text.toLowerCase();
    var normalizedValue = filterValue.toLowerCase();
    return normalizedText.indexOf(normalizedValue) > -1;
});
gantt.attachEvent("onGanttRender", function(){
    gantt.$root.querySelector("[data-text-filter]").value = filterValue;
})
var textFilter = "<input data-text-filter type='text' oninput='gantt.$doFilter(this.value)'>"
gantt.config.columns = [
    {name: "text", label: textFilter, tree: true, width: '*',  resize: true},
    {name: "start_date", align: "center", resize: true},
    {name: "duration", align: "center"}
];

gantt.init("gantt_here");



});


    </script>
@stop




















