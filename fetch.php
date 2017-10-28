<?php
require_once("dbsettings.php");

// DB table to use
$table = 'messages';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'name', 'dt' => 0 ),
    array( 'db' => 'email',  'dt' => 1 ),
    array( 'db' => 'message',   'dt' => 2 ),
    array( 'db' => 'date_time',     'dt' => 3 ),
);
 
// SQL server connection information
$sql_details = array(
    'user' => USER,
    'pass' => PASSWORD,
    'db'   => DBNAME,
    'host' => HOST
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);