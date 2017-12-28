<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'jadwal_rapat';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'id_ruang', 'dt' => 1 ),
    array( 'db' => 'id_pengguna',  'dt' => 2 ),
    array( 'db' => 'judul_rapat',   'dt' => 3 ),
    array( 'db' => 'pimpinan_rapat',     'dt' => 4 ),
    array(
        'db'        => 'tgl_mulai',
        'dt'        => 5,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    ),
    array(
        'db'        => 'tgl_selesai',
        'dt'        => 6,
        'formatter' => function( $d, $row ) {
            //return '$'.number_format($d);
            return date( 'jS M y', strtotime($d));
        }
    )
);
 
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'ruang_rapat',
    'host' => 'localhost'
);s
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require('../admin/datasource/ssp.class.php');
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);