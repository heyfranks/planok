$(document).ready(function () {
    $('#cotizaciones_table').DataTable({
        "oLanguage": {
            "sEmptyTable": "Sin cotizaciones",
            "sZeroRecords": "No existen cotizaciones para su búsqueda",
            "sInfo": "Mostrando desde el _START_ al _END_ de _TOTAL_ cotizaciones",
            "sInfoEmpty": "No hay cotizaciones que cumplan su búsqueda",
            "sLengthMenu": "_MENU_ cotizaciones por página",
            "sSearch": "Buscar"
        },
        "iDisplayLength": 25,
        aoColumnDefs: [{
            bSortable: true,
            aTargets: [0]
        }],
        aaSorting: [
            [0, 'asc']
        ],
        fixedHeader: true
    });
    $('#cotizaciones_table :input').each(function(){
        $(this).attr("placeholder", "Buscar");
    });
});