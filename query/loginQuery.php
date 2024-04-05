<?php 

require '../koneksi.php';
// login proccess
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");
    $data = mysqli_fetch_assoc($query);
    if (password_verify($password, $data['password']) AND $data > 0) {
        session_start();
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['id'] = $data['id'] ;
        $_SESSION['status'] = 'login';
        echo "<script>window.location.href='../index.php?page=home&pesan=berhasil-login'</script>";
    } else {
        
        echo "<script>window.location.href='../index.php?page=login&pesan=gagal-login'</script>";
    }

}

?>