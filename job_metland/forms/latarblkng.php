<?php 
    session_start();
    include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link href="../assets/css/daftar.css" rel="stylesheet">
    <title>Latar Belakang Keluarga | Metland</title>
</head>

<body>
    <center>
        <img src="../assets/img/bg_metlan.png" alt="header" class="header-image">
    </center>
    <div style="background-color: white" class="container p-3 my-3 border">
        <h1 class="text-center">Latar Belakang Keluarga - Family History</h1>
        <form id="form" method="POST">
            <div class="alert alert-secondary">
                <strong>Susunan Anggota Keluarga (Family Member) - termasuk anda (including you)</strong>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nama Lengkap Ayah (<i>Father's Full Name</i>)<strong> *</strong></label>
                        <input type="text" name="ayah" class="form-control" placeholder="Masukkan Nama Ayah (Father's Full Name)" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Pendidikan Ayah (<i>Father's Education</i>)<strong> *</strong></label>
                        <input type="text" name="pendidikan_ayah" class="form-control" placeholder="Masukkan Pendidikan Ayah" required>
                    </div>

                    <div class="form-group">
                        <label>Pekerjaan Ayah (<i>Father's Occupation</i>)<strong> *</strong></label>
                        <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Masukkan Pekerjaan Ayah (Father's Occupation)" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tempat & Tanggal Lahir Ayah (<i>Father's Place & Date Of Birth</i>)<strong> *</strong></label>
                        <input type="text" name="tempat_ayah" class="form-control" placeholder="Masukkan Tempat Lahir Ayah (Father's Place Of Birth)" required>
                        <input type="date" name="tgl_lhrayah" class="form-control mt-2" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nama Lengkap Ibu (<i>Mother's Full Name</i>)<strong> *</strong></label>
                        <input type="text" name="ibu" class="form-control" placeholder="Masukkan Nama Ibu" required>
                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Pekerjaan Ibu (<i>Moter's Occupation</i>)<strong> *</strong></label>
                        <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Masukkan Pekerjaan Ibu (Mother's Occupation)" required>
                    </div>

                    <div class="form-group">
                        <label>Pendidikan Ibu (<i>Mother's Occupation</i>)<strong> *</strong></label>
                        <input type="text" name="pendidikan_ibu" class="form-control" placeholder="Masukkan Pendidikan Ibu (Mother's Education)" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tempat & Tanggal Lahir Ibu (<i>Mother's Place & Date Of Birth</i>)<strong> *</strong></label>
                        <input type="text" name="tempat_ibu" class="form-control" placeholder="Masukkan Tempat Lahir (Place Of Birth)" required>
                        <input type="date" name="tgl_lhribu" class="form-control mt-2" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Anak Pertama (<i>1st Children</i>)</label>
                        <input type="text" name="anak_pertama" class="form-control" placeholder="Nama Lengkap Anak Pertama (Fullname 1st Children)">
                        <input type="text" name="tempat_pertama" class="form-control mt-2" placeholder="Tempat Lahir (Place Of Birth)">
                        <input type="date" name="lahir_pertama" class="form-control mt-2">
                        <input type="text" name="pekerjaan_pertama" class="form-control mt-2" placeholder="Pekerjaan (Occupation)">
                        <input type="text" name="pendidikan_pertama" class="form-control mt-2" placeholder="Pendidikan (Education)">
                    </div>
                </div>
            </div>

            <!-- Anak Kedua -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Anak Kedua (<i>2nd Children</i>)</label>
                        <input type="text" name="anak_kedua" class="form-control" placeholder="Nama Lengkap Anak Kedua (Full Name 2nd Children)">
                        <input type="text" name="tempat_kedua" class="form-control mt-2" placeholder="Tempat Lahir (Place Of Birth)">
                        <input type="date" name="lahir_kedua" class="form-control mt-2">
                        <input type="text" name="pekerjaan_kedua" class="form-control mt-2" placeholder="Pekerjaan (Occupation)">
                        <input type="text" name="pendidikan_kedua" class="form-control mt-2" placeholder="Pendidikan (Education)">
                    </div>
                </div>
            </div>

            <!-- Anak Ketiga -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Anak Ketiga (<i>3rd Children</i>)</label>
                        <input type="text" name="anak_ketiga" class="form-control" placeholder="Nama Lengkap Anak Ketiga (Full Name 3rd Children)">
                        <input type="text" name="tempat_ketiga" class="form-control mt-2" placeholder="Tempat Lahir (Place Of Birth)">
                        <input type="date" name="lahir_ketiga" class="form-control mt-2">
                        <input type="text" name="pekerjaan_ketiga" class="form-control mt-2" placeholder="Pekerjaan (Occupation)">
                        <input type="text" name="pendidikan_ketiga" class="form-control mt-2" placeholder="Pendidikan (Education)">
                    </div>
                </div>
            </div>

            <!-- Anak Keempat -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Anak Keempat (<i>4rd Children</i>)</label>
                        <input type="text" name="anak_keempat" class="form-control" placeholder="Nama Lengkap Anak Keempat (Full Name 4rd Children)">
                        <input type="text" name="tempat_keempat" class="form-control mt-2" placeholder="Tempat Lahir (Place Of Birth)">
                        <input type="date" name="lahir_keempat" class="form-control mt-2">
                        <input type="text" name="pekerjaan_keempat" class="form-control mt-2" placeholder="Pekerjaan (Occupation)">
                        <input type="text" name="pendidikan_keempat" class="form-control mt-2" placeholder="Pendidikan (Education)">
                    </div>
                </div>
            </div>

            <!-- Anak Kelima -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Anak Kelima :</label>
                        <input type="text" name="anak_kelima" class="form-control" placeholder="Masukkan Nama Anak Kelima (Full Name 5th Children)">
                        <input type="text" name="tempat_kelima" class="form-control mt-2" placeholder="Tempat Lahir (Place Of Birth)">
                        <input type="date" name="lahir_kelima" class="form-control mt-2">
                        <input type="text" name="pekerjaan_kelima" class="form-control mt-2" placeholder="Pekerjaan (Occupation)">
                        <input type="text" name="pendidikan_kelima" class="form-control mt-2" placeholder="Pendidikan (Education)">
                    </div>
                </div>
            </div>

            <div class="alert alert-secondary">
                <strong>Susunan Anggota Keluarga (Family Member) - termasuk anda (including you)</strong>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Suami / Istri (<i>Husband / Wife</i>)</label>
                        <br>
                        <input type="radio" name="suami_istri" value="Suami"> Suami / <i>Husband</i>
                        <input type="radio" name="suami_istri" value="Istri"> Istri / <i>Wife</i>
                        <br>
                        <br>
                        <input type="text" name="nama_suamiistri" class="form-control" placeholder="Masukkan Nama Lengkap (Insert Full Name)">
                        <br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                        <div class="form-group">       
                            <label>Pekerjaan (<i>Occupation</i>)</label>
                            <input type="text" name="pekerjaan_suamiistri" class="form-control" placeholder="Masukkan Pekerjaan (Insert Occupation)">
                        </div>

                        <div class="form-group">
                            <label>Pendidikan (<i>Education</i>) </label>
                            <input type="text" name="pend_suamiistri" class="form-control" placeholder="Masukkan Pendidikan (Insert Education)">
                        </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tempat & Tanggal Lahir (<i>Place & Date Of Birth</i>)</label>
                        <input type="text" name="tmpt_suamiistri" class="form-control" placeholder="Masukkan Tempat Lahir (Insert Place Of Birth)">
                        <input type="date" name="tgl_suamiistri" class="form-control mt-2">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Anak Pertama (<i>1st Children</i>)</label>
                        <input type="text" name="anak_pertama" class="form-control" placeholder="Masukkan Nama Lengkap Anak (Insert Cildren Full Name)">
                        <input type="text" name="tempat_pertama" class="form-control mt-2" placeholder="Tempat Lahir (Place of Birth)">
                        <input type="date" name="lahir_pertama" class="form-control mt-2">
                        <input type="text" name="pekerjaan_pertama" class="form-control mt-2" placeholder="Pekerjaan (Occupation)">
                        <input type="text" name="pendidikan_pertama" class="form-control mt-2" placeholder="Pendidikan (Education)">
                    </div>
                </div>
            </div>

            <!-- Anak Kedua -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Anak Kedua :</label>
                        <input type="text" name="anak_kedua" class="form-control" placeholder="Masukkan Nama Lengkap Anak (Insert Cildren Full Name)">
                        <input type="text" name="tempat_kedua" class="form-control mt-2" placeholder="Tempat Lahir (Place of Birth)">
                        <input type="date" name="lahir_kedua" class="form-control mt-2">
                        <input type="text" name="pekerjaan_kedua" class="form-control mt-2" placeholder="Pekerjaan (Occupation)">
                        <input type="text" name="pendidikan_kedua" class="form-control mt-2" placeholder="Pendidikan (Education)">
                    </div>
                </div>
            </div>

            <!-- Anak Ketiga -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Anak Ketiga :</label>
                        <input type="text" name="anak_ketiga" class="form-control" placeholder="Masukkan Nama Lengkap Anak (Insert Cildren Full Name)">
                        <input type="text" name="tempat_ketiga" class="form-control mt-2" placeholder="Tempat Lahir (Place of Birth)">
                        <input type="date" name="lahir_ketiga" class="form-control mt-2">
                        <input type="text" name="pekerjaan_ketiga" class="form-control mt-2" placeholder="Pekerjaan (Occupation)">
                        <input type="text" name="pendidikan_ketiga" class="form-control mt-2" placeholder="Pendidikan (Education)">
                    </div>
                </div>
            </div>

            <center>
                <button type="submit" name="submit" class="btn btn-primary">Next</button>
                <button type="reset" name="reset" class="btn btn-secondary">Reset</button>
                <button type="button" class="btn btn-warning" onclick="window.location.href='../pendaftaran.php'">Kembali</button>
            </center>
        </form>
    </div>
    <center>
        <div style="background-color: #d3d3d3;" class="container p-2 my-2 border">
            <h5 style="color: black;" class="text-center">Metland Karir ~ Copyright 2024 &#169;</h5>
        </div>
    </center>
</body>

</html>

<?php 
// Periksa apakah form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari session
    $pendaftaran = isset($_SESSION['pendaftaran']) ? $_SESSION['pendaftaran'] : [];
    $id_calon= $_SESSION['calon_id'];
    // Ambil data dari form
    $pendaftaran['ayah'] = $_POST['ayah'];
    $pendaftaran['ibu'] = $_POST['ibu'];
    $pendaftaran['tempat_ayah'] = $_POST['tempat_ayah'];
    $pendaftaran['tempat_ibu'] = $_POST['tempat_ibu'];
    $pendaftaran['tgl_lhrayah'] = $_POST['tgl_lhrayah'];
    $pendaftaran['tgl_lhribu'] = $_POST['tgl_lhribu'];
    $pendaftaran['pekerjaan_ayah'] = $_POST['pekerjaan_ayah'];
    $pendaftaran['pekerjaan_ibu'] = $_POST['pekerjaan_ibu'];
    $pendaftaran['pendidikan_ayah'] = $_POST['pendidikan_ayah'];
    $pendaftaran['pendidikan_ibu'] = $_POST['pendidikan_ibu'];
    $pendaftaran['anak_pertama'] = $_POST['anak_pertama'];
    $pendaftaran['anak_kedua'] = $_POST['anak_kedua'];
    $pendaftaran['anak_ketiga'] = $_POST['anak_ketiga'];
    $pendaftaran['anak_keempat'] = $_POST['anak_keempat'];
    $pendaftaran['anak_kelima'] = $_POST['anak_kelima'];
    // Periksa apakah suami/istri dipilih
    if (isset($_POST['suami_istri']) && !empty($_POST['suami_istri'])) {
        $pendaftaran['suami_istri'] = $_POST['suami_istri'];
    } else {
        $pendaftaran['suami_istri'] = '-'; // Jika tidak ada, simpan "-"
    }
    $pendaftaran['pekerjaan_pertama'] = $_POST['pekerjaan_pertama'];
    $pendaftaran['pekerjaan_kedua'] = $_POST['pekerjaan_kedua'];
    $pendaftaran['pekerjaan_ketiga'] = $_POST['pekerjaan_ketiga'];
    $pendaftaran['pekerjaan_keempat'] = $_POST['pekerjaan_keempat'];
    $pendaftaran['pekerjaan_kelima'] = $_POST['pekerjaan_kelima'];
    $pendaftaran['tempat_pertama'] = $_POST['tempat_pertama'];
    $pendaftaran['tempat_kedua'] = $_POST['tempat_kedua'];
    $pendaftaran['tempat_ketiga'] = $_POST['tempat_ketiga'];
    $pendaftaran['tempat_keempat'] = $_POST['tempat_keempat'];
    $pendaftaran['tempat_kelima'] = $_POST['tempat_kelima'];
    $pendaftaran['lahir_pertama'] = $_POST['lahir_pertama'];
    $pendaftaran['lahir_kedua'] = $_POST['lahir_kedua'];
    $pendaftaran['lahir_ketiga'] = $_POST['lahir_ketiga'];
    $pendaftaran['lahir_keempat'] = $_POST['lahir_keempat'];
    $pendaftaran['lahir_kelima'] = $_POST['lahir_kelima'];
    $pendaftaran['pendidikan_pertama'] = $_POST['pendidikan_pertama'];
    $pendaftaran['pendidikan_kedua'] = $_POST['pendidikan_kedua'];
    $pendaftaran['pendidikan_ketiga'] = $_POST['pendidikan_ketiga'];
    $pendaftaran['pendidikan_keempat'] = $_POST['pendidikan_keempat'];
    $pendaftaran['pendidikan_kelima'] = $_POST['pendidikan_kelima'];
    $pendaftaran['nama_suamiistri'] = $_POST['nama_suamiistri'];
    $pendaftaran['tgl_suamiistri'] = $_POST['tgl_suamiistri'];
    $pendaftaran['tmpt_suamiistri'] = $_POST['tmpt_suamiistri'];
    $pendaftaran['pekerjaan_suamiistri'] = $_POST['pekerjaan_suamiistri'];
    $pendaftaran['pend_suamiistri'] = $_POST['pend_suamiistri'];

     
    // Simpan data ke dalam session
    $_SESSION['pendaftaran'] = $pendaftaran;

    // Simpan data ke dalam database
    $sql_simpan = "INSERT INTO tb_formkeluarga (id_diri, ayah, ibu, tempat_ayah, tempat_ibu, tgl_lhrayah, tgl_lhribu, pekerjaan_ayah, pekerjaan_ibu, pendidikan_ayah, pendidikan_ibu, anak_pertama, anak_kedua, anak_ketiga, anak_keempat, anak_kelima, suami_istri, pekerjaan_pertama, pekerjaan_kedua, pekerjaan_ketiga, pekerjaan_keempat, pekerjaan_kelima, tempat_pertama, tempat_kedua, tempat_ketiga, tempat_keempat, tempat_kelima, lahir_pertama, lahir_kedua, lahir_ketiga, lahir_keempat, lahir_kelima, pendidikan_pertama, pendidikan_kedua, pendidikan_ketiga, pendidikan_keempat, pendidikan_kelima, nama_suamiistri, tgl_suamiistri, tmpt_suamiistri, pekerjaan_suamiistri, pend_suamiistri) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql_simpan);

    if ($stmt) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, 'isssssssssssssssssssssssssssssssssssssssss', 
      $id_calon,
    $pendaftaran['ayah'], 
            $pendaftaran['ibu'], 
            $pendaftaran['tempat_ayah'], 
            $pendaftaran['tempat_ibu'], 
            $pendaftaran['tgl_lhrayah'], 
            $pendaftaran['tgl_lhribu'], 
            $pendaftaran['pekerjaan_ayah'], 
            $pendaftaran['pekerjaan_ibu'], 
            $pendaftaran['pendidikan_ayah'], 
            $pendaftaran['pendidikan_ibu'], 
            $pendaftaran['anak_pertama'], 
            $pendaftaran['anak_kedua'], 
            $pendaftaran['anak_ketiga'], 
            $pendaftaran['anak_keempat'], 
            $pendaftaran['anak_kelima'], 
            $pendaftaran['suami_istri'], 
            $pendaftaran['pekerjaan_pertama'], 
            $pendaftaran['pekerjaan_kedua'], 
            $pendaftaran['pekerjaan_ketiga'], 
            $pendaftaran['pekerjaan_keempat'], 
            $pendaftaran['pekerjaan_kelima'], 
            $pendaftaran['tempat_pertama'], 
            $pendaftaran['tempat_kedua'], 
            $pendaftaran['tempat_ketiga'], 
            $pendaftaran['tempat_keempat'], 
            $pendaftaran['tempat_kelima'], 
            $pendaftaran['lahir_pertama'], 
            $pendaftaran['lahir_kedua'], 
            $pendaftaran['lahir_ketiga'], 
            $pendaftaran['lahir_keempat'], 
            $pendaftaran['lahir_kelima'], 
            $pendaftaran['pendidikan_pertama'], 
            $pendaftaran['pendidikan_kedua'], 
            $pendaftaran['pendidikan_ketiga'], 
            $pendaftaran['pendidikan_keempat'], 
            $pendaftaran['pendidikan_kelima'], 
            $pendaftaran['nama_suamiistri'], 
            $pendaftaran['tgl_suamiistri'], 
            $pendaftaran['tmpt_suamiistri'], 
            $pendaftaran['pekerjaan_suamiistri'], 
            $pendaftaran['pend_suamiistri']
        );

        // Eksekusi
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
            if (confirm('Apakah anda yakin untuk ke form selanjutnya?')) {
                window.location.href = 'pendidikan.php';
            } else {
                window.history.back();
            }
            </script>";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>