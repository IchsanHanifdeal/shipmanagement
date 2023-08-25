<?php
session_start();
include '../../backend/koneksi.php';
$nama = $_SESSION['nama'];
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
                        <li class="nav-item">
                            <a href="../DataSandar/DataSandar.php" class="nav-link">
                                <i class="nav-icon fas fa-anchor"></i>
                                <p>
                                    Data Sandar Kapal
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="Sailing.php" class="nav-link active">
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
                            <h1 class="m-0">Admin | Ship Management</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
            <table id="example" class="display dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kapal</th>
                        <th>PBM</th>
                        <th>Barang</th>
                        <th>Dermaga</th>
                        <th>Meteran</th>
                        <th>Ikat Tali</th>
                        <th>Mulai Kegiatan</th>
                        <th>Selesai Kegiatan</th>
                        <th>Lepas Tali</th>
                        <th>Ton Manifest</th>
                        <th>Ton Realisasi</th>
                        <th>Persentase</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM sailing;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        $Id = $row['Id'];
                        $NamaKapal = $row['NamaKapal'];
                        $PBM = $row['PBM'];
                        $Barang = $row['Barang'];
                        $Dermaga = $row['Dermaga'];
                        $Meteran = $row['Meteran'];
                        $IkatTali = $row['IkatTali'];
                        $MulaiKegiatan = $row['MulaiKegiatan'];
                        $SelesaiKegiatan = $row['SelesaiKegiatan'];
                        $LepasTali = $row['LepasTali'];
                        $TonManifest = $row['TonManifest'];
                        $TonRealisasi = $row['TonRealisasi'];
                        $Persentase = $row['Persentase'];
                        $Status = $row['Status'];
                ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $NamaKapal; ?></td>
                            <td><?php echo $PBM; ?></td>
                            <td><?php echo $Barang; ?></td>
                            <td><?php echo $Dermaga; ?></td>
                            <td><?php echo $Meteran; ?></td>
                            <td><?php echo $IkatTali; ?></td>
                            <td><?php echo $MulaiKegiatan; ?></td>
                            <td><?php echo $SelesaiKegiatan; ?></td>
                            <td><?php echo $LepasTali; ?></td>
                            <td><?php echo $TonManifest; ?></td>
                            <td><?php echo $TonRealisasi; ?></td>
                            <td><?php echo $Persentase; ?></td>
                            <td><?php echo $Status; ?></td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm edit-btn" data-id="<?php echo $Id; ?>">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm delete-btn" onclick="deleteRecord(<?php echo $Id; ?>)">Delete</button>
                            </td>
                        </tr>
                <?php
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6'>No data found</td></tr>";
                }
                ?>
                </tbody>
                </tr>
            </table>
            <div class="fixed-bottom-right">
                <a href="tambah.php" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>

            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2023 <a>Dody Sahendra Wijaya</a>.</strong>
                All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
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

        <script>
            $(document).ready(function() {
                $('.edit-btn').click(function() {
                    var id = $(this).data('id');
                    Swal.fire({
                        title: 'Edit Confirmation',
                        text: 'Do you want to edit this data?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, edit it!',
                        cancelButtonText: 'Cancel',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'edit.php?id=' + id;
                        }
                    });
                });
            });


            function deleteRecord(id) {
                Swal.fire({
                    title: 'Delete Confirmation',
                    text: 'Do you want to delete this data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Deleting...',
                            text: 'Please wait while the data is being deleted.',
                            icon: 'info',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                        });

                        $.ajax({
                            type: 'POST',
                            url: 'hapus.php',
                            data: {
                                id: id
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', 'The data has been deleted.', 'success').then(() => {
                                    location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire('Delete Failed', 'Failed to delete the data.', 'error');
                            }
                        });
                    }
                });
            }
        </script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
</body>

</html>