var app = angular.module('imc', []);


var table;

//Algunas funciones de ayuda
function generardatatable() {

    if ($.fn.dataTable.isDataTable('.dataTables-example')) {

        table.destroy();
    }

    table = $('.dataTables-example').DataTable({
        dom: '<"html5buttons"B>lTfgitp',
        buttons: []

    });


}

function destruirdatatable() {

    table.destroy();


}