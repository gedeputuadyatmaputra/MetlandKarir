<?php
require_once 'session_check.php';
require_once 'koneksi.php';
requireGuest();

$error = '';  // Initialize error variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id_admin, username, password FROM tb_account WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            // Assuming the password in the database is not hashed
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id_admin'];
                $_SESSION['username'] = $row['username'];
                header("location: admin/admin.php");
                exit();
            } else {
                $error = "Invalid username and password";
            }
        } else {
            $error = "Invalid username and password";
        }
    } else {
        $error = "Database error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/admin/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Login | Metland Karir</title>
    <link rel="icon" type="image/x-icon" href="assets/img/metland_nbg.png" />
    <link rel="stylesheet" href="assets/admin/assets/vendor/css/core.css" />
    <link rel="stylesheet" href="assets/admin/assets/vendor/css/theme-default.css" />
    <link rel="stylesheet" href="assets/admin/assets/css/demo.css" />
    <link rel="stylesheet" href="assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/admin/assets/vendor/css/pages/page-auth.css" />
    <script src="assets/admin/assets/vendor/js/helpers.js"></script>
    <script src="assets/admin/assets/js/config.js"></script>
    <style>
        .carousel {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .container-xxl {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            border-radius: 10px; /* Menambahkan sudut melengkung */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
        }
    </style>
</head>

<body>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/metland/grandmet.jpg" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="assets/img/metland/mcibitung.jpg" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="assets/img/metland/mtransyogi.jpg" class="d-block w-100" alt="Image 3">
            </div>
        </div>
    </div>

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card" style="max-width: 400px; width: 100%; margin: auto;">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="index.php" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder">Metland Karir</span>
                            </a>
                        </div>
                        <h3 class="mb-2">Login</h3>
                        <p class="mb-4"></p>

                        <form id="formAuthentication" class="mb-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <?php if (!empty($error)) { echo '<div class="alert alert-danger mb-3">' . $error . '</div>'; } ?>
                            <div class="mb-3">
                                <label for="email" class="form-label">Username</label>
                                <input type="text" class="form-control" id="email" name="username" placeholder="Enter your username" autofocus required />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <a href="index.php">
                                <span>Kembali ke Beranda</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/admin/assets/vendor/js/bootstrap.js"></script>
    <script src="assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/admin/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/admin/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>