<?php 

session_start();

// Menghapus cookie dengan mengatur masa belakunya 
if (isset($_COOKIE['id'])) {
    setcookie('id', '', time() - 3600, "/"); 
}

// Menghapus setiap variable session
$_SESSION = [];

// Mematikan session
session_destroy();

// Redirect ke halaman login
header('Location: ../views/login.php');
exit;

?>
