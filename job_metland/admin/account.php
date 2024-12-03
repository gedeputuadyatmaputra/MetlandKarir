<?php
    require_once '../session_check.php';
    requireLogin(); // Ensure the user is logged in
    require_once '../koneksi.php';

    $sql = "SELECT * FROM tb_account";
    $result = mysqli_query($conn, $sql);

    include("template/header.php");
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Manajemen Admin</h4>

    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
    <?php endif; ?>

    <div class="mb-4">
        <a href="addacc.php" class="btn btn-primary">Tambah Akun</a>
    </div>

    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Daftar Artikel</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th> 
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; 
                    while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td><?php echo $row['nama_admin']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                       
                        <td>
                            <a href="deleteacc.php?id=<?php echo $row['id_admin']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin mengapus ini?')">Hapus</a>
                            <a href="editacc.php?id=<?php echo $row['id_admin']; ?>" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin menghapus ini?')">Ubah</a>
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