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
    <title>Pendidikan & Keterampilan | Metland</title>

    <script>
        function addLanguage() {
            const languageContainer = document.getElementById('languageContainer');
            const newLanguage = document.createElement('div');
            newLanguage.classList.add('row', 'mt-2');
            newLanguage.innerHTML = `
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Bahasa (Languages)</label>
                            <input type="text" name="bahasa[]" class="form-control" placeholder="Masukkan Penguasaan Bahasa (Languages)">
                            <br>
                            <label>Kemampuan (Abilities)</label>
                            <p>Menulis (Writing)</p>
                            <input type="text" name="kurang_bahasa[]" class="form-control mt-2" placeholder="Tingkat Kurang (Poor)">
                            <input type="text" name="cukup_bahasa[]" class="form-control mt-2" placeholder="Tingkat Cukup (Good)">
                            <input type="text" name="baik_bahasa[]" class="form-control mt-2" placeholder="Tingkat Baik (Good)">
                            <br>
                            <p>Membaca (Reading)</p>
                            <input type="text" name="kurang_bahasa[]" class="form-control mt-2" placeholder="Tingkat Kurang (Poor)">
                            <input type="text" name="cukup_bahasa[]" class="form-control mt-2" placeholder="Tingkat Cukup (Good)">
                            <input type="text" name="baik_bahasa[]" class="form-control mt-2" placeholder="Tingkat Baik (Good)">
                            <br>
                            <p>Mendengar (Listening)</p>
                            <input type="text" name="kurang_bahasa[]" class="form-control mt-2" placeholder="Tingkat Kurang (Poor)">
                            <input type="text" name="cukup_bahasa[]" class="form-control mt-2" placeholder="Tingkat Cukup (Good)">
                            <input type="text" name="baik_bahasa[]" class="form-control mt-2" placeholder="Tingkat Baik (Good)">
                        </div>
                    </div>
            `;
            languageContainer.appendChild(newLanguage);
        }

        function addNonFormal() {
            const nonFormalContainer = document.getElementById('nonFormalContainer');
            const newNonformal = document.createElement('div');
            newNonformal.classList.add('row', 'mt-2');
            newNonformal.innerHTML = `
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" name="nama_kursus[]" class="form-control" placeholder="Masukkan Nama Kursus (Training Name)">
                        <input type="text" name="masa_kursus[]" class="form-control mt-2" placeholder="Masukan Masa Kursus">
                        <input type="radio" name="ijazah[]" class="form-control mt-2" value="Yes"> Yes
                        <input type="radio" name="ijazah[]" class="form-control mt-2" value="No"> No
                        <input type="text" name="ket_kursus[]" class="form-control mt-2 " placeholder=" (Note)">
                    </div>
                </div>
            `;
            nonFormalContainer.appendChild(newNonformal);
        }

        function addAbility() {
            const abilitiesContainer = document.getElementById('abilitiesContainer');
            const newAbilities = document.createElement('div');
            newAbilities.classList.add('row', 'mt-2');
            newAbilities.innerHTML = `
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Keterampilan / Program Komputer (Abilities / Computer Ability)</label>
                            <input type="text" name="keterampilan[]" class="form-control" placeholder="Masukkan Keterampilan Anda (Insert Your Ability)">
                            <br>
                            <label>Tingkat Penguasaan / Level</label>
                            <input type="text" name="kurang_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Kurang Keterampilan (Poor)">
                            <input type="text" name="cukup_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Cukup Keterampilan (Good)">
                            <input type="text" name="baik_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Baik Keterampilan (Good)">
                            <br>
                            <input type="text" name="ket_keterampilan[]" class="form-control mt-2 " placeholder=" (Note)">
                        </div>
                    </div>
            `;
            abilitiesContainer.appendChild(newAbilities);
        }
    </script>
</head>

<body>
    <center>
        <img src="../assets/img/bg_metlan.png" alt="header" class="header-image">
    </center>
    <div style="background-color: white" class="container p-3 my-3 border">
        <h1 class="text-center">PENDIDIKAN & KETERAMPILAN - <i>EDUCATION & SKILLS</i></h1>
        <form id="form" method="POST">
            <div class="alert alert-secondary">
                <strong>Pendidikan Formal (<i>Formal Education</i>)</strong>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>SMU / SMK (<i>High School</i>)<strong> *</strong></label>
                        <input type="text" name="smu_smk" class="form-control" placeholder="Masukkan Nama SMU/SMK (Institutions Name)">
                        <input type="text" name="jurusan_smu" class="form-control mt-2 " placeholder="Jurusan SMU/SMK (Major)">
                        <input type="text" name="nilai_akhirsmu" class="form-control mt-2" placeholder="Nilai Akhir SMU/SMK (Grade)">
                        <br>
                        <label>Masa Pendidikan (<i>Education Period</i>)</label>
                        <p>Tanggal Awal Masuk (<i>Entry Date</i>) <strong> *</strong></p>
                        <input type="date" name="masa_smu" class="form-control mt-2">
                        <br>
                        <p>Tanggal Terakhir Masuk (<i>Last Entry Date</i>) <strong> *</strong></p>
                        <input type="date" name="masa_akhirsmu" class="form-control mt-2">
                        <textarea type="text" name="ket_smu" class="form-control mt-2 "> Keterangan (Note)</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Diploma</label>
                        <input type="text" name="diploma" class="form-control" placeholder="Masukkan Nama Institusi (Institutions Name)">
                        <input type="text" name="jurusan_d" class="form-control mt-2" placeholder="Jurusan  (Major)">
                        <input type="text" name="nilai_d" class="form-control mt-2" placeholder="Nilai Akhir (Grade)">
                        <br>
                        <label>Masa Pendidikan (<i>Education Period</i>)</label>
                        <p>Tanggal Awal Masuk (<i>Entry Date</i>)</p>
                        <input type="date" name="masa_d" class="form-control mt-2">
                        <br>
                        <p>Tanggal Terakhir Masuk (<i>Last Entry Date</i>)</p>
                        <input type="date" name="masa_akhird" class="form-control mt-2">
                        <textarea type="text" name="ket_d" class="form-control mt-2 ">Keterangan (Note) </textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>S1 Degree</label>
                        <input type="text" name="s_satu" class="form-control" placeholder="Masukkan Nama Institusi (Institutions Name)">
                        <input type="text" name="satu_jurusan" class="form-control mt-2" placeholder="Jurusan (Major)">
                        <input type="text" name="satu_nilai" class="form-control mt-2" placeholder="Nilai Akhir (Grade)">
                        <br>
                        <label>Masa Pendidikan (<i>Education Period</i>)</label>
                        <p>Tanggal Awal Masuk (<i>Entry Date</i>)</p>
                        <input type="date" name="masa_satu" class="form-control mt-2">
                        <br>
                        <p>Tanggal Terakhir Masuk (<i>Last Entry Date</i>)</p>
                        <input type="date" name="satu_akhir" class="form-control mt-2">
                        <textarea type="text" name="ket_satu" class="form-control mt-2 "> Keterangan (Note) </textarea>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>S2 Degree</label>
                        <input type="text" name="s_dua" class="form-control" placeholder="Masukkan Nama Institusi (Institutions Name)">
                        <input type="text" name="dua_jurusan" class="form-control mt-2" placeholder="Jurusan (Major)">
                        <input type="text" name="dua_nilai" class="form-control mt-2" placeholder="Nilai Akhir (Grade)">
                        <br>
                        <label>Masa Pendidikan (<i>Education Period</i>)</label>
                        <p>Tanggal Awal Masuk (<i>Entry Date</i>)</p>
                        <input type="date" name="masa_dua" class="form-control mt-2">
                        <br>
                        <p>Tanggal Terakhir Masuk (<i>Last Entry Date</i>)</p>
                        <input type="date" name="dua_akhir" class="form-control mt-2">
                        <textarea type="text" name="ket_dua" class="form-control mt-2 "> Keterangan (Note)</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>S3 Degree</label>
                        <input type="text" name="s_tiga" class="form-control" placeholder="Masukkan Nama Institusi (Institutions Name)">
                        <input type="text" name="tiga_jurusan" class="form-control mt-2" placeholder="Jurusan (Major)">
                        <input type="text" name="nilai_tiga" class="form-control mt-2" placeholder="Nilai Akhir (Grade)">
                        <br>
                        <label>Masa Pendidikan (<i>Education Period</i>)</label>
                        <p>Tanggal Awal Masuk (<i>Entry Date</i>)</p>
                        <input type="date" name="masa_tiga" class="form-control mt-2">
                        <br>
                        <p>Tanggal Terakhir Masuk (<i>Last Entry Date</i>)</p>
                        <input type="date" name="tiga_akhir" class="form-control mt-2">
                        <textarea type="text" name="ket_tiga" class="form-control mt-2 "> Keterangan (Note)</textarea>
                    </div>
                </div>
            </div>

            <div class="alert alert-secondary">
                <strong>Pendidikan Non Formal (<i>Non Formal Education</i>)</strong>
            </div>
             
            <div id="nonFormalContainer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nama Kursus (<i>Training Name</i>)</label>
                            <input type="text" name="nama_kursus[]" class="form-control" placeholder="Masukkan Nama Kursus (Training Name)">
                            <input type="text" name="nama_kursus[]" class="form-control" placeholder="Masukkan Nama Kursus (Training Name)">
                            <label>Masa Pendidikan (<i>Education Period</i>)</label>
                            <input type="text" name="masa_kursus[]" class="form-control mt-2" placeholder="Masukan lama kursus yang diikuti">
                            <input type="text" name="masa_kursus[]" class="form-control mt-2" placeholder="Masukan lama kursus yang diikuti">
                            <label>Ijazah - <i>Certificate</i></label>
                            <br>
                            <input type="radio" name="ijazah[]" value="Yes"> Yes
                            <input type="radio" name="ijazah[]" value="No"> No
                            <br>
                            <textarea type="text" name="ket_kursus[]" class="form-control mt-2 "> Keterangan (Note) </textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-secondary">
                <strong>Penguasaan Bahasa Asing (<i>Non Mother Tounge Language Ability</i>)</strong>
            </div>

            <div id="languageContainer">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Bahasa (<i>Languages</i>)</label>
                            <input type="text" name="bahasa[]" class="form-control col-sm-12" placeholder="Masukkan Penguasaan Bahasa 1 (Languages 1)">
                            <input type="text" name="bahasa[]" class="form-control col-sm-12" placeholder="Masukkan Penguasaan Bahasa 2 (Languages 2)">
                            <br>
                            <label>Kemampuan (<i>Abilities</i>)</label>
                            <p>Menulis (<i>Writing</i>)</p>
                            <input type="text" name="kurang_bahasa[]" class="form-control mt-2" placeholder="Tingkat Kurang 1 (Poor 1)">
                            <input type="text" name="kurang_bahasa[]" class="form-control mt-2" placeholder="Tingkat Kurang 2 (Poor 2)">
                            <input type="text" name="cukup_bahasa[]" class="form-control mt-2" placeholder="Tingkat Cukup 1(Good 1)">
                            <input type="text" name="cukup_bahasa[]" class="form-control mt-2" placeholder="Tingkat Cukup 2(Good 2)">
                            <input type="text" name="baik_bahasa[]" class="form-control mt-2" placeholder="Tingkat Baik 1 (Excellent 1)">
                            <input type="text" name="baik_bahasa[]" class="form-control mt-2" placeholder="Tingkat Baik 2 (Excellent 2)">
                            <br>
                            <p>Membaca (<i>Reading</i>)</p>
                            <input type="text" name="kurang_bahasa[]" class="form-control mt-2" placeholder="Tingkat Kurang 1 (Poor 1)">
                            <input type="text" name="kurang_bahasa[]" class="form-control mt-2" placeholder="Tingkat Kurang 2 (Poor 2)">
                            <input type="text" name="cukup_bahasa[]" class="form-control mt-2" placeholder="Tingkat Cukup 1 (Good 1)">
                            <input type="text" name="baik_bahasa[]" class="form-control mt-2" placeholder="Tingkat Baik 2 (Excellent 2)">
                            <br>
                            <p>Mendengar (<i>Listening</i>)</p>
                            <input type="text" name="kurang_bahasa[]" class="form-control mt-2" placeholder="Tingkat Kurang (Poor)">
                            <input type="text" name="cukup_bahasa[]" class="form-control mt-2" placeholder="Tingkat Cukup (Good)">
                            <input type="text" name="baik_bahasa[]" class="form-control mt-2" placeholder="Tingkat Baik (Excellent)">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Bahasa (<i>Languages</i>)</label>
                            <input type="text" name="bahasa[]" class="form-control col-sm-12" placeholder="Masukkan Penguasaan Bahasa 3 (Languages 3)">
                            <input type="text" name="bahasa[]" class="form-control col-sm-12" placeholder="Masukkan Penguasaan Bahasa 4 (Languages 4)">
                            <br>
                            <label>Kemampuan (<i>Abilities</i>)</label>
                            <p>Menulis (<i>Writing</i>)</p>
                            <input type="text" name="kurang_bahasa[]" class="form-control mt-2" placeholder="Tingkat Kurang (Poor)">
                            <input type="text" name="cukup_bahasa[]" class="form-control mt-2" placeholder="Tingkat Cukup (Good)">
                            <input type="text" name="baik_bahasa[]" class="form-control mt-2" placeholder="Tingkat Baik (Excellent)">
                            <br>
                            <p>Membaca (<i>Reading</i>)</p>
                            <input type="text" name="kurang_bahasa[]" class="form-control mt-2" placeholder="Tingkat Kurang (Poor)">
                            <input type="text" name="cukup_bahasa[]" class="form-control mt-2" placeholder="Tingkat Cukup (Good)">
                            <input type="text" name="baik_bahasa[]" class="form-control mt-2" placeholder="Tingkat Baik (Excellent)">
                            <br>
                            <p>Mendengar (<i>Listening</i>)</p>
                            <input type="text" name="kurang_bahasa[]" class="form-control mt-2" placeholder="Tingkat Kurang (Poor)">
                            <input type="text" name="cukup_bahasa[]" class="form-control mt-2" placeholder="Tingkat Cukup (Good)">
                            <input type="text" name="baik_bahasa[]" class="form-control mt-2" placeholder="Tingkat Baik (Excellent">
                        </div>
                    </div>

                </div>

            </div>

            <div class="alert alert-secondary">
                <strong>Penguasaan Keterampilan Tambahan (<i>Skill Abilities</i>)</strong>
            </div>

            <div id="abilitiesContainer">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Keterampilan / Program Komputer (<i>Abilities / Computer Ability</i>)</label>
                            <input type="text" name="keterampilan[]" class="form-control col-sm-12" placeholder="Masukkan Keterampilan 1 Anda (Insert Your Ability)">
                            <input type="text" name="keterampilan[]" class="form-control col-sm-12" placeholder="Masukkan Keterampilan 2 Anda (Insert Your Ability)">
                            <br>
                            <label>Tingkat Penguasaan / <i>Level</i></label>
                            <input type="text" name="kurang_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Kurang Keterampilan 1 (Poor)">
                            <input type="text" name="kurang_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Kurang Keterampilan 2 (Poor)">
                            <input type="text" name="cukup_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Cukup 1 Keterampilan (Good)">
                            <input type="text" name="cukup_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Cukup 2 Keterampilan (Good)">
                            <input type="text" name="baik_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Baik 1 Keterampilan (Execelent)">
                            <input type="text" name="baik_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Baik 2 Keterampilan (Execelent)">
                            <label>Keterangan (Note)</label>
                            <textarea type="text" name="ket_keterampilan[]" class="form-control mt-2 "></textarea>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Keterampilan / Program Komputer (<i>Abilities / Computer Ability</i>)</label>
                            <input type="text" name="keterampilan[]" class="form-control col-sm-12" placeholder="Masukkan Keterampilan 3 Anda (Insert Your Ability 1)">
                            <input type="text" name="keterampilan[]" class="form-control col-sm-12" placeholder="Masukkan Keterampilan 4 Anda (Insert Your Ability 2)">
                            <br>
                            <label>Tingkat Penguasaan / <i>Level</i></label>
                            <input type="text" name="kurang_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Kurang 3 Keterampilan (Poor)">
                            <input type="text" name="kurang_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Kurang 4 Keterampilan (Poor)">
                            <input type="text" name="cukup_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Cukup 3 Keterampilan (Good)">
                            <input type="text" name="cukup_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Cukup 4 Keterampilan (Good)">
                            <input type="text" name="baik_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Baik 3 Keterampilan (Excelent)">
                            <input type="text" name="baik_keterampilan[]" class="form-control mt-2" placeholder="Tingkat Baik 4 Keterampilan (Excelent)">
                            <label>Keterangan (Note)</label>
                            <textarea type="text" name="ket_keterampilan[]" class="form-control mt-2 "></textarea>
                        </div>
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
        <div style="background-color: blue;" class="container p-2 my-3 border">
            <h5 style="color: white;" class="text-center">Metland Karir ~ Copyright 2024 &#169;</h5>
        </div>
    </center>
</body>

</html>

<?php
    if (isset($_POST['submit'])) {

        $calon_id = $_SESSION['calon_id'];
        // Ambil data dari session
        $pendaftaran = isset($_SESSION['biodata']) ? $_SESSION['biodata'] : [];
        $nama_kursus = isset($_POST['nama_kursus']) && !empty($_POST['nama_kursus']) ? implode(',', $_POST['nama_kursus']) : '-';
        $masa_kursus = isset($_POST['masa_kursus']) && !empty($_POST['masa_kursus']) ? implode(',', $_POST['masa_kursus']) : '-';
        $ijazah = isset($_POST['ijazah']) && !empty($_POST['ijazah']) ? implode(',', $_POST['ijazah']) : '-';
        $ket_kursus = isset($_POST['ket_kursus']) && !empty($_POST['ket_kursus']) ? implode(',', $_POST['ket_kursus']) : '-';
        $bahasa = isset($_POST['bahasa']) && !empty($_POST['bahasa']) ? implode(',', $_POST['bahasa']) : '-';
        $kurang_bahasa = isset($_POST['kurang_bahasa']) && !empty($_POST['kurang_bahasa']) ? implode(',', $_POST['kurang_bahasa']) : '-';
        $cukup_bahasa = isset($_POST['cukup_bahasa']) && !empty($_POST['cukup_bahasa']) ? implode(',', $_POST['cukup_bahasa']) : '-';
        $baik_bahasa = isset($_POST['baik_bahasa']) && !empty($_POST['baik_bahasa']) ? implode(',', $_POST['baik_bahasa']) : '-';
        $keterampilan = isset($_POST['keterampilan']) && !empty($_POST['keterampilan']) ? implode(',', $_POST['keterampilan']) : '-';
        $kurang_keterampilan = isset($_POST['kurang_keterampilan']) && !empty($_POST['kurang_keterampilan']) ? implode(',', $_POST['kurang_keterampilan']) : '-';
        $cukup_keterampilan = isset($_POST['cukup_keterampilan']) && !empty($_POST['cukup_keterampilan']) ? implode(',', $_POST['cukup_keterampilan']) : '-';
        $baik_keterampilan = isset($_POST['baik_keterampilan']) && !empty($_POST['baik_keterampilan']) ? implode(',', $_POST['baik_keterampilan']) : '-';

        // Ambil data dari form
    $sql_simpan = "INSERT INTO tb_pendidikan (
        id_diri,
        smu_smk,
        jurusan_smu,
        nilai_akhirsmu,
        masa_smu,
        masa_akhirsmu,
        ket_smu,
        diploma,
        jurusan_d,
        nilai_d,
        masa_d,
        masa_akhird,
        ket_d,
        s_satu,
        satu_jurusan,
        satu_nilai,
        masa_satu,
        satu_akhir,
        ket_satu,
        s_dua,
        dua_jurusan,
        dua_nilai,
        masa_dua,
        dua_akhir,
        ket_dua,
        s_tiga,
        tiga_jurusan,
        nilai_tiga,
        masa_tiga,
        tiga_akhir,
        ket_tiga,
        nama_kursus,
        masa_kursus,
        ijazah,
        ket_kursus,
        bahasa,
        kurang_bahasa,
            cukup_bahasa,
            baik_bahasa,
            keterampilan,
            kurang_keterampilan,
            cukup_keterampilan,
            baik_keterampilan,
            ket_keterampilan
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql_simpan);

    if ($stmt) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, 'issssssssssssssssssssssssssssssssssssssssssssss', 
            $calon_id, // ID dari session
            $_POST['smu_smk'],
            $_POST['jurusan_smu'],
            $_POST['nilai_akhirsmu'],
            $_POST['masa_smu'],
            $_POST['masa_akhirsmu'],
            $_POST['ket_smu'],
            $_POST['diploma'],
            $_POST['jurusan_d'],
            $_POST['nilai_d'],
            $_POST['masa_d'],
            $_POST['masa_akhird'],
            $_POST['ket_d'],
            $_POST['s_satu'],
            $_POST['satu_jurusan'],
            $_POST['satu_nilai'],
            $_POST['masa_satu'],
            $_POST['satu_akhir'],
            $_POST['ket_satu'],
            $_POST['s_dua'],
            $_POST['dua_jurusan'],
            $_POST['dua_nilai'],
            $_POST['masa_dua'],
            $_POST['dua_akhir'],
            $_POST['ket_dua'],
            $_POST['s_tiga'],
            $_POST['tiga_jurusan'],
            $_POST['nilai_tiga'],
            $_POST['masa_tiga'],
            $_POST['tiga_akhir'],
            $_POST['ket_tiga'],
            $nama_kursus,
            $masa_kursus,
            $ijazah,
            $ket_kursus,
            $bahasa,
            $kurang_bahasa,
            $cukup_bahasa,
            $baik_bahasa,
            $keterampilan,
            $kurang_keterampilan,
            $cukup_keterampilan,
            $baik_keterampilan,
            $_POST['ket_keterampilan']
        );

        // Eksekusi
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
            if (confirm('Apakah anda yakin untuk mengirim data ?')) {
                window.location.href = 'riwayat_pekerjaan.php';
            } else {
                window.history.back();
            }
            </script>";
            exit();
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>