<?php 
    session_start();
    include '../koneksi.php';
?>
<?php 
if (isset($_POST['submit'])) {

        $calon_id = $_SESSION['calon_id'];
        $pendaftaran = isset($_SESSION['biodata']) ? $_SESSION['biodata'] : [];
        $nama_perusahaan = isset($_POST['nama_perusahaan']) && !empty($_POST['nama_perusahaan']) ? implode(',', $_POST['nama_perusahaan']) : '-';
        $bidang_usaha = isset($_POST['bidang_usaha']) && !empty($_POST['bidang_usaha']) ? implode(',', $_POST['bidang_usaha']) : '-';
        $jabatan_terakhir = isset($_POST['jabatan_terakhir']) && !empty($_POST['jabatan_terakhir']) ? implode(',', $_POST['jabatan_terakhir']) : '-';
        $masa_awal = isset($_POST['masa_awal']) && !empty($_POST['masa_awal']) ? implode(',', $_POST['masa_awal']) : '-';
        $masa_akhir = isset($_POST['masa_akhir']) && !empty($_POST['masa_akhir']) ? implode(',', $_POST['masa_akhir']) : '-';
        $alasan_keluar = isset($_POST['alasan_keluar']) && !empty($_POST['alasan_keluar']) ? implode(',', $_POST['alasan_keluar']) : '-';

        $gambar = null;

    if (isset($_FILES['gambar_posisi']) && $_FILES['gambar_posisi']['error'] == 0) {
        $gambar = file_get_contents($_FILES['gambar_posisi']['tmp_name']);
        if (strlen($gambar) > 16777215) { // 16MB
            $error = "Ukuran gambar terlalu besar. Maksimal 16MB.";
        }
    }

    $sql_simpan = "INSERT INTO tb_pekerja (id_diri,nama_perusahaan, bidang_usaha, jabatan_terakhir, masa_awal, masa_akhir, alasan_keluar, gambar_posisi, tanggung_jawab, alasan_melamar, alasan_posisi, alasan_bekerja_posisi, cita_citakarir ) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = mysqli_prepare($conn, $sql_simpan);
    
    if ($stmt) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, 'issssssssssss', $calon_id, $nama_perusahaan, $bidang_usaha, $jabatan_terakhir, $masa_awal, $masa_akhir, $alasan_keluar, $gambar, $_POST['tanggung_jawab'], $_POST['alasan_melamar'], $_POST['alasan_posisi'], $_POST['alasan_bekerja_posisi'], $_POST['cita_citakarir']);
        
        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            $pekerja_id = mysqli_insert_id($conn);

             // Simpan data riwayat pekerjaan
             foreach ($_POST['masa_awal'] as $index => $masa_awal) {
                $masa_akhir = $_POST['masa_akhir'][$index];
                $alasan_keluar = $_POST['alasan_keluar'][$index];

                $sql_riwayat = "INSERT INTO riwayat_pekerjaan (pekerja_id, nama_perusahaan, bidang_usaha, jabatan_terakhir, masa_awal, masa_akhir, alasan_keluar) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt_riwayat = mysqli_prepare($conn, $sql_riwayat);
                mysqli_stmt_bind_param($stmt_riwayat, 'issssss', $pekerja_id, $nama_perusahaan, $bidang_usaha, $jabatan_terakhir, $masa_awal, $masa_akhir, $alasan_keluar);
                mysqli_stmt_execute($stmt_riwayat);
                mysqli_stmt_close($stmt_riwayat);
            }

            // Jika berhasil, simpan data ke session
            $_SESSION['biodata'] = [
                'nama_perusahaan' => $nama_perusahaan,
                'bidang_usaha' => $bidang_usaha,
                'jabatan_terakhir' => $jabatan_terakhir,
                'masa_awal' => $masa_awal,
                'masa_akhir' => $masa_akhir,
                'alasan_keluar' => $alasan_keluar,
                'gambar_posisi' => $_POST['gambar_posisi'],
                'tanggung_jawab' => $_POST['tanggung_jawab'],
                'alasan_melamar' => $_POST['alasan_melamar'],
                'alasan_posisi' => $_POST['alasan_posisi'],
                'alasan_bekerja_posisi' => $_POST['alasan_bekerja_posisi'],
                'cita_citakarir' => $_POST['cita_citakarir'],
            ];
            
            // Menampilkan konfirmasi menggunakan JavaScript setelah pengisian database sukses
            echo "<script>
            if (confirm('Apakah anda yakin untuk menyimpan data ?')) {
                window.location.href = '../index.php';
            } else {
                window.history.back();
            }
            </script>";
            // Hapus data dari session setelah disimpan
            unset($_SESSION['calon_id']);
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link href="../assets/css/daftar.css" rel="stylesheet">
    <title>Form Riwayat Pekrjaan | Metland</title>
</head>

<body>
    <center>
        <img src="../assets/img/bg_metlan.png" alt="header" class="header-image">
    </center>
    <div style="background-color: white" class="container p-3 my-3 border">
        <h1 class="text-center">RIWAYAT PEKERJAAN (<i>WORK HISTORICAL</i>)</h1>
        <form id="form" method="POST" enctype="multipart/form-data">
            <div class="alert alert-secondary">
                <strong>Pengalaman Kerja dimulai dari pekerjaan yang terakhir ( Work Experience Start from the current job )</strong>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nama Perusahaan (<i>Company Name</i>)</label>
                        <input type="text" name="nama_perusahaan[]" class="form-control col-sm-12" placeholder="Masukkan Nama Perusahaan (Insert Company Name)" required>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Bidang Usaha (<i>Business Line</i>)</label>
                        <input type="text" name="bidang_usaha[]" class="form-control col-sm-12" placeholder="Masukkan Bidang Usaha (Insert Business Line)" required>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Jabatan Terakhir (<i>Last Position</i>)</label>
                        <input type="text" name="jabatan_terakhir[]" class="form-control col-sm-12" placeholder="Masukkan Jabatan Terakhir (Insert Last Postion)" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Masa Kerja (<i>Worked Period</i>)</label>
                        <p>Tanggal Awal Masuk (Entry Date)</p>
                        <input type="date" name="masa_awal[]" class="form-control mt-2">
                        <p>Tanggal Terakhir Masuk (Last Entry Date)</p>
                        <input type="date" name="masa_akhir[]" class="form-control mt-2">
                        <br>
                        <input type="text" name="alasan_keluar[]" class="form-control mt-2 " placeholder="Alasan Keluar (Reason for Leaving)">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Gambarkan posisi Anda pada struktur perusahaan terakhir (<i>Draw your position structure in the last company</i>)</label>
                        <div class="mb-3">
                            <p for="gambar_posisi" class="form-label">Upload Image</p>
                            <input type="file" class="form-control" id="gambar_posisi" name="gambar_posisi">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Uraikan secara singkat tugas & tanggung jawab anda (<i>Explain your Job Description</i>)</label>
                        <textarea class="form-control" name="tanggung_jawab" rows="2" placeholder="Uraian singkat tugas & tanggung jawab (Explain your Job Description)"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Alasan anda melamar di PT. Metropolitan Land Tbk / <i>The reason why do you willing to apply in PT. Metropolitan Land Tbk</i> ?</label>
                        <textarea class="form-control" name="alasan_melamar" rows="2" placeholder="Alasan melamar di  PT. Metropolitan Land Tbk (Reason apply in i PT. Metropolitan Land Tbk)"></textarea>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Jelaskan secara singkat apa yang anda ketahui tentang posisi yang anda lamar / <i>Explain your knowledge about the position you are applying</i> ?</label>
                        <textarea class="form-control" name="alasan_posisi" rows="2" placeholder="Penjelasan singkat posisi yang di lamar (Explain your knowledge about the position you are applying)"></textarea>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Mengapa anda ingin bekerja pada posisi tersebut / <i>Why do you want to apply in this position</i> ?</label>
                        <textarea class="form-control" name="alasan_bekerja_posisi" rows="2" placeholder="Mengapa anda ingin bekerja pada posisi tersebut / Why do you want to apply in this position"></textarea>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Apa cita-cita karir anda dalam 5 tahun kedepan / <i>What are your career goals for the next 5 years</i> ?</label>
                        <textarea class="form-control" name="cita_citakarir" rows="2" placeholder="cita - cita karir dalam 5 taun kedepan / your career goals for the next 5 years"></textarea>
                    </div>
                </div>
            </div>

            <center>
                <button type="submit" name="submit" class="btn btn-primary">Send</button>
                <button type="reset" name="reset" class="btn btn-secondary">Reset</button>
                <button type="button" class="btn btn-warning" onclick="window.location.href='index.php'">Kembali</button>
            </center>
        </form>
    </div>
    <center>
        <div style="background-color: blue;" class="container p-2 my-3 border">
            <h5 style="color: white;" class="text-center">Metland Karir ~ Copyright 2024 &#169;</h5>
        </div>
    </center>
</body>

</html>

