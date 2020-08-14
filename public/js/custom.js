
$(document).ready(function() {
    $('#data-table').DataTable( {
          "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
    } );

    $('#data-stream').DataTable( {
        "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ]
    } );
} );
