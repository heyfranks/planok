$(document).ready(function () {
    $('#usuarios_table').DataTable({
        "oLanguage": {
            "sEmptyTable": "Sin usuarios",
            "sZeroRecords": "No existen usuarios para su búsqueda",
            "sInfo": "Mostrando desde el _START_ al _END_ de _TOTAL_ usuarios",
            "sInfoEmpty": "No hay usuarios que cumplan su búsqueda",
            "sLengthMenu": "_MENU_ usuarios por página",
            "sSearch": "Buscar"
        },
        "iDisplayLength": 25,
        aoColumnDefs: [{
            bSortable: true,
            aTargets: [0]
        }],
        aaSorting: [
            [0, 'desc']
        ],
        fixedHeader: true
    });
    $('#usuarios_table :input').each(function(){
        $(this).attr("placeholder", "Buscar");
    });
});