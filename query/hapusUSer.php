<?php 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE `user` SET `status` = '0' WHERE `id` = $id ";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>window.location.href='index.php?page=semua-user&pesan=hapus';</script>";
    } else {
        echo "<script>window.location.href='index.php?page=semua-user&pesan=gagal-hapus';</script>";
    }
}

?>