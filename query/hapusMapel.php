<?php 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `matapelajaran` WHERE `id` = $id";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>window.location.href='index.php?page=jadwal-kelas&pesan=hapus';</script>";
    } else {
        echo "<script>window.location.href='index.php?page=jadwal-kelas&pesan=gagal-hapus';</script>";
    }
}

?>