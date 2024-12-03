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
    
    include("template/header.php");
?>

<style>
    .table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .table td {
        vertical-align: middle;
    }

    .btn {
        margin: 0 5px; /* Jarak antar tombol */
    }

    .table-responsive {
        max-height: 500px; 
        overflow-y: auto; /* Menambahkan scroll vertikal */
    }
</style>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
    <?php endif; ?>

     <!-- Form Filter -->
    <form method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <select name="jekel" class="form-select">
                    <option value="">Semua Kelamin</option>
                    <option value="Pria" <?php echo (isset($_GET['jekel']) && $_GET['jekel'] == 'Pria') ? 'selected' : ''; ?>>Pria</option>
                    <option value="Wanita" <?php echo (isset($_GET['jekel']) && $_GET['jekel'] == 'Wanita') ? 'selected' : ''; ?>>Wanita</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-6">
                <select name="pendidikan" class="form-select">
                    <option value="">Semua Pendidikan</option>
                    <option value="Sarjana" <?php echo (isset($_GET['pendidikan']) && $_GET['pendidikan'] == 'Sarjana') ? 'selected' : ''; ?>>Sarjana</option>
                    <option value="Pasca Sarjana" <?php echo (isset($_GET['pendidikan']) && $_GET['pendidikan'] == 'Pasca Sarjana') ? 'selected' : ''; ?>>Pasca Sarjana</option>
                    <option value="Diploma" <?php echo (isset($_GET['pendidikan']) && $_GET['pendidikan'] == 'Diploma') ? 'selected' : ''; ?>>Diploma</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" name="universitas" class="form-control" placeholder="Universitas" value="<?php echo isset($_GET['universitas']) ? $_GET['universitas'] : ''; ?>">
            </div>
            <div class="col-md-2">
                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="<?php echo isset($_GET['jurusan']) ? $_GET['jurusan'] : ''; ?>">
            </div>
            <div class="col-md-3 mt-4">
                <input type="text" name="ipk" class="form-control" placeholder="Nilai IPK" value="<?php echo isset($_GET['ipk']) ? $_GET['ipk'] : ''; ?>">
            </div>
            <div class="col-md-3 mt-4">
                <input type="text" name="maasakerja" class="form-control" placeholder="Masa Kerja" value="<?php echo isset($_GET['masa_kerja']) ? $_GET['masa_kerja'] : ''; ?>">
            </div>
            <div class="col-md-4 mt-4">
                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan Kerja & Organisasi" value="<?php echo isset($_GET['jabatan']) ? $_GET['jabatan'] : ''; ?>">
            </div>
            
            
        </div>
        <div class="mt-4 col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>

    <?php 
        $jekel = isset($_GET['jekel']) ? $_GET['jekel'] : '';
        $pendidikan = isset($_GET['pendidikan']) ? $_GET['pendidikan'] : '';
        $universitas = isset($_GET['universitas']) ? $_GET['universitas'] : '';
        $jurusan = isset($_GET['jurusan']) ? $_GET['jurusan'] : '';
        $jabatan = isset($_GET['jabatan']) ? $_GET['jabatan'] : '';
        $perusahaan = isset($_GET['perusahaan']) ? $_GET['perusahaan'] : '';
        $masakerja = isset($_GET['masakerja']) ? $_GET['masakerja'] : '';
        $ipk = isset($_GET['ipk']) ? $_GET['ipk'] : '';

        $sql = "SELECT * FROM tb_mt WHERE 1=1";

        if ($jekel) {
            $sql .= " AND jekel = '" . mysqli_real_escape_string($conn, $jekel) . "'";
        }

        if ($pendidikan) {
            $sql .= " AND pendidikan = '" . mysqli_real_escape_string($conn, $pendidikan) . "'";
        }
        if ($universitas) {
            $sql .= " AND (universitas_s LIKE '%" . mysqli_real_escape_string($conn, $universitas) . "%' OR universitas_pasca LIKE '%" .  mysqli_real_escape_string($conn, $universitas) . "%' OR universitas_d LIKE '%". mysqli_real_escape_string($conn,$universitas). "%')";
        }
        if ($ipk) {
            $sql .= " AND (ipk_s LIKE '%" . mysqli_real_escape_string($conn, $ipk) . "%' OR ipk_pasca LIKE '%" . mysqli_real_escape_string($conn, $ipk) . "%' OR ipk_d LIKE '%" . mysqli_real_escape_string($conn, $ipk) . "%')";
        }
        if ($jurusan) {
            $sql .= " AND (jurusan_s LIKE '%" . mysqli_real_escape_string($conn, $jurusan) . "%' OR jurusan_pasca LIKE '%" . mysqli_real_escape_string($conn, $jurusan) . "%' OR jurusan_d LIKE '%" . mysqli_real_escape_string($conn, $jurusan) . "%')";
        }
        if ($jabatan) {
            $sql .= " AND (jabatan_organisasi LIKE '%" . mysqli_real_escape_string($conn, $jabatan) . "%' OR pnglmn_posisi LIKE '%" .  mysqli_real_escape_string($conn, $jabatan) . "%')";
        }
        if ($masakerja) {
            $sql .= " AND (masa_kerja LIKE '%" . mysqli_real_escape_string($conn, $masakerja) . "%')";
        }

        $result = mysqli_query($conn, $sql);
    ?>

    <h4 class="fw-bold py-3 mb-4">Data Calon Karyawan MT</h4>
    
    <div class="mb-3">
        <label for="columnSelect">Pilih kolom untuk disembunyikan:</label>
            <select id="columnSelect" class="form-select">
                <option value="2">Nama</option>
                <option value="3">Jenis Kelamin</option>
                <option value="4">Pendidikan</option>
                <option value="5">Universitas S1</option>
                <option value="6">Jurusan Sarjana</option>
                <option value="7">Periode Sarjana</option>
                <option value="8">IPK Sarjana</option>
                <option value="9">Universitas Pasca</option>
                <option value="10">Jurusan Pasca</option>
                <option value="11">Periode Pasca</option>
                <option value="12">IPK Pasca</option>
                <option value="13">Universitas Diploma</option>
                <option value="14">Jurusan Diploma</option>
                <option value="15">Periode Diploma</option>
                <option value="16">IPK Diploma</option>
                <option value="17">Nama Organisasi</option>
                <option value="18">Jabatan Organisasi</option>
                <option value="19">Keterangan</option>
                <option value="20">Nama Perusahaan</option>
                <option value="21">Jabatan</option>
                <option value="22">Level Kerja</option>
                <option value="23">Masa Kerja</option>
                <option value="24">Ket Kerja</option>
                <option value="25">File CV</option>
            </select>
    </div>
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Data Pelamar</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th> 
                        <th>Nama</th>
                        <th>Tempat & Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Universitas S1</th>
                        <th>Jurusan Sarjana</th>
                        <th>Periode Sarjana</th>
                        <th>IPK Sarjana</th>
                        <th>Universitas Pasca</th>
                        <th>Jurusan Pasca</th>
                        <th>Periode Pasca</th>
                        <th>IPK Pasca</th>
                        <th>Universitas Diploma</th>
                        <th>Jurusan Diploma</th>
                        <th>Periode Diploma</th>
                        <th>IPK Diploma</th>
                        <th>Nama Organisasi</th>
                        <th>Jabatan Organisasi</th>
                        <th>Keterangan Organisasi</th>
                        <th>Nama Perusahaan</th>
                        <th>Jabatan</th>
                        <th>Level Kerja</th>
                        <th>Masa Kerja</th>
                        <th>Ket Kerja</th>
                        <th>File CV</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; 
                    while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td><?php echo $row['nama_mt']; ?></td>
                        <td><?php echo $row['tempat_lahir'] . ', ' . $row['tanggal_lahir'];?></td>
                        <td><?php echo $row['jekel']; ?></td>
                        <td><?php echo $row['pendidikan']; ?></td>
                        <td><?php echo $row['universitas_s']; ?></td>
                        <td><?php echo $row['jurusan_s']; ?></td>
                        <td><?php echo $row['periode_s']; ?></td>
                        <td><?php echo $row['ipk_s']; ?></td>
                        <td><?php echo $row['universitas_pasca']; ?></td>
                        <td><?php echo $row['jurusan_pasca']; ?></td>
                        <td><?php echo $row['periode_pasca']; ?></td>
                        <td><?php echo $row['ipk_pasca']; ?></td>
                        <td><?php echo $row['universitas_d']; ?></td>
                        <td><?php echo $row['jurusan_d']; ?></td>
                        <td><?php echo $row['periode_d']; ?></td>
                        <td><?php echo $row['ipk_d']; ?></td>
                        <td><?php echo $row['nama_organisasi']; ?></td>
                        <td><?php echo $row['jabatan_organisasi']; ?></td>
                        <td style="text-align: justify;"><?php echo $row['ket_organisasi']; ?></td>
                        <th><?php echo $row['nama_perusahaan']?></th>
                        <th><?php echo $row['pnglmn_posisi']?></th>
                        <th><?php echo $row['jabatan']?></th>
                        <th><?php echo $row['masa_kerja']?></th>
                        <th style="text-align: justify;"><?php echo $row['ket_kerja']?></th>
                        <td>
                            <a href="../../assets/filecv/<?php echo $row['upload_cv'];?>" class="btn btn-success btn-sm" target="_blank">Lihat CV</a> | 
                            <a href="../../assets/filecv/<?php echo $row['upload_cv']; ?>" class="btn btn-warning btn-sm" download>Download CV</a>
                        </td>
                        <td>
                            <a href="lhtmt.php?id=<?php echo $row['id_mt']; ?>" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Ingin Lihat Data ?')">Lihat</a>
                            <br>
                            <a href="delmt.php?id=<?php echo $row['id_mt']; ?>" class="btn btn-danger btn-sm mt-4" onclick="return confirm('Apakah Ingin Hapus Data ?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Responsive Table -->

    <script>
        document.getElementById('columnSelect').addEventListener('change', function() {
            const column = this.value;
            const table = document.querySelector('table');
            const rows = table.querySelectorAll('tr');

            rows.forEach(function(row) {
                const cell = row.querySelector(`td:nth-child(${column}), th:nth-child(${column})`);
                if (cell) {
                    // Cek apakah kolom saat ini disembunyikan
                    if (cell.style.display === 'none') {
                        // Tampilkan kolom
                        cell.style.display = '';
                    } else {
                        // Sembunyikan kolom
                        cell.style.display = 'none';
                    }
                }
            });
        });
    </script>

    
</div>
<!-- / Content -->
<?php
include("template/footer.php");
mysqli_close($conn);
?>