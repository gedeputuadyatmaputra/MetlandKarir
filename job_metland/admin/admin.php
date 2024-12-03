<?php
    require_once '../session_check.php';
    require_once '../koneksi.php';

    requireLogin();
    // Check if logout is requested
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
    
    include("template/header.php");

    // Query untuk menghitung jumlah data di tb_mt
    $sql_count_mt = "SELECT COUNT(*) as total FROM tb_mt";
    $result_count_mt = mysqli_query($conn, $sql_count_mt);
    $data_count_mt = mysqli_fetch_assoc($result_count_mt);
    $total_data_mt = $data_count_mt['total'];

    // Query untuk menghitung jumlah data di tb_fg
    $sql_countfg = "SELECT COUNT(*) as total FROM tb_fg";
    $result_countfg = mysqli_query($conn, $sql_countfg);
    $data_countfg = mysqli_fetch_assoc($result_countfg);
    $total_datafg = $data_countfg['total'];

    // Query untuk menghitung jumlah data di tb_profesional
    $sql_count_pro = "SELECT COUNT(*) as total FROM tb_profesional";
    $result_count_pro = mysqli_query($conn, $sql_count_pro);
    $data_count_pro = mysqli_fetch_assoc($result_count_pro);
    $total_data_pro = $data_count_pro['total'];

    // Query untuk menghitung jumlah data di tb_intern
    $sql_count_intern = "SELECT COUNT(*) as total FROM tb_intern";
    $result_count_intern = mysqli_query($conn, $sql_count_intern);
    $data_count_intern = mysqli_fetch_assoc($result_count_intern);
    $total_data_intern = $data_count_intern['total'];
?>

<style>
    .card-custom {
        background-color: #4CAF50; /* Warna latar belakang */
        color: white; /* Warna teks */
        border-radius: 10px; /* Sudut melengkung */
        transition: transform 0.2s; /* Efek transisi */
    }

    .card-custom:hover {
        transform: scale(1.05); /* Efek zoom saat hover */
    }

    .card-header {
        font-weight: bold; /* Teks header tebal */
    }

    .card-title {
        font-size: 2rem; /* Ukuran font untuk jumlah */
        margin: 0; /* Menghilangkan margin */
    }

    .card-text {
        font-size: 1rem; /* Ukuran font untuk deskripsi */
    }
</style>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4" style="margin-top: 0;">Data Jumlah Pelamar Posisi</h4>

   
    <!-- Card untuk menampilkan jumlah data -->
    <div class="row">
        <div class="col-md-3" >
            <div class="card text-center card-costum" >
                <div class="card-header ">
                    Jumlah Data Pelamar MT
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $total_data_mt; ?></h5>
                    <a href="datamt/datamt.php" class="btn btn-primary mt-2">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="col-md-3" >
            <div class="card text-center card_custom" >
                <div class="card-header">
                    Jumlah Data Pelamar Fresh Graduate
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $total_datafg; ?></h5>
                    <a href="datafg/datafg.php" class="btn btn-primary mt-2">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="col-md-3" >
            <div class="card text-center card_custom">
                <div class="card-header">
                    Jumlah Data Pelamar Profesional
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $total_data_pro; ?></h5>
                    <a href="datapro/datapro.php" class="btn btn-primary mt-2">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="col-md-3" >
            <div class="card text-center card_custom" >
                <div class="card-header">
                    Jumlah Data Pelamar Magang
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $total_data_intern; ?></h5>
                    <a href="dataintern/data_intern.php" class="btn btn-primary mt-2">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- / Content -->
<?php
include("template/footer.php");
mysqli_close($conn);
?>