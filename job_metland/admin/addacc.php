<?php 
require_once '../session_check.php';
require_once '../koneksi.php';

requireLogin();
$error = '';
$success = '';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    if (empty($error)) {
        $sql = "INSERT INTO tb_account (nama_admin, username, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $nama, $username, $password);

        if (mysqli_stmt_execute($stmt)) {
            $success = "Akun admin berhasil dibuat!";
        } else {
            $error = "Terjadi kesalahan: " . mysqli_error($conn);
        }
    }
}

include("template/header.php");
?>

<div class="row">
    <div class="col-md-12">
        <h2 class="card-header">Add Account Admin</h2>
        <div class="card mb-5">
            <div class="card-body">
                <?php if ($error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if ($success): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_admin" name="nama_admin" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="input-group-text cursor-pointer" id="togglePassword">
                            <i class="bx bx-hide" id="passwordIcon"></i>
                        </span>
                    </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Buat Akun</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const passwordIcon = document.getElementById('passwordIcon');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        passwordIcon.classList.toggle('bx-hide');
        passwordIcon.classList.toggle('bx-show');
    });
</script>
<?php include("template/footer.php"); ?>
