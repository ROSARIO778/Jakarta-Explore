<?php
session_start();
include "connect.php";

if ($_GET['id_lokasi'] != "") {
    $id_lokasi = $_GET['id_lokasi'];
    $del = mysqli_query($connect, "DELETE FROM lokasi WHERE id_lokasi = '$id_lokasi'");
    if ($del) {
        $_SESSION['info'] = 'Dihapus';
        echo "<script>document.location.href='superadmin.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal Dihapus';
        echo "<script>document.location.href='superadmin.php'</script>";
    }
}
