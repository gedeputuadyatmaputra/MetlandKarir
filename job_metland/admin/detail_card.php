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

    // Fetch articles from database
    $sql = "SELECT * FROM tb_infojob";
    $result = mysqli_query($conn, $sql);
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Manajemen Card Job</h4>

    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
    <?php endif; ?>

    <div class="mb-4">
        <a href="add_card.php" class="btn btn-primary">Tambah Card Job</a>
    </div>

    <div class="card">
        <h5 class="card-header">Daftar Artikel</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th> 
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Posisi</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; 
                    while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td>
                            <?php if (!empty($row['photo'])): ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['photo']); ?>" alt="Gambar Artikel" style="width: 50px; height: 50px; object-fit: cover;">
                            <?php else: ?>
                                <span>No Image</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $row['posisi']; ?></td>
                        <td><?php echo substr($row['deskripsi'], 0, 60) . '...'; ?></td>
                        <td><?php echo $row['level_job']; ?></td>
                        <td>
                            <a href="hapus_artikel.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus card ini?')">Hapus</a>
                            <a href="ubah_data.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengubah card ini?')">Ubah</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
include("template/footer.php");
mysqli_close($conn);
?>