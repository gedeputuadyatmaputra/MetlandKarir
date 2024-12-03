<?php 
    require_once '../../session_check.php';
    require_once '../../koneksi.php';
    requireLogin();

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        // Ambil nama file CV dari database
        $sql_get_file = "SELECT upload_cv FROM tb_profesional WHERE id_pro = ?";
        $stmt_get_file = mysqli_prepare($conn, $sql_get_file);
        mysqli_stmt_bind_param($stmt_get_file, "i", $id);
        mysqli_stmt_execute($stmt_get_file);
        mysqli_stmt_bind_result($stmt_get_file, $file_cv);
        mysqli_stmt_fetch($stmt_get_file);
        mysqli_stmt_close($stmt_get_file);

        // Hapus file CV dari server jika ada
        if ($file_cv) {
            $file_path = '../../assets/cv_profesional/' . $file_cv;
            if (file_exists($file_path)) {
                unlink($file_path); // Menghapus file
            }
        }

        $sql_hapus = "DELETE FROM tb_profesional WHERE id_pro = ?";
        $stmt = mysqli_prepare($conn, $sql_hapus);
        mysqli_stmt_bind_param($stmt, "i", $id);
    
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = "Data berhasil dihapus !";
        } else {
            $_SESSION['error_message'] = "Terjadi kesalahan saat menghapus Data: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    }
header("Location: datapro.php");
exit();