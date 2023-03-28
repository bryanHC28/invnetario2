<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #466C94;
            color: white;
            text-align: center;
        }

        h4 {
            text-align: center;
        }

        h3 {
            text-align: center;
        }

        h6 {
            text-align: center;
        }

        .enlinea{
            display: inline-block;
            vertical-align: middle;
            color: #df2426;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <img src="" width="200px" alt="" class="enlinea" />
                        <h1 class="enlinea">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reporte detallado</h1>
                        <br />
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <tbody>
                                    <tr>
                                        <td>Fecha:</td>
                                        <td>{{ $fechaActual }}</td>
                                        <td>Genero:</td>
                                        <td>{{ auth()->user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Area:</td>
                                        <td colspan="2">
                                       {{$control_areas[0]->area}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                            <h3 class="text-center"></h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Equipo</th>
                                            <th>Precio $</th>
                                        </tr>
                                    </thead>
                                    @php
                                    $suma=0;
                                @endphp
                                    @foreach ($control_areas as $areas_x_equipo )


                                        <tr>


                                                <td>{{$areas_x_equipo->nombre_equipo}}</td>
                                                <td>{{"$".number_format($areas_x_equipo->costo_unitario, 2)}}</td>
                                                @php
                                                $suma+=$areas_x_equipo->costo_unitario;//sumanos los valores
                                              @endphp

                                        </tr>

                                        @endforeach
                                        <br>
                                        <thead>
                                            <tr>
                                                <th>Total </th>
                                                <h3>{{"$".number_format($suma, 2)}}</h3>
                                            </tr>
                                        </thead>

                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
