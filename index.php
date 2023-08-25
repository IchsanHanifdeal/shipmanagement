<?php
session_start();

include './backend/koneksi.php';
$per_page = 5;
$sql_count_data_sandar = "SELECT COUNT(*) AS total FROM data_sandar";
$result_count_data_sandar = $conn->query($sql_count_data_sandar);
$row_count_data_sandar = $result_count_data_sandar->fetch_assoc();
$total_data_data_sandar = $row_count_data_sandar['total'];
$total_pages_data_sandar = ceil($total_data_data_sandar / $per_page);
$current_page_data_sandar = isset($_GET['page_data_sandar']) ? $_GET['page_data_sandar'] : 1;
$offset_data_sandar = ($current_page_data_sandar - 1) * $per_page;
$sql_data_sandar = "SELECT * FROM data_sandar LIMIT $offset_data_sandar, $per_page";
$result_data_sandar = $conn->query($sql_data_sandar);

$sql_count_sailing = "SELECT COUNT(*) AS total FROM Sailing";
$result_count_sailing = $conn->query($sql_count_sailing);
$row_count_sailing = $result_count_sailing->fetch_assoc();
$total_data_sailing = $row_count_sailing['total'];
$total_pages_sailing = ceil($total_data_sailing / $per_page);
$current_page_sailing = isset($_GET['page_sailing']) ? $_GET['page_sailing'] : 1;
$offset_sailing = ($current_page_sailing - 1) * $per_page;
$sql_sailing = "SELECT * FROM Sailing LIMIT $offset_sailing, $per_page";
$result_sailing = $conn->query($sql_sailing);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <style>
        .data-sailing-section {
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar" role="navigation" aria-label="main navigation" style="background-color:#023047;">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <img src="./images/logo.png">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <nav id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item has-text-white has-text-weight-bold" href="#home">
                    Home
                </a>

                <a class="navbar-item has-text-white has-text-weight-bold" href="#about">
                    About
                </a>

                <a class="navbar-item has-text-white has-text-weight-bold" href="#contact">
                    Contact
                </a>
            </div>
        </nav>
        <?php
        if (isset($_SESSION['nama'])) {
            echo '<div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="admin/dashboard.php">
                        Dashboard
                    </a>
                    <a class="button is-danger" href="admin/logout.php">
                        Logout
                    </a>
                </div>
            </div>
        </div>';
        } else {
            echo '<div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="login.php">
                        Log in
                    </a>
                </div>
            </div>
        </div>';
        }
        ?>
    </nav>
    <section class="hero is-primary is-high" style="background-color: #219EBC;">
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-end">
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="hero-body">
            <div class="container has-text-centered">
                <p class="title">
                    Ship
                </p>
                <p class="subtitle">
                    Management
                </p>
            </div>
        </div>

        <div class="hero-foot fixed">
            <nav class="tabs is-boxed is-fullwidth">
                <div class="container">
                    <ul>
                        <li><a href=#data_sandar_kapal>Data Sandar Kapal</a></li>
                        <li><a href=#data_sailing>Sailing</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>
    <!-- /Navbar -->
    <!-- Content -->
    <div class="container is-max-widescreen" id="data_sandar_kapal">
        <div class="notification is-light mt-4">
            <center><strong>Data Sandar Kapal</strong></center>
        </div>
    </div>
    <figure class="image is-3by1 mt-4">
        <img src="images/all2.png">
    </figure>
    <!--
    <figure class="image is-3by1 mt-4">
        <img src="images/laneA.png">
    </figure>
    <figure class="image is-3by1 mt-4">
        <img src="images/laneB.png">
    </figure>
    <figure class="image is-3by1 mt-4">
        <img src="images/laneC.png">
    </figure>
    -->
    <div class="container is-max-widescreen" id="data_sandar_kapal">
        <table class="table mt-4">
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
                    <th>Ton (Manifest)</th>
                    <th>Ton (Realisasi)</th>
                    <th>Persentase</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_data_sandar = "SELECT * FROM data_sandar LIMIT $offset_data_sandar, $per_page";
                $result_data_sandar = $conn->query($sql_data_sandar);
                $No_data_sandar = ($current_page_data_sandar - 1) * $per_page + 1;

                if ($result_data_sandar->num_rows > 0) {
                    while ($row_data_sandar = $result_data_sandar->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $No_data_sandar . "</td>";
                        echo "<td>" . $row_data_sandar["NamaKapal"] . "</td>";
                        echo "<td>" . $row_data_sandar["PBM"] . "</td>";
                        echo "<td>" . $row_data_sandar["Barang"] . "</td>";
                        echo "<td>" . $row_data_sandar["Dermaga"] . "</td>";
                        echo "<td>" . $row_data_sandar["Meteran"] . "</td>";
                        echo "<td>" . $row_data_sandar["IkatTali"] . "</td>";
                        echo "<td>" . $row_data_sandar["MulaiKegiatan"] . "</td>";
                        echo "<td>" . $row_data_sandar["TonManifest"] . "</td>";
                        echo "<td>" . $row_data_sandar["TonRealisasi"] . "</td>";
                        echo "<td>" . $row_data_sandar["Persentase"] . "</td>";
                        echo "</tr>";
                        $No_data_sandar++;
                    }
                } else {
                    echo "<tr><td colspan='11'>Tidak ada data yang ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Pagination Data Sandar Kapal -->
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        <ul class="pagination-list">
            <?php
            for ($i = 1; $i <= $total_pages_data_sandar; $i++) {
                echo '<li>';
                if ($i == $current_page_data_sandar) {
                    echo '<a class="pagination-link is-current" aria-label="Page ' . $i . '" aria-current="page">' . $i . '</a>';
                } else {
                    echo '<a href="?page_data_sandar=' . $i . '" class="pagination-link" aria-label="Goto page ' . $i . '">' . $i . '</a>';
                }
                echo '</li>';
            }
            ?>
        </ul>
    </nav>
    <div class="container.is-fullhd data-sailing-section" id="data_sailing">
        <div class="notification is-light mt-4">
            <center><Strong>Data Sailing Kapal</Strong></center>
        </div>
        <center>
            <table class="table mt-4">
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_sailing = "SELECT * FROM Sailing LIMIT $offset_sailing, $per_page";
                    $result_sailing = $conn->query($sql_sailing);
                    $No_sailing = ($current_page_sailing - 1) * $per_page + 1;

                    if ($result_sailing->num_rows > 0) {
                        while ($row_sailing = $result_sailing->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $No_sailing . "</td>";
                            echo "<td>" . $row_sailing["NamaKapal"] . "</td>";
                            echo "<td>" . $row_sailing["PBM"] . "</td>";
                            echo "<td>" . $row_sailing["Barang"] . "</td>";
                            echo "<td>" . $row_sailing["Dermaga"] . "</td>";
                            echo "<td>" . $row_sailing["Meteran"] . "</td>";
                            echo "<td>" . $row_sailing["IkatTali"] . "</td>";
                            echo "<td>" . $row_sailing["MulaiKegiatan"] . "</td>";
                            echo "<td>" . $row_sailing["SelesaiKegiatan"] . "</td>";
                            echo "<td>" . $row_sailing["LepasTali"] . "</td>";
                            echo "<td>" . $row_sailing["TonManifest"] . "</td>";
                            echo "<td>" . $row_sailing["TonRealisasi"] . "</td>";
                            echo "<td>" . $row_sailing["Persentase"] . "</td>";
                            echo "<td>" . $row_sailing["Status"] . "</td>";
                            echo "</tr>";
                            $No_sailing++;
                        }
                    } else {
                        echo "<tr><td colspan='14'>Tidak ada data yang ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
        </center>
        </table>
    </div>
    <!-- Pagination Data Sailing Kapal -->
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        <ul class="pagination-list">
            <?php
            for ($i = 1; $i <= $total_pages_sailing; $i++) {
                echo '<li>';
                if ($i == $current_page_sailing) {
                    echo '<a class="pagination-link is-current" aria-label="Page ' . $i . '" aria-current="page">' . $i . '</a>';
                } else {
                    echo '<a href="?page_sailing=' . $i . '" class="pagination-link" aria-label="Goto page ' . $i . '">' . $i . '</a>';
                }
                echo '</li>';
            }
            ?>
        </ul>
    </nav>
    <!-- /Content -->
    <!-- Footer -->
    <footer class="footer" style="background-color:#023047">
        <div class="content has-text-centered has-text-white has-text-weight-bold">
            <p>
                <strong class="has-text-white">Created</strong> by <a href="#" class="has-text-white has-text-weight-bold">&copy; Dody Sahendra Wijaya</a>.
            </p>
        </div>
    </footer>

    <!-- /Footer -->
</body>

</html>