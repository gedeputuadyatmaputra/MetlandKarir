<?php
require_once '../../session_check.php';
require_once '../../koneksi.php';

requireLogin();
// Check if logout is requested
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../../index.php");
    exit();
}

// Ambil ID dari URL
$id_mt = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mengambil data berdasarkan ID
$sql = "SELECT * FROM tb_fg WHERE id_fg = $id_mt";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "Data tidak ditemukan.";
    exit();
}

include("template/header.php");
?>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Detail Data Calon Karyawan Fresh Graduate</h4>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $row['nama_fg']; ?></td>
                    </tr>
                    <tr>
                        <th>Tempat & Tanggal Lahir</th>
                        <td><?php echo $row['tempat_lahirfg'] . ', ' . $row['tanggal_lahirfg']; ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?php echo $row['jekel']; ?></td>
                    </tr>
                    <tr>
                        <th>Pendidikan</th>
                        <td><?php echo $row['pendidikan_fg']; ?></td>
                    </tr>
                    <tr>
                        <th>Jurusan Sarjana</th>
                        <td><?php echo $row['jurusan_s']; ?></td>
                    </tr>
                    <tr>
                        <th>Jurusan Pasca Sarjana</th>
                        <td><?php echo $row['jurusan_pasca']; ?></td>
                    </tr>
                    <tr>
                        <th>Jurusan Diploma</th>
                        <td><?php echo $row['jurusan_d']; ?></td>
                    </tr>
                    <tr>
                        <th>IPK Sarjana</th>
                        <td><?php echo $row['ipk_s']; ?></td>
                    </tr>
                    <tr>
                        <th>IPK Pasca Sarjana</th>
                        <td><?php echo $row['ipk_pasca']; ?></td>
                    </tr>
                    <tr>
                        <th>IPK Diploma</th>
                        <td><?php echo $row['ipk_d']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Organisasi</th>
                        <td><?php echo $row['nama_organisasi']; ?></td>
                    </tr>
                    <tr>
                        <th>Jabatan Organisasi</th>
                        <td><?php echo $row['jabatan_organisasi']; ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan Organisasi</th>
                        <td><?php echo $row['ket_organisasi']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <td><?php echo $row['nama_perusahaan']; ?></td>
                    </tr>
                    <tr>
                        <th>Jabatan Kerja</th>
                        <td><?php echo $row['posisi_kerja']; ?></td>
                    </tr>
                    <tr>
                        <th>Level Kerja</th>
                        <td><?php echo $row['level_kerja']; ?></td>
                    </tr>
                    <tr>
                        <th>Masa Kerja</th>
                        <td><?php echo $row['masa_kerja']; ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan Kerja</th>
                        <td><?php echo $row['ket_kerja']; ?></td>
                    </tr>
                    <tr>
                        <th>File CV</th>
                        <td><a href="../../assets/cv_freshgrad/<?php echo $row['upload_cv']; ?>" target="_blank">Lihat CV</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <a href="datafg.php" class="btn btn-secondary mt-3">Kembali</a>
</div>
<!-- / Content -->

<?php
include("template/footer.php");
mysqli_close($conn);
?>