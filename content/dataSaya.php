<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];

    $query = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $query2 = "SELECT * FROM datapribadi INNER JOIN user ON datapribadi.user_id = user.id WHERE datapribadi.user_id = $id";
    $result2 = mysqli_query($db, $query2);
    $row2 = mysqli_fetch_assoc($result2);
} else {
    header("Location: index.php");
}

?>

<br>
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <img src="asset/img/<?= $row2['gambar']; ?>" alt="" width="100">
                </div>
                <div class="col">
                    <h5 class="card-title">Data Saya</h5>
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <?php
                            if ($row2 == NULL) {
                                echo "<td>Belum Diisi</td>";
                            } else {
                                echo "<td>" . $row2['nama'] . "</td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>

                            <?php
                            if ($row2 == NULL) {
                                echo "<td>Belum Diisi</td>";
                            } else {
                                echo "<td>" . $row2['alamat'] . "</td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>:</td>
                            <?php
                            if ($row2 == NULL) {
                                echo "<td>Belum Diisi</td>";
                            } else {
                                echo "<td>" . $row2['noHp'] . "</td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <?php
                            if ($row2 == NULL) {
                                echo "<td>Belum Diisi</td>";
                            } else {
                                echo "<td>" . $row2['jk'] . "</td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <?php
                            if ($row2 == NULL) {
                                echo "<td>Belum Diisi</td>";
                            } else {
                                echo "<td>" . $row2['email'] . "</td>";
                            }
                            ?>
                        </tr>
                    </table>


                </div>
                <div class="col">
                    <h5 class="card-title">Opsi</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary mt-2" data-bs-toggle="modal" data-bs-target="#password<?php echo $row['id'] ?>">
                        <i class="fas fa-key"></i> Ubah Password
                    </button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning mt-2" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['id'] ?>">
                        <i class="fas fa-edit"></i> Ubah Data
                    </button>

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal DATA DIRI -->
<div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="
                                    <?php
                                    if ($row2 == NULL) {
                                        echo "query/tambahPribadi.php";
                                    } else {
                                        echo "query/updatePribadi.php";
                                    }
                                    ?>
                                    " method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php
                                                                                                if ($row2 == NULL) {
                                                                                                    echo "";
                                                                                                } else {
                                                                                                    echo $row2['nama'];
                                                                                                }
                                                                                                ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php
                                                                                                    if ($row2 == NULL) {
                                                                                                        echo "";
                                                                                                    } else {
                                                                                                        echo $row2['alamat'];
                                                                                                    }
                                                                                                    ?>">
                    </div>
                    <div class="mb-3">
                        <label for="noHp" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" id="noHp" name="noHp" value="<?php
                                                                                                if ($row2 == NULL) {
                                                                                                    echo "";
                                                                                                } else {
                                                                                                    echo $row2['noHp'];
                                                                                                }
                                                                                                ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example" id="jk" name="jk">
                            <option selected>
                                <?php
                                if ($row2 == NULL) {
                                    echo "";
                                } else {
                                    echo $row2['jk'];
                                }
                                ?>
                            </option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="
                                            <?php
                                            if ($row2 == NULL) {
                                                echo "";
                                            } else {
                                                echo $row2['email'];
                                            }
                                            ?>">
                        <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jk" class="form-label">File Gambar</label>
                        <input class="form-control" type="file" id="gambar" name="gambar">

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="fas fa-close"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="password<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="query/updatePass.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
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
        case 'ekstensi-gambar':
        ?>
            <script>
                Swal.fire({
                    title: 'Opss!!',
                    text: `File Gambar Harus berupa Jpg, Png, Jpeg !`,
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