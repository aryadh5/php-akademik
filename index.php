<?php

require 'koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'home':
                    echo "Home";
                    break;
                case 'dataSaya':
                    echo "Data Saya";
                    break;
                case 'semua-user':
                    echo "Semua User";
                    break;
                case 'jadwal-kelas':
                    echo "Jadwal Kelas";
                    break;
                case 'login':
                    echo "Login";
                    break;
                case 'registrasi':
                    echo "Registrasi";
                    break;
                default:
                    echo "Maaf. Halaman tidak di temukan !";
                    break;
            }
        } else {
            echo "Home";
        }

        ?>
    </title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<!-- List Script -->
<div class="list-script">
    <script src="asset/js/jquery-3.6.0.min.js"></script>
    <script src="asset/js/bootstrap.bundle.min.js"></script>
    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="asset/js/jquery.richtext.js"></script>
    <script src="asset/js/jquery.richtext.min.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</div>
<!-- End List Script -->

<body>
    <?php include "layout/navbar.php" ?>

    <div class="container">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'home':
                    include "content/home.php";
                    break;
                case 'dataSaya':
                    include "content/dataSaya.php";
                    break;
                case 'semua-user':
                    if (isset($_SESSION['role'])) {
                        if ($_SESSION['role'] != 'admin') {
                            echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Anda tidak memiliki akses untuk halaman ini!',
                                footer: '<a href=\"index.php\">Kembali ke Home</a>'
                            })
                            </script>";
                            exit;
                        }
                    } else {
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Anda tidak memiliki akses untuk halaman ini!',
                                footer: '<a href=\"index.php\">Kembali ke Home</a>'
                            })
                            </script>";
                        exit;
                    }
                    include "content/semuaUser.php";
                    break;
                case 'jadwal-kelas':
                    if (isset($_SESSION['role'])) {
                        if ($_SESSION['role'] == 'admin') {
                            echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Anda tidak memiliki akses untuk halaman ini!',
                                footer: '<a href=\"index.php\">Kembali ke Home</a>'
                            })
                            </script>";
                            exit;
                        }
                    } else {
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Anda tidak memiliki akses untuk halaman ini!',
                                footer: '<a href=\"index.php\">Kembali ke Home</a>'
                            })
                            </script>";
                        exit;
                    }
                    include "content/jadwalKelas.php";
                    break;
                case 'login':
                    include "content/login.php";
                    break;
                case 'registrasi':
                    include "content/registrasi.php";
                    break;
                case 'edit-user':
                    include "content/editUser.php";
                    break;
                case 'hapus-user':
                    include "query/hapusUser.php";
                    break;
                case 'hapus-user2':
                    include "query/hapusUser2.php";
                    break;
                case 'tambah-user':
                    include "content/tambahAkunUser.php";
                    break;
                case 'edit-mapel':
                    include "content/editMapel.php";
                    break;
                case 'hapus-mapel':
                    include "query/hapusMapel.php";
                    break;
                case 'tambah-mapel':
                        if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'siswa') {
                            echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Anda tidak memiliki akses untuk halaman ini!',
                                footer: '<a href=\"index.php\">Kembali ke Home</a>'
                            })
                            </script>";
                            exit;
                        }
                    } else {
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Anda tidak memiliki akses untuk halaman ini!',
                                footer: '<a href=\"index.php\">Kembali ke Home</a>'
                            })
                            </script>";
                        // exit;
                    }
                    include "content/tambahMapel.php";
                    break;

                default:
                    echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Halaman ini tidak tersedia!!',
                                footer: '<a href=\"index.php\">Kembali ke Home</a>'
                            })
                            </script>";
                    break;
            }
        } else {
            include "content/home.php";
        }
        ?>

    </div>


</body>

</html>