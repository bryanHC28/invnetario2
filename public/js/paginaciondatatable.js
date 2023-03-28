


$(document).ready(function(){
    var table= $('#example').DataTable({
     autoWidth:false,


     "language": {
             "lengthMenu": "Mostrar _MENU_ registros por pagina",
             "zeroRecords": "Sin registros  - disculpa",
             "info": "Mostrando la pagina _PAGE_ de _PAGES_",
             "infoEmpty": "No records available",
             "infoFiltered": "(filtrado de _MAX_ registros totales)",
             'search': "Buscar",
             'paginate':{
                 'next':'Siguiente',
                 'previous':'Anterior'

             }

         }
     });

     $('.filter-select').change(function(){
 table.column($(this).data('column'))
 .search($(this).val())
 .draw();

 });










     });



