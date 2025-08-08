<?php
session_start();
include 'koneksi.php'; // Pastikan koneksi menggunakan PDO

$response = array('success' => false, 'message' => 'Detail login tidak valid.');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password'])); // Menggunakan MD5 untuk hashing password

    try {
        // Query untuk memeriksa login
        $query = $koneksi->prepare("SELECT * FROM `users` WHERE username = :username AND password = :password");
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            $row = $query->fetch(PDO::FETCH_ASSOC);

            // Menyimpan data sesi
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama'] = $row['nama']; // Menyimpan nama ke dalam sesi
            $_SESSION['role'] = $row['role'];

            $response['success'] = true;
            $response['message'] = 'Login berhasil.';

            // Redirect berdasarkan role
            if ($row['role'] === 'Super Admin') {
                $response['redirect'] = 'superadmin.php';
            } elseif ($row['role'] === 'Admin') {
                $response['redirect'] = 'data.php';
            } else {
                $response['message'] = 'Role tidak valid.';
                $response['success'] = false;
            }
        } else {
            $response['message'] = 'Username atau password salah.';
        }
    } catch (PDOException $e) {
        $response['message'] = 'Kesalahan: ' . $e->getMessage();
    }
}

header('Content-Type: application/json');
echo json_encode($response);
