<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?= $title ?></title>


    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/img/nhom1.ico">

    <link rel="stylesheet" href="<?= base_url() ?>/https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper" style="background: #F7F7FA;">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left" style="background-image:none !important;background:#fff;">
                        <img class="img-fluid" src="<?= base_url() ?>/assets/img/Nhom1.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Hệ thống quản lý sinh viên</h1>
                            <p class="account-subtitle">Đăng nhập</p>

                            <!-- Form -->
                            <?php if (isset($errorMessage)) : ?>
                                <div class="alert alert-danger">
                                    <?= $errorMessage ?>
                                </div>
                            <?php endif; ?>
                            <form method="POST">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="username" placeholder="Tài khoản">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="password" placeholder="Mật khẩu">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Đăng nhập</button>
                                </div>
                            </form>
                            <!-- /Form -->

                            <!-- <div class="text-center forgotpass"><a href="<?= base_url() ?>/forgot-password.html">Forgot Password?</a></div> -->
                            <!-- <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div> -->

                            <!-- Social Login -->
                            <!-- <div class="social-login">
                                <span>Login with</span>
                                <a href="<?= base_url() ?>/#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="<?= base_url() ?>/#" class="google"><i class="fab fa-google"></i></a>
                            </div> -->
                            <!-- /Social Login -->

                            <!-- <div class="text-center dont-have">Don’t have an account? <a href="<?= base_url() ?>/register.html">Register</a></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="<?= base_url() ?>/assets/js/script.js"></script>

</body>

</html>