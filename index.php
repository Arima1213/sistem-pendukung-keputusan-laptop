<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SPK Laptop One</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.min.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Login Pengguna</h4>
                                    <p class="mb-0">Masukkan username dan password Anda untuk masuk</p>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($_SESSION['message'])): ?>
                                    <div class="alert alert-danger alert-block">
                                        <strong><?= $_SESSION['message']; ?></strong>
                                    </div>
                                    <?php session_unset(); ?>
                                    <?php endif; ?>
                                    <form method="POST" action="cekLogin.php" role="form">
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg" name="username"
                                                placeholder="Username" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control form-control-lg" name="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"
                                                value="Login">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Belum punya akun?
                                        <a href="#" class="text-primary text-gradient font-weight-bold">Daftar</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('assets/img/login_icon.svg'); background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                                    currency"</h4>
                                <p class="text-white position-relative">The more effortless the writing looks, the more
                                    effort the writer actually put into the process.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Core JS Files -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
</body>

</html>