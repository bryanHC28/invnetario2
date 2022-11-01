<div>
    @if (isset($dateSearch) and $dateSearch == true)
        <div class="form-group mb-2">
            <div class="input-group-btn">
                <button type="button" class="btn btn-primary" id="daterange-btn-{{ $id }}">
                    <i class="far fa-calendar-alt"></i>
                    <span>Selecciona la fecha</span>
                    <i class="fa fa-caret-down"></i>
                </button>
            </div>
        </div>
    @endif

    <div class="py-2">
        <table id="{{ $id }}DataTable" style="font-size:14px" class="table table-hover " style="width: 100%">
            {!! $slot !!}
        </table>
    </div>

    <style>
        .row-link {
            cursor: pointer;
        }

        .row-link:hover {
            color: #0097bd;
            font-weight: 800;
        }


    </style>

    @section('js_component')
    <script>
        function toUrl(href) {
            window.location.href = href;
        }

        $(document).ready(() => {
            @if(isset($visibilidadColumnasExportar))
                var visibilidadColumnasExportar = {!! json_encode($visibilidadColumnasExportar) !!};
                var columnasVisibles = [];
                var columnasNoVisibles = [];
                visibilidadColumnasExportar.forEach((obj) => {
                  if (obj.visible == 1) {
                    columnasVisibles.push(obj.columna);
                  } else {
                    columnasNoVisibles.push(obj.columna);
                  }
                });
            @endif
            let idioma{{ $id }}DataTable = {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningun dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "ÃƒÅ¡ltimo",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": 'Copiar',
                    "colvis": 'Visibilidad de columnas',
                    "copyTitle": 'Informacion copiada',
                    "copyKeys": 'Use your keyboard or menu to select the copy command',
                    "copySuccess": {
                        "_": '%d filas copiadas al portapapeles',
                        "1": '1 fila copiada al portapapeles'
                    },
                    "pageLength": {
                        "_": "Mostrar %d filas",
                        "-1": "Todo"
                    }
                }
            };
            let {{ $id }}DataTable = $('#{{ $id }}DataTable').DataTable({
                "responsive":true,
                "language": idioma{{ $id }}DataTable,
                "order": [],
                "paging": {{ $paging ?? 'true' }},
                "lengthChange": true,
                columnDefs: [{
                    orderable: false,
                    targets: {!! json_encode($disableSort ?? []) !!}
                }],
                "searching": true,
                 "scrollX": true,
                "info": true,
                "autoWidth": false,
                @if(isset($exportButtons) and $exportButtons == true)
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        @if(isset($visibilidadColumnasExportar))
                            exportOptions: {
                                columns: columnasVisibles
                            }
                        @endif
                    },
                    {
                        extend: 'excel',
                        @if(isset($visibilidadColumnasExportar))
                            exportOptions: {
                                columns: columnasVisibles
                            }
                        @endif
                    },
                    {
                        extend: 'pdf',
                        @if(isset($visibilidadColumnasExportar))
                            exportOptions: {
                                columns: columnasVisibles
                            }
                        @endif
                    },
                    {
                        extend: 'colvis',
                        columns: ':not(".select-disabled")'
                    }
                ],
                @endif
                "lengthMenu": [
                    [7, 10, 30, 31, -1],
                    [7, 10, 30, 31, "Mostrar Todo"]
                ],
            });

            $('.status-dropdown').on('change', function(e){
            let dataTable={{ $id }}DataTable;
            var status = $(this).val();
            $('.status-dropdown').val(status)
            dataTable.column(4).search(status).draw();
            })

            $('.type-dropdown').on('change', function(e){
            let dataTable={{ $id }}DataTable;
            var status = $(this).val();
            $('.type-dropdown').val(status)
            dataTable.column(9).search(status).draw();
            })

            @if (isset($dateSearch) and $dateSearch == true)
                let año = {{ $año ?? '(new Date).getFullYear()' }};
                let mes = {{ $mes ?? '(new Date).getMonth() + 1' }};
                let start = moment('' + año + '-' + mes + '').startOf('month');
                let end = moment('' + año + '-' + mes + '').endOf('month');
                let label = '';
                $('#daterange-btn-{{ $id }}').daterangepicker({
                    locale: {
                      format: 'YYYY/MM/DD'
                    },
                    startDate: moment(start),
                    endDate: moment(end),
                    ranges: {
                      'Hoy': [moment(), moment()],
                      'YTD': [moment().subtract(1, 'days').startOf('year'), moment()],
                      'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],
                      'Este mes': [moment().startOf('month'), moment().endOf('month')],
                      'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    }
                  },
                  function(start, end, label) {
                    if (isDate(start)) {
                      $('#daterange-btn-{{ $id }} span').html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'));
                      minDateFilter = start;
                      maxDateFilter = end;
                      $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                        var date = Date.parse(data[0]);
                        if (
                          (isNaN(minDateFilter) && isNaN(maxDateFilter)) ||
                          (isNaN(minDateFilter) && date <= maxDateFilter) ||
                          (minDateFilter <= date && isNaN(maxDateFilter)) ||
                          (minDateFilter <= date && date <= maxDateFilter)
                        ) {
                          return true;
                        }
                        return false;
                      });
                      {{ $id }}DataTable.draw();
                    }
                  });
                $('#btnInc').click(function(e) {
                  IncDecMonth('Inc')
                })
                $('#btnDec').click(function(e) {
                  IncDecMonth('Dec')
                })
                function isDate(val) {
                  return Date.parse(val);
                }
                function IncDecMonth(Action) {
                  if (!isDate(start)) {
                    start = moment().startOf('month');
                  }
                  if (Action == 'Inc') {
                    start = moment(start).add(0, 'month').startOf('month');
                    end = moment(start).endOf('month')
                  } else {
                    start = moment(start).subtract(0, 'month').startOf('month');
                    end = moment(start).endOf('month')
                  }
                  if (isDate(start)) {
                    $('#daterange-btn-{{ $id }} span').html(start.format('DD MMM YYYY') + ' - ' + end.format('DD MMM YYYY'));
                  }
                  minDateFilter = start;
                  maxDateFilter = end;
                  $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                    var date = Date.parse(data[0]);
                    if (
                      (isNaN(minDateFilter) && isNaN(maxDateFilter)) ||
                      (isNaN(minDateFilter) && date <= maxDateFilter) ||
                      (minDateFilter <= date && isNaN(maxDateFilter)) ||
                      (minDateFilter <= date && date <= maxDateFilter)
                    ) {
                      return true;
                    }
                    return false;
                  });
                  {{ $id }}DataTable.draw();
                }
                IncDecMonth();
            @endif
        });
    </script>
    @endsection
</div>
