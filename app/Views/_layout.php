<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?= $title ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/img/nhom1.png">

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables/datatables.min.css
">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="<?= base_url() ?>/index.html" class="logo" style="">
                    <img src="<?= base_url() ?>/assets/img/nhom1.png" alt="Logo">
                    Hệ thống quản lý sinh viên
                </a>
                <a href="<?= base_url() ?>/index.html" class="logo logo-small">
                    <img src="<?= base_url() ?>/assets/img/nhom1.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <!-- /Logo -->

            <a href="<?= base_url() ?>/javascript:void(0);" id="toggle_btn">
                <i class="fas fa-align-left"></i>
            </a>

            <!-- Search Bar -->
            <!-- <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div> -->
            <!-- /Search Bar -->

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Right Menu -->
            <ul class="nav user-menu">

                <!-- Notifications -->

                <!-- /Notifications -->

                <!-- User Menu -->
                <?php session_start() ?>
                <?php $user = $_SESSION['user'] ?>
                <li class="nav-item dropdown has-arrow">
                    <a href="<?= base_url() ?>/#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img style="object-fit: cover;" class="rounded-circle" src="<?php if ($user['anh_bia'] == null || $user['anh_bia'] == '/public/img/avatar/') echo base_url() . '/public/img/avatar/user.png';
                                                                                                            else echo base_url() . $user['anh_bia'];
                                                                                                            ?>" width="31" alt="Ryan Taylor"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="<?php if ($user['anh_bia'] == null || $user['anh_bia'] == '/public/img/avatar/') echo base_url() . '/public/img/avatar/user.png';
                                            else echo base_url() . $user['anh_bia'];
                                            ?>" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6><?= $user['ho_ten'] ?></h6>
                                <p class="text-muted mb-0">Quản trị viên</p>
                            </div>
                        </div>
                        <!-- <a class="dropdown-item" href="<?= base_url() ?>/profile.html">My Profile</a> -->
                        <!-- <a class="dropdown-item" href="<?= base_url() ?>/inbox.html">Inbox</a> -->
                        <a class="dropdown-item" href="<?= base_url() ?>/login/logout">Đăng xuất</a>
                    </div>
                </li>
                <!-- /User Menu -->

            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Mục lục</span>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>"><i class="fas fa-th-large"></i> <span>Trang chủ</span></a>
                        </li>
                        <li class="submenu">
                            <a href="<?= base_url() ?>/#"><i class="fas fa-user-graduate"></i> <span> Quản lý sinh viên</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="<?= base_url() ?>/student/">Danh sách sinh viên</a></li>
                                <li><a href="<?= base_url() ?>/student/editStudent">Thêm mới sinh viên</a></li>
                            </ul>
                        </li>
                        <?php if ($user['chuc_vu'] == 0) : ?>
                            <li class="submenu">
                                <a href="<?= base_url() ?>/#"><i class="fas fa-chalkboard-teacher"></i> <span> Quản lý giảng viên</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="<?= base_url() ?>/teacher/">Danh sách giảng viên</a></li>
                                    <li><a href="<?= base_url() ?>/teacher/editTeacher">Thêm mới giảng viên</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="<?= base_url() ?>/#"><i class="fas fa-chalkboard-teacher"></i> <span> Quản lý lớp</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="<?= base_url() ?>/classes/">Danh sách lớp</a></li>
                                    <li><a href="<?= base_url() ?>/classes/editClass">Thêm mới lớp</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="<?= base_url() ?>/#"><i class="fas fa-chalkboard-teacher"></i> <span> Quản lý khoa</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="<?= base_url() ?>/Department/">Danh sách khoa</a></li>
                                    <li><a href="<?= base_url() ?>/Department/editDepartment">Thêm mới khoa</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="<?= base_url() ?>/#"><i class="fas fa-chalkboard-teacher"></i> <span> Quản lý ngành</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="<?= base_url() ?>/major/">Danh sách ngành</a></li>
                                    <li><a href="<?= base_url() ?>/major/editmajor">Thêm mới ngành</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">



            <div class="content container-fluid">
                <?= $this->renderSection('content') ?>
            </div>
            <!-- Footer -->
            <footer>
                <p>Copyright © 2021 nhom1.</p>
            </footer>
            <!-- /Footer -->

        </div>
        <!-- /Page Wrapper -->



    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="<?= base_url() ?>/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chart JS -->
    <script src="<?= base_url() ?>/assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/apexchart/chart-data.js"></script>

    <script src="<?= base_url() ?>/assets/plugins/datatables/datatables.min.js"></script>

    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/jszip.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/pdfmake.min.js"></script>

    <script src="<?= base_url() ?>/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/buttons.print.min.js"></script>

    <!-- Custom JS -->
    <script src="<?= base_url() ?>/assets/js/script.js"></script>
</body>

</html>