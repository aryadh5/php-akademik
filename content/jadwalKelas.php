<?php
$query = "SELECT * FROM matapelajaran WHERE matapelajaran.kelas = 'VII' ORDER BY hari, waktu";
$result = mysqli_query($db, $query);

$query2 = "SELECT * FROM matapelajaran WHERE matapelajaran.kelas = 'VIII' ORDER BY hari, waktu";
$result2 = mysqli_query($db, $query2);

$query3 = "SELECT * FROM matapelajaran WHERE matapelajaran.kelas = 'IX' ORDER BY hari, waktu";
$result3 = mysqli_query($db, $query3);
?>

<br>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="kelas7-tab" data-bs-toggle="tab" data-bs-target="#vii" type="button" role="tab" aria-controls="kelas7-tab" aria-selected="true">Kelas VII (Tujuh)</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="kelas8-tab" data-bs-toggle="tab" data-bs-target="#viii" type="button" role="tab" aria-controls="kelas8-tab" aria-selected="false">Kelas VIII (Delapan)</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="kelas9-tab" data-bs-toggle="tab" data-bs-target="#ix" type="button" role="tab" aria-controls="kelas9-tab" aria-selected="false">Kelas IX (Sembilan)</button>
    </li>

</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="vii" role="tabpanel" aria-labelledby="kelas7-tab">
        <div class="row">
            <div class="col">
                <div class="card border-0">
                    <div class="card-header d-flex">
                        <h4>VII</h4>
                        <div class="btn-group ms-auto" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#export">
                                <i class="fas fa-print"></i> Export
                            </button>
                            <a href="index.php?page=tambah-mapel" class="btn btn-success "><i class="fas fa-plus"></i> Tambah Jadwal</a>


                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Hari</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($result as $item) {
                                    echo "<tr>";
                                    echo "<td>" . $no++ . "</td>";
                                    echo "<td>" . $item['kelas'] . "</td>";
                                    echo "<td>" . $item['nama_mapel'] . "</td>";
                                    echo "<td>" . $item['hari'] . "</td>";
                                    echo "<td>" . $item['waktu'] . "</td>";
                                    echo "<td>
                                    <a href='index.php?page=edit-mapel&id=" . $item['id'] . "' class='btn btn-warning'><i class='fas fa-edit'></i> Edit</a>
                                </td>";
                                    echo "</tr>";
                                ?>
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
    <div class="tab-pane fade" id="viii" role="tabpanel" aria-labelledby="kelas8-tab">
        <div class="row">
            <div class="col">
                <div class="card border-0">
                    <div class="card-header d-flex">
                        <h4>VIII</h4>
                        <div class="btn-group ms-auto" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#export">
                                <i class="fas fa-print"></i> Export
                             </button>
                            <a href="index.php?page=tambah-mapel" class="btn btn-success "><i class="fas fa-plus"></i> Tambah Jadwal</a>


                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Hari</th>
                                        <th>Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($result2 as $item) {
                                        echo "<tr>";
                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . $item['kelas'] . "</td>";
                                        echo "<td>" . $item['nama_mapel'] . "</td>";
                                        echo "<td>" . $item['hari'] . "</td>";
                                        echo "<td>" . $item['waktu'] . "</td>";
                                        echo "<td>
                                        <a href='index.php?page=edit-mapel&id=" . $item['id'] . "' class='btn btn-warning'><i class='fas fa-edit'></i> Edit</a>
                                    </td>";
                                        echo "</tr>";
                                    ?>
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
        <div class="tab-pane fade" id="ix" role="tabpanel" aria-labelledby="kelas9-tab">
            <div class="row">
                <div class="col">
                    <div class="card border-0">
                        <div class="card-header d-flex">
                            <h4>IX</h4>
                                <div class="btn-group ms-auto" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#export">
                                        <i class="fas fa-print"></i> Export
                                    </button>
                                    <a href="index.php?page=tambah-mapel" class="btn btn-success "><i class="fas fa-plus"></i> Tambah Jadwal</a>
                                </div>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Hari</th>
                                        <th>Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($result3 as $item) {
                                        echo "<tr>";
                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . $item['kelas'] . "</td>";
                                        echo "<td>" . $item['nama_mapel'] . "</td>";
                                        echo "<td>" . $item['hari'] . "</td>";
                                        echo "<td>" . $item['waktu'] . "</td>";
                                        echo "<td>
                                        <a href='index.php?page=edit-mapel&id=" . $item['id'] . "' class='btn btn-warning'><i class='fas fa-edit'></i> Edit</a>
                                    </td>";
                                        echo "</tr>";
                                    ?>
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
                <a href="exportVII.php" class="btn btn-secondary"><i class="fas fa-print"></i> Kelas VII</a>
                <a href="exportVIII.php" class="btn btn-info"><i class="fas fa-print"></i> Kelas VIII</a>
                <a href="exportIX.php" class="btn btn-success"><i class="fas fa-print"></i> Kelas IX</a>
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