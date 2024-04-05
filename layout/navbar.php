    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=home">Manajemen Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="index.php?page=navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link 
                        <?php
                        if ($_GET['page'] == 'home') {
                            echo 'active';
                        }
                        ?>
                        " aria-current="page" href="index.php?page=home"><i class="fas fa-home"></i> Home</a>
                    </li>

                    <?php
                    if (isset($_SESSION['username'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link 
                        <?php
                        if ($_GET['page'] == 'dataSaya') {
                            echo 'active';
                        }
                        ?>
                        " href="index.php?page=dataSaya"><i class="fas fa-table"></i> Data Saya</a>
                        </li>
                        <?php
                        if ($_SESSION['role'] == 'admin') {
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link 
                        <?php
                            if ($_GET['page'] == 'semua-user') {
                                echo 'active';
                            }
                        ?>
                        dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-table"></i> List Data
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="index.php?page=semua-user"><i class="fas fa-users"></i> Semua User</a></li>


                                </ul>
                            </li>
                    <?php
                        }
                    ?>
                        <?php
                            if ($_SESSION['role'] == 'guru' || $_SESSION['role'] == 'siswa') {
                            ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link 
                            <?php
                                if ($_GET['page'] == 'jadwal-kelas') {
                                    echo 'active';
                                }
                            ?>
                            dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-table"></i> List Data
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="index.php?page=jadwal-kelas"><i class="fas fa-users"></i> Jadwal Kelas</a></li>


                                    </ul>
                                </li>
                        <?php
                            }
                        }
                        ?>
          


                </ul>
                <div class="d-flex">

                    <?php
                    if (isset($_SESSION['username'])) {
                    ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> <?= $_SESSION['username']; ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="query/logoutquery.php"><i class="fas fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </div>
                    <?php
                    } else {
                    ?>
                        <a href="index.php?page=registrasi" class="btn btn-secondary me-2"><i class="fas fa-user-plus"></i> Register</a>
                        <a href="index.php?page=login" class="btn btn-success me-2"> <i class="fas fa-sign-in"></i> Login</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>