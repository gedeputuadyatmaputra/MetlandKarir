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

    $sql = "SELECT * FROM tb_formkeluarga";
    $result = mysqli_query($conn, $sql);
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Manajemen Data Keluarga Calon Karyawan</h4>

    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
    <?php endif; ?>
   
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Latar Belakang Keluarga</h5>
        <div class="table-responsive text-nowrap">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>No</th> 
                        <th>Nama Ayah Karyawan</th>
                        <th>Tempat,tgl lahir</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan</th>
                        <th>Nama Ibu Karyawan</th>
                        <th>Tempat,tgl lahir</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan</th>
                        <th>Nama Anak Pertama</th>
                        <th>Tempat, Tgl lhr</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan </th>
                        <th>Nama Anak Kedua</th>
                        <th>Tempat, Tgl lhr</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan </th>
                        <th>Nama Anak Ketiga</th>
                        <th>Tempat, Tgl lhr</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan </th>
                        <th>Nama Anak Keempat</th>
                        <th>Tempat, Tgl lhr</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan </th>
                        <th>Nama Anak Kelima</th>
                        <th>Tempat, Tgl lhr</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan </th>
                        <th>Nama Suami/Istri</th>
                        <th>Tempat, tgl lahir Suami/Istri</th>
                        <th>Pekerjaan Suami/Istri</th>
                        <th>Pendidikan Suami/Istri</th>
                        <th>Nama anak pertama</th>
                        <th>Tempat, tgl lahir anak partama</th>
                        <th>Pekerjaan anak pertama</th>
                        <th>Pendidikan anak pertama</th>
                        <th>Nama anak keduaa</th>
                        <th>Tempat, tgl lahir anak kedua</th>
                        <th>Pekerjaan anak kedua</th>
                        <th>Pendidikan anak kedua</th>
                        <th>Nama anak ketiga</th>
                        <th>Tempat, tgl lahir anak ketiga</th>
                        <th>Pekerjaan anak ketiga</th>
                        <th>Pendidikan anak ketiga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; 
                    while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td><?php echo $row['ayah']; ?></td>
                        <td><?php echo $row['tempat_ayah'] . ', ' . $row['tgl_lhrayah']; ?></td>
                        <td><?php echo $row['pekerjaan_ayah']; ?></td>
                        <td><?php echo $row['pendidikan_ayah']; ?></td>
                        <td><?php echo $row['ibu']; ?></td>
                        <td><?php echo $row['tempat_ibu'] . ', ' . $row['tgl_lhribu']; ?></td>
                        <td><?php echo $row['pekerjaan_ibu']; ?></td>
                        <td><?php echo $row['pendidikan_ibu']; ?></td>
                        <td><?php echo $row['anak_pertama']; ?></td>
                        <td><?php echo $row['tempat_pertama'] . ', ' . $row['lahir_pertama']; ?></td>
                        <td><?php echo $row['pekerjaan_pertama']; ?></td>
                        <td><?php echo $row['pendidikan_pertama']; ?></td>
                        <td><?php echo !empty($row['anak_dua']) ? $row['anak_kedua'] : '-'; ?></td>
                        <td><?php echo !empty($row['tempat_kedua'] . ', ' . $row['lahir_kedua']) ? $row['tempat_kedua'] . ', ' . $row['lahir_kedua'] : '-'. ',' .'-'; ?></td>
                        <td><?php echo !empty ($row['pekerjaan_kedua']) ? $row['pekerjaan_kedua'] : '-'; ?></td>
                        <td><?php echo !empty ($row['pendidikan_kedua']) ? $row['pendidikan_kedua'] : '-' ; ?></td>
                        <td><?php echo !empty($row['anak_ketiga']) ? $row['anak_ketiga'] : '-'; ?></td>
                        <td><?php echo !empty($row['tempat_ketiga'] . ', ' . $row['lahir_ketiga']) ? $row['tempat_ketiga'] . ', ' . $row['lahir_ketiga'] : '-'. ','. '-'; ?></td>
                        <td><?php echo !empty ($row['pekerjaan_ketiga']) ? $row['pekerjaan_ketiga'] : '-'; ?></td>
                        <td><?php echo !empty ($row['pendidikan_ketiga']) ? $row['pendidikan_ketiga'] : '-' ; ?></td>
                        <td><?php echo !empty($row['anak_keempat']) ? $row['anak_keempat'] : '-'; ?></td>
                        <td><?php echo !empty($row['tempat_keempat'] . ', ' . $row['lahir_keempat']) ? $row['tempat_keempat'] . ', ' . $row['lahir_keempat'] : '-'. ',' . '-'; ?></td>
                        <td><?php echo !empty ($row['pekerjaan_keempat']) ? $row['pekerjaan_keempat'] : '-'; ?></td>
                        <td><?php echo !empty ($row['pendidikan_keempat']) ? $row['pendidikan_keempat'] : '-' ; ?></td>
                        <td><?php echo !empty($row['anak_kelima']) ? $row['anak_kelima'] : '-'; ?></td>
                        <td><?php echo !empty($row['tempat_kelima'] . ', ' . $row['lahir_kelima']) ? $row['tempat_kelima'] . ', ' . $row['lahir_kelima'] : '-'. ',' .'-'; ?></td>
                        <td><?php echo !empty ($row['pekerjaan_kelima']) ? $row['pekerjaan_kelimat'] : '-'; ?></td>
                        <td><?php echo !empty ($row['pendidikan_kelima']) ? $row['pendidikan_kelima'] : '-' ; ?></td>
                        <td><?php echo $row['nama_suamiistri']; ?></td>
                        <td><?php echo $row['tmpt_suamiistri'] . ', ' . $row['tgl_suamiistri']; ?></td>
                        <td><?php echo $row['pekerjaan_suamiistri']; ?></td>
                        <td><?php echo $row['pend_suamiistri']; ?></td>
                        <td><?php echo $row['sumi_anaksatu']; ?></td>
                        <td><?php echo $row['tmpt_anaksatu'] . ', ' . $row['tgl_satu']; ?></td>
                        <td><?php echo !empty ($row['peker_satu']) ? $row['peker_satu'] : '-'; ?></td>
                        <td><?php echo !empty ($row['pend_satu']) ?$row['pend_satu'] : '-' ; ?></td>
                        <td><?php echo !empty ($row['sumi_anakdua']) ? $row['sumi_anakdua'] : '-' ; ?></td>
                        <td><?php echo !empty ($row['tmpt_anakdua'] . ', ' . $row['tgl_dua']) ? $row['tmpt_anakdua'] . ', ' . $row['tgl_dua'] : '-' ; ?></td>
                        <td><?php echo !empty ($row['peker_dua']) ? $row['peker_dua'] : '-'; ?></td>
                        <td><?php echo !empty ($row['pend_dua']) ?$row['pend_dua'] : '-' ; ?></td>
                        <td><?php echo !empty ($row['sumi_anakketiga']) ? $row['sumi_anakketiga'] : '-' ; ?></td>
                        <td><?php echo !empty ($row['tmpt_anaktiga'] . ', ' . $row['tgl_tiga']) ? $row['tmpt_anaktiga'] . ', ' . $row['tgl_tiga'] : '-' . ',' . '-' ; ?></td>
                        <td><?php echo !empty ($row['peker_tiga']) ? $row['peker_tiga'] : '-'; ?></td>
                        <td><?php echo !empty ($row['pend_tiga']) ?$row['pend_tiga'] : '-' ; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>
<!-- / Content -->
<?php
include("template/footer.php");
mysqli_close($conn);
?>