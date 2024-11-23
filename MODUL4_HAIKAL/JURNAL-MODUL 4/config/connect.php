<!-- File ini berisi koneksi dengan database MySQL -->
<?php 


$conn = (mysqli_connect('localhost', 'root', '', 'modul4',3307));
if (!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}

 
?>