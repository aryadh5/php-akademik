<?php
require '../koneksi.php';
if (isset($_POST['kelas'])) {
    $kelas = $_POST['kelas'];
    $nama_mapel = $_POST['nama_mapel'];
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];


    $query = mysqli_query($db, "SELECT * FROM matapelajaran WHERE kelas='$kelas' AND waktu='$waktu' AND hari='$hari'");
    $data = mysqli_fetch_assoc($query);
    if ($data) {
        echo "<script>window.location.href='../index.php?page=jadwal-kelas&pesan=jadwal-bentrok'</script>";
        exit;
    }    
    $query = mysqli_query($db, "INSERT INTO matapelajaran VALUES (DEFAULT,'$kelas','$nama_mapel','$hari','$waktu')");
    if ($query) {
        echo "<script>window.location.href='../index.php?page=jadwal-kelas&pesan=tambah-berhasil'</script>";
    } else {
        echo "<script>window.location.href='../index.php?page=jadwal-kelas&pesan=tambah-gagal'</script>";
    }
}

?>