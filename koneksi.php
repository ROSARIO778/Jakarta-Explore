<?php
// Konfigurasi database
$host = 'localhost';
$dbname = 'navigasi_wisata';
$username = 'root';
$password = '';

try {
    // Membuat koneksi menggunakan PDO
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4"; // Menambahkan charset untuk keamanan
    $koneksi = new PDO($dsn, $username, $password);

    // Set atribut error mode untuk PDO
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opsional: Aktifkan emulasi prepared statements (disarankan jika menggunakan driver MySQL lama)
    $koneksi->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    // Menangani kesalahan koneksi dengan aman
    http_response_code(500); // Mengembalikan status HTTP 500
    die(json_encode([
        "error" => true,
        "message" => "Koneksi database gagal: " . $e->getMessage()
    ]));
}
