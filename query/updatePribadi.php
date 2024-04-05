<?php
include "../koneksi.php";
if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $noHp = $_POST['noHp'];
    $jk = $_POST['jk'];
    $email = $_POST['email'];
    $user_id = $_POST['user_id'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $fotobaru = date('dmYHis') . $gambar;
    $path = "../asset/img/" . $fotobaru;

    if ($gambar == "") {
        $query = "UPDATE datapribadi SET nama='$nama', alamat='$alamat', noHp='$noHp', jk='$jk', email='$email' WHERE user_id='$user_id'";
        $result = mysqli_query($db, $query);
        if ($result) {
            echo "<script>window.location.href='../index.php?page=dataSaya&pesan=update';</script>";
        } else {
            echo "<script>window.location.href='../index.php?page=dataSaya&pesan=gagal-update';</script>";
        }
    } else {
        if (move_uploaded_file($tmp, $path)) {
            $query = "SELECT * FROM datapribadi WHERE user_id='$user_id'";
            $result = mysqli_query($db, $query);
            $data = mysqli_fetch_assoc($result);
            if (is_file("../asset/img/" . $data['gambar'])) {
                unlink("../asset/img/" . $data['gambar']);
            }
            $query = "UPDATE datapribadi SET nama='$nama', alamat='$alamat', noHp='$noHp', jk='$jk', email='$email', gambar='$fotobaru' WHERE user_id='$user_id'";
            $result = mysqli_query($db, $query);


            if ($result) {
                echo "<script>window.location.href='../index.php?page=dataSaya&pesan=update';</script>";
            } else {
                echo "<script>window.location.href='../index.php?page=dataSaya&pesan=gagal-update';</script>";
            }
        } else {

            echo "<script>window.location.href='../index.php?page=dataSaya';</script>";
        }
    }
}
