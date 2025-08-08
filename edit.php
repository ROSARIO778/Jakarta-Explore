<?php
session_start();
include "koneksi.php";

if (isset($_POST['edit'])) {
    $id_lokasi = $_POST['id_lokasi'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];
    $operasional = $_POST['operasional'];
    $tiket = $_POST['tiket'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Validasi jika semua input tidak kosong
    if (!empty($id_lokasi) && !empty($nama) && !empty($alamat) && !empty($deskripsi) && !empty($operasional) && !empty($tiket) && !empty($latitude) && !empty($longitude)) {
        try {
            $query = "UPDATE lokasi SET 
                      nama = :nama, 
                      alamat = :alamat, 
                      deskripsi = :deskripsi, 
                      operasional = :operasional, 
                      tiket = :tiket, 
                      latitude = :latitude, 
                      longitude = :longitude 
                      WHERE id_lokasi = :id_lokasi";

            $stmt = $koneksi->prepare($query);
            $stmt->bindParam(':id_lokasi', $id_lokasi);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':alamat', $alamat);
            $stmt->bindParam(':deskripsi', $deskripsi);
            $stmt->bindParam(':operasional', $operasional);
            $stmt->bindParam(':tiket', $tiket);
            $stmt->bindParam(':latitude', $latitude);
            $stmt->bindParam(':longitude', $longitude);

            if ($stmt->execute()) {
                $_SESSION['info'] = 'Diupdate';
            } else {
                $_SESSION['info'] = 'Gagal Diupdate';
            }
        } catch (PDOException $e) {
            $_SESSION['info'] = 'Error: ' . $e->getMessage();
        }
    } else {
        // Jika ada data yang kosong
        $_SESSION['info'] = 'Kosong';
    }

    header("Location: data.php");
    exit;
}
