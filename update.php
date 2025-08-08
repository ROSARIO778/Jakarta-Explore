<?php
session_start();
include "connect.php"; // Pastikan file ini berisi koneksi ke database

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Cek jika semua input tidak kosong
    if (!empty($id) && !empty($nama) && !empty($username) && !empty($password) && !empty($role)) {
        // Buat query untuk mengedit data
        $query = "UPDATE users SET nama='$nama', username='$username', password='$password', role='$role' WHERE id='$id'";

        // Jalankan query
        $update = mysqli_query($connect, $query);

        if ($update) {
            $_SESSION['info'] = 'Diupdate';
        } else {
            $_SESSION['info'] = 'Gagal Diupdate';
        }
    } else {
        // Jika ada data yang kosong
        $_SESSION['info'] = 'Kosong';
    }
    echo "<script>document.location.href='user.php'</script>";
}
