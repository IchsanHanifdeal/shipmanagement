<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../backend/koneksi.php';
    $id = $_POST["id"];
    $sql = "DELETE FROM users WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "failure";
    }
    $conn->close();
}
