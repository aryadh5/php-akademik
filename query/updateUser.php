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
    $status = $_POST['status'];

    if ($gambar != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $gambar;
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../assets/img/' . $nama_gambar_baru);

            $query = "UPDATE datapribadi SET nama='$nama', alamat='$alamat', noHp='$noHp', jk='$jk', email='$email', gambar='$nama_gambar_baru' WHERE user_id='$user_id'";

            $query2 = "UPDATE user SET status='$status' WHERE id = $user_id";

            $result = mysqli_query($db, $query);
            $result2 = mysqli_query($db, $query2);

            if (!$result) {
                die("Query Error: " . mysqli_errno($db) .
                    " - " . mysqli_error($db));
            } else {
                echo "<script>window.location='../index.php?page=semua-user&pesan=update';</script>";
            }
        } else {
            echo "<script>window.location='../index.php?page=semua-user&pesan=ekstensi-gambar';</script>";
        }
    } else {
        $query = "UPDATE datapribadi SET nama='$nama', alamat='$alamat', noHp='$noHp', jk='$jk', email='$email' WHERE user_id='$user_id'";
        $query2 = "UPDATE user SET `status`='$status' WHERE `id` = $user_id";
        $result2 = mysqli_query($db, $query2);
        $result = mysqli_query($db, $query);
        if (!$result) {
            die("Query Error: " . mysqli_errno($db) .
                " - " . mysqli_error($db));
        } else {
            echo "<script>window.location='../index.php?page=semua-user&pesan=update';</script>";
        }
    }

}
