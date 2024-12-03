<?php 
    session_start();
    include 'koneksi.php';
?>
<?php 
if (isset($_POST['submit'])) {
    $sql_simpan = "INSERT INTO tb_datadiri (nama, jekel, tempat_lahir, tgl_lahir, tlp_mo, tlp_home, email, agama, medsos, alamat, alamat_ktp, no_ktp, no_kk, no_npwp, no_rek, cabang, kewarganegaraan, status_kawin, thn_menikah, thn_janda, posisi, penempatan_job) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = mysqli_prepare($conn, $sql_simpan);
    
    if ($stmt) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, 'ssssssssssssssssssssss', $_POST['nama'], $_POST['jekel'], $_POST['tempat_lahir'], $_POST['tgl_lahir'], $_POST['tlp_mo'], $_POST['tlp_home'], $_POST['email'], $_POST['agama'], $_POST['medsos'], $_POST['alamat'], $_POST['alamat_ktp'], $_POST['no_ktp'], $_POST['no_kk'], $_POST['no_npwp'], $_POST['no_rek'], $_POST['cabang'], $_POST['kewarganegaraan'], $_POST['status_kawin'], $_POST['thn_menikah'], $_POST['thn_janda'], $_POST['posisi'], $_POST['penempatan_job']);
        
        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            $id_calon = mysqli_stmt_insert_id($conn);

            $_SESSION['calon_id'] = $id_calon;
            // Jika berhasil, simpan data ke session
            $_SESSION['biodata'] = [
                'nama' => $_POST['nama'],
                'jekel' => $_POST['jekel'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tgl_lahir' => $_POST['tgl_lahir'],
                'tlp_mo' => $_POST['tlp_mo'],
                'tlp_home' => $_POST['tlp_home'],
                'email' => $_POST['email'],
                'agama' => $_POST['agama'],
                'medsos' => $_POST['medsos'],
                'alamat' => $_POST['alamat'],
                'alamat_ktp' => $_POST['alamat_ktp'],
                'no_ktp' => $_POST['no_ktp'],
                'no_kk' => $_POST['no_kk'],
                'no_npwp' => $_POST['no_npwp'],
                'no_rek' => $_POST['no_rek'],
                'cabang' => $_POST['cabang'],
                'kewarganegaraan' => $_POST['kewarganegaraan'],
                'status_kawin' => $_POST['status_kawin'],
                'thn_menikah' => $_POST['thn_menikah'],
                'thn_janda' => $_POST['thn_janda'],
                'posisi' => $_POST['posisi'],
                'penempatan_job' => $_POST['penempatan_job'],
            ];
            
            // Menampilkan konfirmasi menggunakan JavaScript setelah pengisian database sukses
            echo "<script>
            if (confirm('Apakah anda yakin untuk ke form selanjutnya?')) {
                window.location.href = 'forms/latarblkng.php';
            } else {
                window.history.back();
            }
            </script>";
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="assets/css/daftar.css" rel="stylesheet">
    <title>Data Pribadi</title>
</head>

<body>
    <center>
        <img src="assets/img/bg_metlan.png" alt="header" class="header-image">
    </center>
    <div style="background-color: white" class="container p-3 my-3 border">
        <h1 class="text-center">DATA PRIBADI</h1>
        <form id="form" method="POST">
            <div class="alert alert-secondary">
                <strong>IDENTITAS PRIBADI</strong>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nama Lengkap (<i>Full Name</i>) <strong >*</strong></label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Posisi Melamar Dan Penempatan Pekerjaan (<i>Job Apply and  Job Alocated</i>)  <strong >*</strong></label>
                        <input type="text" name="posisi" class="form-control" placeholder="Posisi Melamar (Job Apply)" required>
                        <input type="text" name="penempatan_job" class="form-control mt-2" placeholder="Penempatan Pekerjaan (Job Alocated)">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Agama (<i>Religion</i>) <strong >*</strong></label>
                        <select name="agama" class="form-control" required>
                            <option value="" disabled selected>Pilih Agama</option>
                            <option name="agama" value="Islam">Islam</option>
                            <option name="agama" value="Hindu">Hindu</option>
                            <option name="agama" value="Kristen Protestan">Kristen Protestan</option>
                            <option name="agama" value="Kristen Katolik">Kristen Katolik</option>
                            <option name="agama" value="Buddha">Buddha</option>
                            <option name="agama" value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Jenis Kelamin (<i>Sex</i>) <strong >*</strong></label>
                        <br>
                        <input type="radio" name="jekel" value="Pria" required> Pria
                        <br>
                        <input type="radio" name="jekel" value="Wanita" required> Wanita
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tempat & Tanggal Lahir (<i>Place & Date Of Birth </i>) <strong>*</strong></label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" required>
                        <input type="date" name="tgl_lahir" class="form-control mt-2" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Telepon (<I>Telephone</I>) <strong>*</strong></label>
                        <input type="text" name="tlp_mo" class="form-control" placeholder="Mobile" required>
                        <input type="text" name="tlp_home" class="form-control mt-2" placeholder="Home (opsional)">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email (<i>E-mail</i>):</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan E-mail" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Alamat tinggal saat ini (<i>Current Addres</i>) <strong>*</strong></label>
                        <textarea class="form-control" name="alamat" rows="2" placeholder="Masukkan Alamat tinggal saat ini" required></textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Alamat sesuai KTP (<i>Address based Identity Card</i>) <strong>*</strong></label>
                        <textarea class="form-control" name="alamat_ktp" rows="2" placeholder="Masukkan Alamat sesuai KTP" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Media Sosial (<i>Social Media</i>)</label>
                        <input type="text" name="medsos" class="form-control" placeholder="Masukkan Social Media">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No. KTP / SIM / Passport <strong>*</strong></label>
                        <input type="text" name="no_ktp" class="form-control" placeholder="Masukkan No. KTP / SIM / Passport" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No KK (Kartu Keluarga) / <i>Family Card Number</i> <strong>*</strong></label>
                        <input type="text" name="no_kk" class="form-control" placeholder="Masukkan No KK" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No NPWP (<i>Tin Number</i>) <strong>*</strong></label>
                        <input type="text" name="no_npwp" class="form-control" placeholder="Masukkan No NPWP" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No Rek Mandiri / Cabang (<i>Mandiri Bank Account</i>) <strong>*</strong></label>
                        <input type="text" name="no_rek" class="form-control" placeholder="Masukkan No Rek Mandiri" required>
                        <input type="text" name="cabang" class="form-control mt-2" placeholder="Masukkan Cabang" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kewarganegaraan / Suku (<i>Nationality/Ethnic</i>) <strong>*</strong></label>
                        <input type="text" name="kewarganegaraan" class="form-control" placeholder="Masukkan Kewarganegaraan / Suku" required>
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                    <div class="form-group">
                        <label>Status Perkawinan (<i>Marital Status</i>) <strong>*</strong></label>
                        <br>
                        <input type="radio" name="status_kawin" value="Belum Menikah" required> Belum Menikah/Single
                        <br>
                        <input type="radio" name="status_kawin" value="Menikah"> Menikah/Married
                        <input type="text" name="thn_menikah" class="form-control mt-2" placeholder="Tahun">
                        <br>
                        <input type="radio" name="status_kawin" value="Janda/Duda"> Janda/Widow Duda/Widower
                        <input type="text" name="thn_janda" class="form-control mt-2" placeholder="Tahun">
                    </div>
                </div>
            </div>
            <center>
                <button type="submit" name="submit" class="btn btn-primary">Next</button>
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

