<?php
require '../koneksi.php';
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");
    $data = mysqli_fetch_assoc($query);
    if ($data) {
        echo "<script>window.location.href='../index.php?page=registrasi&pesan=sudah-terdaftar'</script>";
        exit;
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $query = mysqli_query($db, "INSERT INTO user VALUES (DEFAULT,'$username','$password','$role','1')");
    if ($query) {
        echo "<script>window.location.href='../index.php?page=login&pesan=registrasi-berhasil'</script>";
    } else {
        echo "<script>window.location.href='../index.php?page=registrasi&pesan=registrasi-gagal'</script>";
    }
}

?>
