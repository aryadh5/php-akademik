<?php
include "../koneksi.php";
if (isset($_POST['kelas'])) {
    $kelas = $_POST['kelas'];
    $nama_mapel = $_POST['nama_mapel'];
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];
    $id = $_POST['id'];

        $query = "UPDATE matapelajaran SET kelas='$kelas', nama_mapel='$nama_mapel', hari='$hari', waktu='$waktu' WHERE id='$id'";
        $result = mysqli_query($db, $query);
        if (!$result) {
            die("Query Error: " . mysqli_errno($db) .
                " - " . mysqli_error($db));
        } else {
            echo "<script>window.location='../index.php?page=jadwal-kelas&pesan=update';</script>";
        }
    }
