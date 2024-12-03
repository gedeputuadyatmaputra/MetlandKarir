<?php 
    require_once '../session_check.php';
    require_once '../koneksi.php';
    requireLogin();

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql_hapus = "DELETE FROM tb_account WHERE id_admin = ?";
        $stmt = mysqli_prepare($conn, $sql_hapus);
        mysqli_stmt_bind_param($stmt, "i", $id);
    
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = "Data berhasil dihapus !";
        } else {
            $_SESSION['error_message'] = "Terjadi kesalahan saat menghapus Data: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    }
header("Location: account.php");
exit();