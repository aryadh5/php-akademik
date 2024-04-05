<?php 

include "../koneksi.php";

if(isset($_POST['password'])){
    $password = $_POST['password'];
    $id = $_POST['user_id'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE user SET `password` = '$password' WHERE `id` = '$id'";
    $result = mysqli_query($db, $query);
    if ($result) {
        echo "<script>window.location.href='../index.php?page=dataSaya&pesan=update';</script>";
    } else {
        echo "<script>window.location.href='../index.php?page=dataSaya&pesan=gagal-update';</script>";
    }
}

?>