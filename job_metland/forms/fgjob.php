<?php 
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
    <title>FG Karir | Metland</title>

    <link href="../assets/img/metland_nbg.png" rel="icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showEducationFields() {
            var pendidikan = document.getElementById("pendidikan").value;
            document.getElementById("sarjanaFields").style.display = (pendidikan === "Sarjana" || pendidikan === "Pasca Sarjana") ? "block" : "none";
            document.getElementById("pascaSarjanaFields").style.display = (pendidikan === "Pasca Sarjana") ? "block" : "none";
            document.getElementById("diplomaFields").style.display = (pendidikan === "Diploma") ? "block" : "none";
        }

        function addPengalamanOrganisasi() {
        const container = document.getElementById('pengalamanOrganisasiContainer');
        const newForm = `
            <div class="row pengalaman-organisasi">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Organisasi (<i>Organization Name</i>)</label>
                        <input type="text" name="nama_organisasi[]" class="form-control" placeholder="Nama Organisasi (Organization name)">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Jabatan Organisasi (<i>Organization Title</i>)</label>
                        <input type="text" name="jabatan_organisasi[]" class="form-control" placeholder="Jabatan Organisasi (Organization title)">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Keterangan (Note)</label>
                        <textarea name="ket_organisasi[]" rows="2" class="form-control" placeholder="Keterangan (Note)"></textarea>
                    </div>
                </div>

                <div class="col-sm-12 mb-4">
                    <button type="button" class="btn btn-danger" onclick="removePengalamanOrganisasi(this)">Remove</button>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newForm);
    }

    function addPengalamanKerja() {
        const container = document.getElementById('pengalamanKerjaContainer');
        const newForm = `
            <div class="row pengalaman-kerja">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Perusahaan (<i>Company Name</i>)</label>
                        <input type="text" name="nama_perusahaan[]" class="form-control" placeholder="Nama Perusahaan (Company name)">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Masa Kerja (<i>Worked Period</i>)</label>
                        <input type="text" name="masa_kerja[]" class="form-control" placeholder="Masa Kerja (Worked Period)">
                    </div>
                </div>
                <div class="col-sm-6">
                        <label>Level Jabatan (<i>Job Level</i>)</label>
                        <input type="text" name="level_kerja[]" class="form-control" placeholder="Level Jabatan (Job Level)">
                </div>
                <div class="col-sm-6">
                        <div class="form-group">
                            <label>Pengalaman Posisi Kerja (<i>Work Position Experience</i>)</label>
                            <input name="posisi_kerja[]" rows="2" class="form-control" placeholder="Pengalaman Posisi Kerja (Work Position Experience)"> 
                        </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Keterangan (Note)</label>
                        <textarea name="ket_kerja[]" rows="2" class="form-control" placeholder="Keterangan (Note)"></textarea>
                    </div>
                </div>

                <div class="col-sm-12 mb-4">
                    <button type="button" class="btn btn-danger" onclick="removePengalamanKerja(this)">Remove</button>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newForm);
    }
    function removePengalamanOrganisasi(button) {
        const formGroup = button.closest('.pengalaman-organisasi');
        formGroup.remove();
    }

    function removePengalamanKerja(button) {
        const formGroup = button.closest('.pengalaman-kerja');
        formGroup.remove();
    }
    </script>
</head>

<body>
    <!-- <center>
        <img src="assets/img/bg_metlan.png" alt="header" class="header-image">
    </center> -->
    <div style="background-color: white" class="container p-3 my-3 border">
        <h1 class="text-center mb-3">FORMULIR LAMARAN KERJA</h1>
        <form id="form" method="POST" enctype="multipart/form-data">
            <div class="alert alert-secondary">
                <strong>FORMULIR PRIBADI & POSISI PEKERJAAN</strong>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nama Lengkap (<i>Full Name</i>) <strong style="color: red;">*</strong></label>
                        <input type="text" name="nama_fg" class="form-control" placeholder="Masukkan Nama Lengkap (Insert Full Name)" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>Tempat & Tanggal Lahir (<i>Place & Date Of Birth </i>) <strong style="color: red;">*</strong></label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="tempat_lahirfg" class="form-control" placeholder="Tempat Lahir (Place Of Birth)" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="tanggal_lahirfg" class="form-control"  placeholder="Tanggal Lahir (Date Of Birth)" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Posisi Dilamar (<i>Position Applied</i>) <strong style="color: red;">*</strong></label>
                        <input type="text" name="job_available" class="form-control" placeholder="Posisi Dilamar (Postion Applied)" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Jenis Kelamin (<i>Sex</i>) <strong style="color: red;">*</strong></label>
                        <select name="jekel" class="form-control" required>
                            <option value="" disabled selected>--- Jenis Kelamin (<i>Sex</i>) ---</option>
                            <option name="jekel" value="Pria">Pria</option>
                            <option name="jekel" value="Wanita">Wanita</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                    <div class="form-group">
                        <label>Pendidikan (<i>Education</i>) <strong style="color: red;">*</strong></label>
                        <select name="pendidikan_fg" id="pendidikan" class="form-control" required onchange="showEducationFields()">
                            <option value="" disabled selected>Pilih Pendidikan</option>
                            <option name="pendidikan_fg" value="Sarjana">Sarjana</option>
                            <option name="pendidikan_fg" value="Pasca Sarjana">Pasca Sarjana</option>
                            <option name="pendidikan_fg" value="Diploma">Diploma</option>
                        </select>
                    </div>
                </div>
            </div>

            <div id="sarjanaFields" style="display: none;">
                <div class="alert alert-secondary">
                    <strong>Sarjana</strong>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Universitas (<i>University</i>)</label>
                            <input type="text" name="universitas_s" class="form-control" placeholder="universitas (University)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jurusan (<i>Major</i>) <strong>*</strong></label>
                            <input type="text" name="jurusan_s" class="form-control" placeholder="Masukkan Jurusan Anda (Insert Your Major)">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Periode Lulus(<i>Graduation Period</i>) <strong>*</strong></label>
                            <input type="text" name="periode_s" class="form-control" placeholder="Masukkan Periode Lulus Anda (Insert Your Graduation Period)">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>IPK Score</label>
                            <p>Minimal Score 3.75</p>
                            <input type="text" name="ipk_s" class="form-control" placeholder="Masukkan Nilai IPK (Insert IPK Score)">
                        </div>
                    </div>
                </div>
            </div>

            <div id="pascaSarjanaFields" style="display:none;">
                <div class="alert alert-secondary">
                    <strong>Pasca Sarjana</strong>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Universitas (<i>University</i>)</label>
                            <input type="text" name="universitas_pasca" class="form-control" placeholder="universitas (University)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jurusan (<i>Major</i>)</label>
                            <input type="text" name="jurusan_pasca" class="form-control" placeholder="Masukkan Jurusan Anda (Insert Your Major)">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Periode Lulus(<i>Graduation Period</i>)</label>
                            <input type="text" name="periode_pasca" class="form-control" placeholder="Masukkan Periode Lulus Anda (Insert Your Graduation Period)">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>IPK Score </label>
                            <p>Minimal Score 3.75</p>
                            <input type="text" name="ipk_pasca" class="form-control" placeholder="Masukkan Nilai IPK (insert IPK Score)">
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="diplomaFields" style="display:none;">
                <div class="alert alert-secondary">
                    <strong>Diploma</strong>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Universitas (<i>University</i>)</label>
                            <input type="text" name="universitas_d" class="form-control" placeholder="universitas (University)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jurusan (<i>Major</i>)</label>
                            <input type="text" name="jurusan_d" class="form-control" placeholder="Masukkan Jurusan Anda (Insert Your Major)">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Periode Lulus(<i>Graduation Period</i>)</label>
                            <input type="text" name="periode_d" class="form-control" placeholder="Masukkan Periode Lulus Anda (Insert Your Graduation Period)">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>IPK Score </label>
                            <p>Minimal Score 3.75</p>
                            <input type="text" name="ipk_d" class="form-control" placeholder="Masukkan Nilai Ipk (Insert IPK Score)">
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-secondary">
                <strong>Pengalaman Organisasi</strong>
            </div>
            <div id="pengalamanOrganisasiContainer">
                <div class="row pengalaman-organisasi">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Organisasi (<i>Organization Name</i>)</label>
                            <input type="text" name="nama_organisasi[]" class="form-control" placeholder="nama organisasi (Organization name)">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jabatan Organisasi (<i>Organization Title</i>)</label>
                            <input type="text" name="jabatan_organisasi[]" class="form-control" placeholder="jabatan organisasi (Organization title)">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Keterangan (<i>Note</i>) </label>
                            <textarea name="ket_organisasi[]" rows="2" class="form-control" placeholder="Keterangan (Note)"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-success mb-4" onclick="addPengalamanOrganisasi()">Tambah Pengalaman (<i>Add Experience</i>)</button>

            <div class="alert alert-secondary">
                <strong>Pengalaman Kerja (Job Experience)</strong>
            </div>
            <div id="pengalamanKerjaContainer">
                <div class="row pengalaman-kerja">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Perusahaan (<i>Company Name</i>)</label>
                            <input type="text" name="nama_perusahaan[]" class="form-control" placeholder="nama Perusahaan (Company name)"/> 
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Masa Kerja (<i>Worked Period</i>)</label>
                            <input type="text" name="masa_kerja[]" class="form-control" placeholder="nama Perusahaan (Company name)"/>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Level Jabatan (<i>Job Level</i>) <strong >*</strong></label>
                            <input type="text" name="level_kerja[]" class="form-control" placeholder="Level Jabatan (Job Level)">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Pengalaman Posisi Kerja (<i>Work Position Experience</i>)</label>
                            <input name="posisi_kerja[]" rows="2" class="form-control" placeholder="Pengalaman Posisi Kerja (Work Position Experience)"/>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Keterangan (<i>Note</i>) </label>
                            <textarea name="ket_kerja[]" rows="2" class="form-control mb-3" placeholder="Keterangan (Note)"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-success mb-4" onclick="addPengalamanKerja()">Tambah Pengalaman Kerja (<i>Add Experience Work</i>)</button>

            <div class="row">
                <div class="col-sm-12 mt-3">
                    <div class="form-group">
                        <label>Upload CV</label>
                        <div class="mb-3">
                            <p for="upload_cv" class="form-label">Upload CV (pdf)</p>
                            <input type="file" class="form-control" id="upload_cv" name="upload_cv">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" name="bersedia_metlan" type="checkbox" value="Bersedia" id="flexCheckDefault" required>
                <label class="form-check-label" for="flexCheckDefault">
                    Bersedia ditempatkan diseluruh unit Metland
                </label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" name="pernyataan_data" type="checkbox" value="Benar" id="flexCheckDefault" required>
                <p class="form-check-label" for="flexCheckDefault">
                    Dengan ini saya menyatakan bahwa informasi yang saya berikan adalah benar. Apabila terdapat informasi yang tidak benar maka saya bersedia mempertanggungjawabkan segala akibatnya. 
                    Saya memahami bahwa keputusan diterima atau tidaknya lamaran saya tergantung pada proses seleksi berikutnya.<strong style="color: red;"> *</strong>
                </p>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" name="setuju_data" type="checkbox" value="Setuju" id="flexCheckDefault" required>
                <p class="form-check-label" for="flexCheckDefault">
                Terkait dengan pelindungan data pribadi, saya dengan ini menyetujui untuk mengikuti ketentuan pengelolaan data pribadi yang berlaku di PT. Metropolitan Land, Tbk.<strong style="color: red;"> *</strong>
                </p>
            </div>

            <center>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="reset" name="reset" class="btn btn-secondary">Reset</button>
                <button type="button" class="btn btn-warning" onclick="window.location.href='../index.php'">Kembali</button>
            </center>
        </form>
    </div>
    <center>
        <div style="background-color: #d3d3d3;" class="container p-2 my-3 border">
            <h5 style="color: black;" class="text-center">Metland Karir ~ Copyright 2024 &#169;</h5>
        </div>
    </center>
</body>

</html>

<?php 
    if (isset($_POST['submit'])) {

      $universitas_s = !empty($_POST['universitas_s']) ? $_POST['universitas_s'] : '-';
      $jurusan_s = !empty($_POST['jurusan_s']) ? $_POST['jurusan_s'] : '-';
      $periode_s = !empty($_POST['periode_s']) ? $_POST['periode_s'] : '-';
      $ipk_s = !empty($_POST['ipk_s']) ? $_POST['ipk_s'] : '-';

      $universitas_pasca = !empty($_POST['universitas_pasca']) ? $_POST['universitas_pasca'] : '-';
      $jurusan_pasca = !empty($_POST['jurusan_pasca']) ? $_POST['jurusan_pasca'] : '-';
      $periode_pasca = !empty($_POST['periode_pasca']) ? $_POST['periode_pasca'] : '-';
      $ipk_pasca = !empty($_POST['ipk_pasca']) ? $_POST['ipk_pasca'] : '-';

      $universitas_d = !empty($_POST['universitas_d']) ? $_POST['universitas_d'] : '-';
      $jurusan_d = !empty($_POST['jurusan_d']) ? $_POST['jurusan_d'] : '-';
      $periode_d = !empty($_POST['periode_d']) ? $_POST['periode_d'] : '-';
      $ipk_d = !empty($_POST['ipk_d']) ? $_POST['ipk_d'] : '-';
      
      $nama_organisasi = isset($_POST['nama_organisasi']) && !empty($_POST['nama_organitation']) ? implode('.', $_POST['nama_organisasi']) : '-';
      $jabatan_organisasi = isset($_POST['jabatan_organisasi']) && !empty($_POST['jabatan_organitation']) ? implode('.', $_POST['jabatan_organisasi']) : '-';
      $ket_organisasi = isset($_POST['ket_organisasi']) && !empty($_POST['ket_organitation']) ? implode('.', $_POST['ket_organisasi']) : '-';
    
      $nama_perusahaan = isset($_POST['nama_perusahaan']) && !empty($_POST['nama_perushaan']) ? implode('.', $_POST['nama_perusahaan']) : '-';
      $level_kerja = isset($_POST['level_kerja']) && !empty($_POST['level_job']) ? implode('.', $_POST['level_kerja']) : '-';
      $masa_kerja = isset($_POST['masa_kerja']) && !empty($_POST['masa_job']) ? implode('.', $_POST['masa_kerja']) : '-';
      $ket_kerja = isset($_POST['ket_kerja']) && !empty($_POST['ket_job']) ? implode('.', $_POST['ket_kerja']) : '-';
      $posisi_kerja = isset($_POST['posisi_kerja']) && !empty($_POST['posisi_job']) ? implode('.', $_POST['posisi_kerja']) : '-';
      
      $bersedia_metlan = isset($_POST['bersedia_metlan']) ? $_POST['bersedia_metlan'] : "Tidak Bersedia";
      $pernyataan_data = isset($_POST['pernyataan_data']) ? $_POST['pernyataan_data'] : "Salah";
      $setuju_data = isset($_POST['setuju_data']) ? $_POST['setuju_data'] : "Tidak Setuju";

      // Logika untuk mengupload file
      if (isset($_FILES['upload_cv'])) {
        $file = $_FILES['upload_cv'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        // Memeriksa apakah file adalah PDF
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 3000000) { // Maksimal ukuran file 1MB
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../assets/cv_freshgrad/' . $fileNameNew; 
                    move_uploaded_file($fileTmpName, $fileDestination);
                    // File berhasil diupload
                } else {
                    echo "File Maksimal 3 MB";
                }
            } else {
                echo "Ada kesalahan saat mengupload file!";
            }
        } else {
            echo "Hanya file PDF yang diperbolehkan!";
        }
      }

      $sql_simpan = "INSERT INTO tb_fg (nama_fg, tempat_lahirfg, tanggal_lahirfg, pendidikan_fg, jurusan_s, periode_s, ipk_s, jurusan_pasca, periode_pasca, ipk_pasca, bersedia_metlan, upload_cv, jurusan_d, periode_d, ipk_d, nama_organisasi, jabatan_organisasi, ket_organisasi, jekel, nama_perusahaan, level_kerja, posisi_kerja, masa_kerja, ket_kerja, job_available, pernyataan_data, setuju_data, universitas_s, universitas_pasca, universitas_d)
      VALUES (
        '".$_POST['nama_fg']."',
        '".$_POST['tempat_lahirfg']."',
        '".$_POST['tanggal_lahirfg']."',
        '".$_POST['pendidikan_fg']."',
        '".$jurusan_s."',
        '".$periode_s."',
        '".$ipk_s."',
        '".$jurusan_pasca."',
        '".$periode_pasca."',
        '".$ipk_pasca."',
        '".$bersedia_metlan."',
        '".$fileNameNew."',
        '".$jurusan_d."',
        '".$periode_d."',
        '".$ipk_d."',
        '".$nama_organisasi."',
        '".$jabatan_organisasi."',
        '".$ket_organisasi."',
        '".$_POST['jekel']."',
        '".$nama_perusahaan."',
        '".$level_kerja."',
        '".$posisi_kerja."',
        '".$masa_kerja."',
        '".$ket_kerja."',
        '".$_POST['job_available']."',
        '".$pernyataan_data."',
        '".$setuju_data."',
        '".$universitas_s."',
        '".$universitas_pasca."',
        '".$universitas_d."')";

        $query_simpan = mysqli_query($conn, $sql_simpan);

        if ($query_simpan) {
            echo "<script>
            Swal.fire({title: 'Terimakasih Telah Mengisi. Ditunggu Informasi Selanjutnya',text: '',icon: 'success',confirmButtonText: 'OK', 
            customClass: {
                confirmButton: 'my-confirm-button' 
            }
            }).then((result) => {
                if (result.value) {
                    window.location = '../index.php';
                }
            })</script>";
            } else {
            echo "<script>
            Swal.fire({title: 'Gagal Mengirim Data',text: '',icon: 'error',confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'my-confirm-button' 
            }
            }).then((result) => {
                if (result.value) {
                    window.location = '../index.php';
                }
            })</script>";
        }
        mysqli_close($conn);
    }

