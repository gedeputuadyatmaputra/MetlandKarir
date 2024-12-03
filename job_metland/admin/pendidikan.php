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

    $sql = "SELECT tb_pendidikan.*, tb_datadiri.nama
            FROM tb_pendidikan
            INNER JOIN tb_datadiri
            ON tb_pendidikan.id_pend = tb_datadiri.id_diri";
    $result = mysqli_query($conn, $sql);
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Manajemen Data Pendidikan Karyawanr</h4>

    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
    <?php endif; ?>
   
    <style>
            table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            }

            .subtext {
            font-size: 12px;
            font-style: italic;
            }
    </style>
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Daftar Data Pendidikan Calon Karyawan</h5>
        <br>
        <div class="table-responsive text-nowrap">
            <table class="table text-center">
                <h5>Pendidikan Formal</h5>
                <thead>
                    <tr>
                        <th>No</th> 
                        <th>Nama Calon Karyawan</th>
                        <th>Nama SMU/SMK</th>
                        <th>Jurusan</th>
                        <th>Nilai Akhir</th>
                        <th>Masa Pendidikan</th>
                        <th>Keterangan SMU/SMK</th>
                        <th>Nama Institusi D3</th>
                        <th>Jurusan D3</th>
                        <th>Nilai Akhir D3</th>
                        <th>Masa D3</th>
                        <th>Keterangan D3</th>
                        <th>Nama Institusi S1</th>
                        <th>Jurusan S1</th>
                        <th>Nilai Akhir S1</th>
                        <th>Masa S1</th>
                        <th>Keterangan S1</th>
                        <th>Nama Institusi S2</th>
                        <th>Jurusan S2</th>
                        <th>Nilai S2</th>
                        <th>Masa S2</th>
                        <th>Keterangan S2</th>
                        <th>Nama Institusi S3</th>
                        <th>Jurusan S3</th>
                        <th>Nilai S3</th>
                        <th>Masa S3</th>
                        <th>Keterangan S3</th>
                        <th>Nama Kursus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; 
                    while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['smu_smk']; ?></td>
                        <td><?php echo $row['jurusan_smu']; ?></td>
                        <td><?php echo $row['nilai_akhirsmu']; ?></td>
                        <td><?php echo $row['masa_smu'] . ' - ' . $row['masa_akhirsmu']; ?></td>
                        <td><?php echo $row['ket_smu']; ?></td>
                        <td><?php echo !empty ($row['diploma']) ? $row['diploma'] : '-'; ?></td>
                        <td><?php echo !empty ($row['jurusan_d']) ? $row['jurusan_d'] : '-' ; ?></td>
                        <td><?php echo !empty ($row['nilai_d']) ? $row['nilai_d'] : '-'; ?></td>
                        <td>
                            <?php 
                                // Cek apakah masa_d dan masa_akhird adalah '0000-00-00'
                                if ($row['masa_d'] === '0000-00-00' && $row['masa_akhird'] === '0000-00-00') {
                                    echo '-'; // Tampilkan '-' jika kedua tanggal tidak valid
                                } else {
                                    echo !empty($row['masa_d']) && !empty($row['masa_akhird']) ? $row['masa_d'] . ' - ' . $row['masa_akhird'] : '-';
                                }
                            ?>
                        </td>
                        <td><?php echo !empty ($row['ket_d']) ? $row['ket_d'] : '-'; ?></td>
                        <td><?php echo !empty ($row['s_satu']) ? $row['s_satu'] : '-'; ?></td>
                        <td><?php echo !empty ($row['satu_jurusan']) ? $row['satu_jurusan'] : '-' ; ?></td>
                        <td><?php echo !empty ($row['satu_nilai']) ? $row['satu_nilai'] : '-'; ?></td>
                        <td>
                            <?php 
                                // Cek apakah masa_satu dan satu_akhir adalah '0000-00-00'
                                if ($row['masa_satu'] === '0000-00-00' && $row['satu_akhir'] === '0000-00-00') {
                                    echo '-'; // Tampilkan '-' jika kedua tanggal tidak valid
                                } else {
                                    echo !empty($row['masa_satu']) && !empty($row['satu_akhir']) ? $row['masa_satu'] . ' - ' . $row['satu_akhir'] : '-';
                                }
                            ?>
                        </td>
                        <td><?php echo !empty ($row['ket_satu']) ? $row['ket_satu'] : '-'; ?></td>
                        <td><?php echo !empty ($row['s_dua']) ? $row['s_dua'] : '-'; ?></td>
                        <td><?php echo !empty ($row['dua_jurusan']) ? $row['dua_jurusan'] : '-' ; ?></td>
                        <td><?php echo !empty ($row['dua_nilai']) ? $row['dua_nilai'] : '-'; ?></td>
                        <td>
                            <?php 
                                // Cek apakah masa_satu dan satu_akhir adalah '0000-00-00'
                                if ($row['masa_dua'] === '0000-00-00' && $row['dua_akhir'] === '0000-00-00') {
                                    echo '-'; // Tampilkan '-' jika kedua tanggal tidak valid
                                } else {
                                    echo !empty($row['masa_dua']) && !empty($row['dua_akhir']) ? $row['masa_dua'] . ' - ' . $row['dua_akhir'] : '-';
                                }
                            ?>
                        </td>
                        <td><?php echo !empty ($row['ket_dua']) ? $row['ket_dua'] : '-'; ?></td>
                        <td><?php echo !empty ($row['s_tiga']) ? $row['s_tiga'] : '-'; ?></td>
                        <td><?php echo !empty ($row['tiga_jurusan']) ? $row['tiga_jurusan'] : '-' ; ?></td>
                        <td><?php echo !empty ($row['nilai_tiga']) ? $row['nilai_tiga'] : '-'; ?></td>
                        <td>
                            <?php 
                                // Cek apakah masa_tiga dan tiga_akhir adalah '0000-00-00'
                                if ($row['masa_tiga'] === '0000-00-00' && $row['tiga_akhir'] === '0000-00-00') {
                                    echo '-'; // Tampilkan '-' jika kedua tanggal tidak valid
                                } else {
                                    echo !empty($row['masa_tiga']) && !empty($row['tiga_akhir']) ? $row['masa_tiga'] . ' - ' . $row['tiga_akhir'] : '-';
                                }
                            ?>
                        </td>
                        <td><?php echo !empty ($row['ket_tiga']) ? $row['ket_tiga'] : '-'; ?></td>
                        <td><?php echo $row['nama_kursus']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Responsive Table -->

     <!-- Responsive Table Non Formal -->
     <div class="card">
        <br>
        <div class="table-responsive text-nowrap">
            <table class="table text-center">
                <h5>Pendidikan Non Formal</h5>
                <thead>
                    <tr>
                        <th>No</th> 
                        <th>Nama Calon Karyawan</th>
                        <th>Nama Kursus</th>
                        <th>Masa Pendidikan</th>
                        <th>Ijazah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; 
                    while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['nama_kursus']; ?></td>
                        <td><?php echo $row['masa_kursus']; ?></td>
                        <td><?php echo $row['ijazah']; ?></td>
                        <td><?php echo $row['ket_kursus']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Responsive Table Non Formal -->
    <style>
        .tabelhead {
            border-collapse: collapse;
        }
    </style>
    <!-- Responsive Table Bahasa Asing -->
    <div class="card">
        <br>
        <div class="table-responsive text-nowrap">
            <table class="table text-center">
                <h5>Penguasaan Bahasa Asing</h5>
                <thead >
                    <tr>
                        <th>No</th> 
                        <th>Nama Calon Karyawan</th>
                        <th>Bahasa</th>
                        <th>Kemampuan</th>
                        <th colspan="3">Tingkat Penguasaan</th>
                    </tr>
                    <tr>
                        <th colspan="4"></th>
                        <th>Kurang / <span class="subtext">Poor</span></th>
                        <th>Cukup / <span class="subtext">Good</span></th>
                        <th>Baik / <span class="subtext">Excellent</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; 
                    while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['nama_kursus']; ?></td>
                        <td><?php echo $row['masa_kursus']; ?></td>
                        <td><?php echo $row['ijazah']; ?></td>
                        <td><?php echo $row['ket_kursus']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Responsive Table Bahasa Asing -->
</div>
<!-- / Content -->
<?php
include("template/footer.php");
mysqli_close($conn);
?>