$(function() {
   $('#gbookmessages').DataTable( {
        "processing": true,
        "serverSide": true,
        "pageLength": 25,
        "ajax": "fetch.php",
        "columnDefs": [
        	{
        	"targets": [2],
        	"orderable": false
        	}
        ],
    } );
});