<?php
$serverName = "localhost\\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "mediquick_db",
    "Uid" => "",
    "PWD" => ""
);

// Connecting to SQL Server
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn == false) {
    die(print_r(sqlsrv_errors(), true));
}
?>