<?php 
require_once 'session_check.php';
require_once 'koneksi.php';

// Ambil data dari query string
$jenis_card = isset($_GET['jenis_card']) ? $_GET['jenis_card'] : '';

// Ambil informasi pekerjaan dari database berdasarkan posisi
$sql = "SELECT * FROM tb_infojob WHERE posisi = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 's', $jenis_card);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$job = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Detail Job - <?php echo $job['judul']; ?></title>
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1><?php echo $job['judul']; ?></h1>
        <img src="<?php echo $job['gambar']; ?>" alt="<?php echo $job['judul']; ?>" class="img-fluid">
        <h2><?php echo $job['posisi']; ?></h2>
        <h3><?php echo $job['level_job']; ?></h3>
        <p><?php echo $job['deskripsi']; ?></p>

        <a href="pendaftaran.php?jenis_card=<?php echo $job['jenis_card']; ?>" class="btn btn-dark">Daftar</a>
    </div>
</body>
</html>