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

    $sql = "SELECT * FROM tb_datadiri";
    $result = mysqli_query($conn, $sql);
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Manajemen Pelamar</h4>

    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
    <?php endif; ?>
   
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Daftar Data Diri Calon Karyawan</h5>
        <div class="table-responsive text-nowrap">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>No</th> 
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat & Tanggal Lahir</th>
                        <th>Telepon Mobile</th>
                        <th>Telepon Home</th>
                        <th>Email</th>
                        <th>Agama</th>
                        <th>Alamat KTP</th>
                        <th>Alamat</th>
                        <th>Media Sosial</th>
                        <th>No Ktp</th>
                        <th>No KK</th>
                        <th>No NPWP</th>
                        <th>No Rekening Mandiri</th>
                        <th>Kewarganegaraan</th>
                        <th>Status Kawin</th>
                        <th>Tahun Menikah/Janda/Duda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; 
                    while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['jekel']; ?></td>
                        <td><?php echo $row['tempat_lahir'] . ', ' . $row['tgl_lahir']; ?></td>
                        <td><?php echo $row['tlp_mo']; ?></td>
                        <td><?php echo !empty($row['tlp_home']) ? $row['tlp_home'] : '-'; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['agama']; ?></td>
                        <td><?php echo $row['alamat_ktp']; ?></td>
                        <td><?php echo substr($row['alamat'], 0, 50) . '...'; ?></td>
                        <td><?php echo $row['medsos']; ?></td>
                        <td><?php echo $row['no_ktp']; ?></td>
                        <td><?php echo $row['no_kk']; ?></td>
                        <td><?php echo $row['no_npwp']; ?></td>
                        <td><?php echo $row['no_rek']; ?></td>
                        <td><?php echo $row['kewarganegaraan']; ?></td>
                        <td style="center">
                            <?php 
                                switch ($row['status_kawin']) {
                                    case 'Belum Menikah':
                                        echo 'Belum Menikah';
                                        break;
                                    case 'Menikah':
                                        echo 'Menikah';
                                        break;
                                    case 'Janda/Duda':
                                        echo 'Janda/Duda';
                                        break;
                                    default:
                                        echo 'Status Tidak Diketahui';
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                            switch ($row['status_kawin']) {
                                        case 'Belum Menikah':
                                            echo '-';
                                            break;
                                        case 'Menikah':
                                            echo  $row['thn_menikah'] ; // Tampilkan tahun menikah jika statusnya Menikah
                                            break;
                                        case 'Janda/Duda':
                                            echo  $row['thn_janda'] ; // Tampilkan tahun janda jika statusnya Janda/Duda
                                            break;
                                        default:
                                            echo '-';
                                    }
                                ?>
                        </td>
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