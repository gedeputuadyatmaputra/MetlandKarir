<?php 
require_once '../session_check.php';
require_once '../koneksi.php';
requireLogin();

if (isset($_POST['submit'])) {
    $level_job = $_POST['level_job'];
    $deskripsi = $_POST['deskripsi'];
    $posisi = $_POST['posisi'];

   // Handle file upload
   $gambar = null;
   if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
       $gambar = file_get_contents($_FILES['gambar']['tmp_name']);
   }

   if (empty($posisi) || empty($deskripsi)) {
       $error = "posisi dan deksripsi harus diisi!";
   } else {
       $sql = "INSERT INTO tb_infojob (posisi, gambar, deskripsi, level_job) VALUES (?, ?, ?, ?)";
       $stmt = mysqli_prepare($conn, $sql);
       mysqli_stmt_bind_param($stmt, "sssi", $level_job, $gambar, $deskripsi, $posisi);
       
       if (mysqli_stmt_execute($stmt)) {
           $success = "Info Job berhasil ditambahkan!";
       } else {
           $error = "Terjadi kesalahan: " . mysqli_error($conn);
       }
       mysqli_stmt_close($stmt);
   }
}

include("template/header.php");
?>
    <div class="container">
        <h1>Upload Job</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">posisi :</label>
                <input type="text" name="posisi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi :</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="level_job">Level :</label>
                <select name="level_job">
                    <option value="">Pilih Jenis Card</option>
                    <option value="Manager">Manager</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Staff">Staff</option>
                    <option value="Non Staff">Non Staff</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>

<?php include("template/footer.php"); ?>



