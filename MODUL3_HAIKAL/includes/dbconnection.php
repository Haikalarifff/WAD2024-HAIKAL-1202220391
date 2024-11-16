<?php
// DB credentials as variables
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'uwibu_sql';
$port = 3307;

// Buatkan koneksi ke database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>