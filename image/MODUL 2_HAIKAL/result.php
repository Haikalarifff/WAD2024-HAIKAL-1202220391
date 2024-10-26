<?php
//silahkan jawab disini (menangkap data dari form)
if ($_POST) {
    $berapa_menit = $_POST["exercise"];

}

//silahkan jawab disini (logika pola makan berdasarkan lama olahraga)

if ($berapa_menit <0) {
    $error = "Total menit tidak boleh kurang dari 0.";
} else {

    // ========== Perhitungan BMI
    if ($berapa_menit > 15) {
        $hasil = "Diperbolehkan makan 5 sendok makan";
    } elseif ($berapa_menit <= 15 && $berapa_menit >0) {
        $hasil = "Direkomendasikan jangan untuk memakan nasi terlebih dahulu";
    } elseif($berapa_menit == 0) {
        $hasil = "Direkomendasikan jangan untuk makan malam dan melakukan olahraga ringan di malam hari selama 5 menit terlebih dahulu";

    }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pola Makan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h3>Hasil Pola Makan Anda</h3>
            <p class="alert alert-info">
                <!-- silahkan jawab disini (menampilkan hasil logika berdasarkan kondisi olahraga) -->
                <?php
                    if (!empty($hasil)) {
                        echo "<div class='alert alert-success'>kondisi Tubuh Anda: $hasil</div>";
                    }
                    ?>
                    <!-- Hasil pesan error ditampilkan di sini -->
                    <?php
                    if (!empty($error)) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                    ?>
                
            </p>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
