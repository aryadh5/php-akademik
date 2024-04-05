<br>
<div class="row">
    <div class="col">
        <center>
            <div class="card w-50 shadow ">
                <div class="card-header">
                    <h3 class="text-center">Login <i class="fas fa-sign-in"></i></h3>

                </div>
                <div class="card-body">
                    <form action="query/loginQuery.php" method="post">
                        <div class="card-title">
                            <p class="text-mute text-center"> Masukan Username dan password anda</p>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" placeholder="Username..." name="username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="row">
                            <div class="col">

                                <button class="w-100 btn  btn-outline-secondary" type="button" onclick="goBack()"><i class=" fas fa-angle-left"></i> Kembali </button>

                            </div>
                            <div class="col">
                                <button class="w-100 btn  btn-outline-primary" type="submit"><i class="fas fa-sign-in"></i> Sign in </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <br>
            <p>Silahkan <a href="index.php?page=registrasi">registrasi</a> dulu kalau anda belum punya akun</p>
        </center>

    </div>
</div>

<?php
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    switch ($pesan) {
        case 'logout':
        ?>
            <script>
                Swal.fire({
                    title: 'Sukses!!',
                    text: `Anda Berhasil Logout`,
                    icon: 'success',
                    confirmButtonText: 'Oke'
                })
                // .then((result) => {

                //     if (result.isConfirmed) {
                //         window.location.href = 'index.php?page=home';
                //     }
                // })
            </script>
        <?php
            break;
        case 'registrasi-berhasil':
        ?>
            <script>
                Swal.fire({
                    title: 'Registrasi Berhasil!!',
                    text: `Anda Berhasil membuat akun`,
                    icon: 'success',
                    confirmButtonText: 'Oke'
                })
            </script>
        <?php
            break;
        case 'gagal-login':
        ?>
            <script>
                Swal.fire({
                    title: 'Gagal!!',
                    text: `Username atau Password Salah`,
                    icon: 'error',
                    confirmButtonText: 'Oke'
                })
            </script>
        <?php
            break;

        default:
            # code...
            break;
    }
}


?>