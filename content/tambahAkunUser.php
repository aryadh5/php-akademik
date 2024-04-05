<br>
<div class="row">
    <div class="col">
        <center>
            <div class="card w-50 shadow ">
                <div class="card-header">
                    <h3 class="text-center">Tambah User <i class="fas fa-user-plus"></i></h3>

                </div>
                <div class="card-body">
                    <form action="query/tambahUserQuery.php" method="post">
                        <div class="card-title">
                            <p class="text-mute text-center"> Masukan Semua Data User</p>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" placeholder="Username..." name="username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="role" id="role" class="form-select">
                                <option selected></option>
                                <option value="admin">Admin</option>
                                <option value="siswa">Siswa</option>
                            </select>
                            <label for="role">Pilih Role--</label>

                        </div>
                        <div class="row">
                            <div class="col">

                                <button class="w-100 btn  btn-outline-secondary" type="button" onclick="goBack()"><i class=" fas fa-angle-left"></i> Kembali </button>

                            </div>
                            <div class="col">
                                <button class="w-100 btn  btn-outline-primary" type="submit"><i class="fas fa-plus"></i> Tambah </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <br>
            
        </center>

    </div>
</div>


<?php
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    switch ($pesan) {
        case 'registrasi-gagal':
?>
            <script>
                Swal.fire({
                    title: 'Gagal!!',
                    text: `User gagal registrasi`,
                    icon: 'error',
                    confirmButtonText: 'Oke'
                })
            </script>
        <?php
            break;
        case 'sudah-terdaftar':
        ?>
            <script>
                Swal.fire({
                    title: 'Opsss!!',
                    text: `Username sudah terdaftar!!!`,
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