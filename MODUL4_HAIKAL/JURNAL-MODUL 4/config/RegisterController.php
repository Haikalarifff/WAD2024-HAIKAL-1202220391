<?php

require 'connect.php';

// Memulai session
session_start();


// Mengambil nilai input dari form registrasi
$email = $_POST['email'];
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

 // Mengubabah nilai input password menjadi hash menggunakan fungsi password_hash()
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


// Melakukan query untuk mencari data dengan email yang sama dari nilai input email
$query1 = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query1);


// Membuat perkondisian ketika tidak ada data email yang sama ( gunakan mysqli_num_rows == 0 )
if(mysqli_num_rows($result) == 0){
    $query2 = "INSERT INTO users VALUES ('','$name','$username','$email','$password')";
    $insert = mysqli_query($conn, $query2);
    if($insert){
        $_SESSION ['message'] ='Pendaftaran sukses, silahkan login';
        $_SESSION ['color'] ='success';
        header('Location: ../views/login.php');
    }else{
        $_SESSION['message'] = 'Pendaftaran gagal';
    }
} else{
    $_SESSION['message'] = 'Username sudah terdaftar';
    header('Location: ../views/register.php');
}

?>