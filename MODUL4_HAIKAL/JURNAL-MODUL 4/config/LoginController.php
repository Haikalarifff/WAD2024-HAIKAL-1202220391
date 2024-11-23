<?php

require 'connect.php';

// function untuk melakukan login
function login($input) {
    global $conn;

    // Ambil Emal dan Password dari form
    $email = $input['email'];
    $password = $input['password'];

    // Buat query untuk mencari email di database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Cek apakah email ada di database
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $data['password'])) {
            // Buat variable session
            $_SESSION["login"] = true;
            $_SESSION["id"] = $data["id"];

            // Cek apakan Rememmber Me ter ceklis dan Buat Cookie
            if (isset($input["remember"])) {
                setcookie("id", $data['id'], time() + (86400 * 30), "/"); // 30 hari
            } else {
                setcookie("id", "", time() - 3600, "/"); // hapus cookie
            }

            // Redirect ke home page
            header("Location: home.php");
            exit;
        } else {
            $_SESSION['message'] = "Password salah";
            $_SESSION['color'] = "danger";
        }
    } else {
        $_SESSION['message'] = "Email tidak ditemukan";
        $_SESSION['color'] = "danger";
    }
}

// function untuk fitur "Remember Me"
function rememberMe($cookie) {
    global $conn;

    if (isset($cookie['id']) && !isset($_SESSION['login'])) {
        $id = $cookie['id'];
        
        // Buat Query untuk mencari data user berdasarkan id dari cookie
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        
        // ika data user ditemukan, set session agar use bisa tetap login
        if (mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);
            $_SESSION["login"] = true;
            $_SESSION["id"] = $data['id'];
            header("Location: home.php");
            exit;
        } else {
            // Hapus cookie jika id tidak valid
            setcookie("id", "", time() - 3600, "/");
        }
    }
}

?>