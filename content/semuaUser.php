<?php
$query = "SELECT * FROM datapribadi INNER JOIN user ON datapribadi.user_id = user.id ";
$result = mysqli_query($db, $query);

$query2 = "SELECT * FROM user";
$result2 = mysqli_query($db, $query2);
?>

<br>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#semua" type="button" role="tab" aria-controls="home" aria-selected="true">Data Profil User</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="akun-tab" data-bs-toggle="tab" data-bs-target="#akun" type="button" role="tab" aria-controls="akun" aria-selected="false">Data Semua Akun</button>
    </li>

</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col">
                <div class="card border-0">
                    <div class="card-header d-flex">
                        <h4>Data Profil User</h4>
                        <div class="btn-group ms-auto" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#export">
                                <i class="fas fa-print"></i> Export
                            </button>
                            <a href="index.php?page=tambah-user" class="btn btn-success "><i class="fas fa-plus"></i> Tambah user</a>


                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($result as $item) {
                                    echo "<tr>";
                                    echo "<td>" . $no++ . "</td>";
                                    echo "<td> <img src='asset/img/" . $item['gambar'] . "' width='100px'></td>";
                                    echo "<td>" . $item['nama'] . "</td>";
                                    echo "<td>" . $item['email'] . "</td>";
                                    echo "<td>" . $item['role'] . "</td>";
                                    echo "<td>" . $item['alamat'] . "</td>";
                                    echo "<td>" . $item['noHp'] . "</td>";
                                    echo "<td>" .

                                        ($item['status'] == 1 ? "<span class='badge bg-success'>Aktif</span>" : "<span class='badge bg-danger'>Tidak Aktif</span>")

                                        . "</td>";
                                    echo "<td>
                             <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#password" . $item['id'] . "'>
                        <i class='fas fa-key'></i></button>
                                    <a href='index.php?page=edit-user&id=" . $item['id'] . "' class='btn btn-warning'><i class='fas fa-edit'></i> Edit</a>
                                </td>";
                                    echo "</tr>";
                                ?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="password<?php echo $item['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="query/updatePassUser.php" method="post">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password">
                                                            <input type="hidden" name="user_id" value="<?= $item['id']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="akun" role="tabpanel" aria-labelledby="akun-tab">
        <div class="row">
            <div class="col">
                <div class="card border-0">
                    <div class="card-header d-flex">
                        <h4>Data Semua Akun</h4>

                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($result2 as $item) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $item['username']; ?></td>
                                        <td><?= $item['status'] == 1 ? "<span class='badge bg-success'>Aktif</span>" : "<span class='badge bg-danger'>Tidak Aktif</span>"; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#password2<?= $item['id']; ?>">
                                                <i class="fas fa-key"> </i>
                                                Ubah Password
                                            </button>
                                            <a href="index.php?page=hapus-user2&id=<?= $item['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="password2<?php echo $item['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="query/updatePassUser.php" method="post">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password">
                                                            <input type="hidden" name="user_id" value="<?= $item['id']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>




<!-- Modal -->
<div class="modal fade" id="export" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Export</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <a href="exportSiswa.php" class="btn btn-info"><i class="fas fa-print"></i> Siswa</a>
                <a href="exportAdmin.php" class="btn btn-info"><i class="fas fa-print"></i> Admin</a>
                <a href="export.php" class="btn btn-dark"><i class="fas fa-print"></i> Semua</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#example2').DataTable();
    });
</script>

<?php
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    switch ($pesan) {
        case 'update':
?>
            <script>
                Swal.fire({
                    title: 'Sukses!!',
                    text: `Data Berhasil Diuabah!!`,
                    icon: 'success',
                    confirmButtonText: 'Oke'
                })
            </script>
        <?php
            break;
        case 'tambah-berhasil':
        ?>
            <script>
                Swal.fire({
                    title: 'Sukses!!',
                    text: `Data Berhasil Ditambah!!`,
                    icon: 'success',
                    confirmButtonText: 'Oke'
                })
            </script>
        <?php
            break;
        case 'tambah-gagal':
        ?>
            <script>
                Swal.fire({
                    title: 'Gagal!!',
                    text: `Data Gagal Ditambah!!`,
                    icon: 'error',
                    confirmButtonText: 'Oke'
                })
            </script>
        <?php
            break;
        case 'hapus':
        ?>
            <script>
                Swal.fire({
                    title: 'Sukses!!',
                    text: `Data Berhasil Dihapus!!`,
                    icon: 'success',
                    confirmButtonText: 'Oke'
                })
            </script>
        <?php
            break;

        case 'gagal-update':
        ?>
            <script>
                Swal.fire({
                    title: 'Gagal!!',
                    text: `Data gagal diubah !`,
                    icon: 'error',
                    confirmButtonText: 'Oke'
                })
            </script>
        <?php
            break;
        case 'gagal-hapus':
        ?>
            <script>
                Swal.fire({
                    title: 'Gagal!!',
                    text: `Data gagal Dihapus !`,
                    icon: 'error',
                    confirmButtonText: 'Oke'
                })
            </script>
        <?php
            break;
        case 'ekstensi-gambar':
        ?>
            <script>
                Swal.fire({
                    title: 'Opss!!',
                    text: `Ekstensi gambar yang boleh hanya jpg, jpeg, dan png.!`,
                    icon: 'error',
                    confirmButtonText: 'Oke'
                })
            </script>
        <?php
            break;
        case 'size-gambar':
        ?>
            <script>
                Swal.fire({
                    title: 'Opss!!',
                    text: `Ukuran Gambar terlalu besar ,max 100000 kb 10Mb/ !`,
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