$(function() {
   table = $('#gbookmessages').DataTable( {
        "processing": true,
        "serverSide": true,
        "pageLength": 25,
        "order": [[3, "desc"]],
        "ajax": "fetch.php",
        "columnDefs": [
            {
            "targets": [2],
            "orderable": false
            }
        ],
    } );
});