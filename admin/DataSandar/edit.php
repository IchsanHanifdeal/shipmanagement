<?php
session_start();
include '../../backend/koneksi.php';
$nama = $_SESSION['nama'];

if (!isset($_GET['id'])) {
    header("Location: DataSandar.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM data_sandar WHERE Id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: DataSandar.php");
    exit();
}

$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaKapal = $_POST["nama_kapal"];
    $pbm = $_POST["pbm"];
    $barang = $_POST["barang"];
    $dermaga = $_POST["dermaga"];
    $meteran = $_POST["meteran"];
    $ikatTali = $_POST["ikat_tali"];
    $mulaiKegiatan = $_POST["mulai_kegiatan"];
    $tonManifest = $_POST["ton_manifest"];
    $tonRealisasi = $_POST["ton_realisasi"];
    $persentase = $_POST["persentase"];

    $sql = "UPDATE data_sandar SET NamaKapal = '$namaKapal', PBM = '$pbm', Barang = '$barang', Dermaga = '$dermaga', Meteran = '$meteran', 
            IkatTali = '$ikatTali', MulaiKegiatan = '$mulaiKegiatan', 
            TonManifest = '$tonManifest', TonRealisasi = '$tonRealisasi', Persentase = '$persentase' WHERE Id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: DataSandar.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ship Management | Dashboard </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../app/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../app/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../app/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <style>
        .fixed-bottom-right {
            position: fixed;
            bottom: 100px;
            right: 20px;
        }
    </style>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../../images/logo.png" alt="logo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="../../images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><?php echo $nama; ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar"><br>
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="../Dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="../User/User.php" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item  menu-open">
                            <a href="DataSandar.php" class="nav-link  active">
                                <i class="nav-icon fas fa-anchor"></i>
                                <p>
                                    Data Sandar Kapal
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="../Sailing/Sailing.php" class="nav-link">
                                <i class="nav-icon fas fa-ship"></i>
                                <p>
                                    Sailing
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Log Out
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit Data Sandar</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Your form to edit sailing data -->
                                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . '?id=' . $id; ?>">
                                        <div class="form-group">
                                            <label for="nama_kapal">Nama Kapal:</label>
                                            <input type="text" class="form-control" name="nama_kapal" value="<?php echo $row['NamaKapal']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pbm">PBM:</label>
                                            <input type="text" class="form-control" name="pbm" value="<?php echo $row['PBM']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="barang">Barang:</label>
                                            <input type="text" class="form-control" name="barang" value="<?php echo $row['Barang']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="dermaga">Dermaga:</label>
                                            <input type="text" class="form-control" name="dermaga" value="<?php echo $row['Dermaga']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="meteran">Meteran:</label>
                                            <input type="text" class="form-control" name="meteran" value="<?php echo $row['Meteran']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="ikat_tali">Ikat Tali:</label>
                                            <input type="date" class="form-control" name="ikat_tali" value="<?php echo $row['IkatTali']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="mulai_kegiatan">Mulai Kegiatan:</label>
                                            <input type="date" class="form-control" name="mulai_kegiatan" value="<?php echo $row['MulaiKegiatan']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="ton_manifest">Ton Manifest:</label>
                                            <input type="number" class="form-control" name="ton_manifest" value="<?php echo $row['TonManifest']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="ton_realisasi">Ton Realisasi:</label>
                                            <input type="number" class="form-control" name="ton_realisasi" value="<?php echo $row['TonRealisasi']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="persentase">Persentase:</label>
                                            <input type="number" class="form-control" name="persentase" value="<?php echo $row['Persentase']; ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    <!-- End of form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2023 <a>Dody Sahendra Wijaya</a>.</strong>
                All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <!-- Load jQuery first -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

        <!-- Load DataTables after jQuery -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <!-- Load other required scripts -->
        <script src="../../app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../app/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="../../app/dist/js/adminlte.js"></script>
        <script src="../../app/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="../../app/plugins/raphael/raphael.min.js"></script>
        <script src="../../app/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="../../app/plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <script src="../../app/plugins/chart.js/Chart.min.js"></script>
        <script src="../../app/dist/js/demo.js"></script>
        <script src="../../app/dist/js/pages/dashboard2.js"></script>
</body>

</html>