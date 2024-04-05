<?php 
require "../koneksi.php";
    if (isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $noHp = $_POST['noHp'];
        $jk = $_POST['jk'];
        $email = $_POST['email'];
        $user_id =$_POST['user_id'];
        $gambar = $_FILES['gambar'];
        
        

        if($gambar != ""){

        $namaGambar = $gambar['name'];
        $tmpGambar = $gambar['tmp_name'];
        $sizeGambar = $gambar['size'];
        $errorGambar = $gambar['error'];
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaGambar);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>window.location.href='../index.php?page=dataSaya&pesan=ekstensi-gambar';</script>";
            return false;
        }
        if ($sizeGambar > 1000000) {
            echo "<script>window.location.href='../index.php?page=dataSaya&pesan=size-gambar';</script>";
            return false;
        }
        $namaGambarBaru = uniqid();
        $namaGambarBaru .= '.';
        $namaGambarBaru .= $ekstensiGambar;
        move_uploaded_file($tmpGambar, '../asset/img/' . $namaGambarBaru);
        $query = "INSERT INTO datapribadi (nama, alamat, noHp, jk, email, user_id, gambar) VALUES ('$nama', '$alamat', '$noHp', '$jk', '$email', '$user_id', '$namaGambarBaru')";
        } else {
        $query = "INSERT INTO datapribadi (nama, alamat, noHp, jk, email, user_id) VALUES ('$nama', '$alamat', '$noHp', '$jk', '$email', '$user_id')";
        }

        $result = mysqli_query($db, $query);
        if ($result) {
            echo "<script>window.location.href='../index.php?page=dataSaya&pesan=update';</script>";
        } else {
            echo "<script>window.location.href='../index.php?page=dataSaya&pesan=gagal-update';</script>";
        }
    }
