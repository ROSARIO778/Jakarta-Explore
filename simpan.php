<?php
session_start();
include "koneksi.php"; // Pastikan koneksi menggunakan PDO

if (isset($_POST['insert'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];
    $operasional = $_POST['operasional'];
    $tiket = $_POST['tiket'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $folder = "uploads/";

    // Validasi jika semua data tidak kosong
    if (!empty($nama) && !empty($alamat) && !empty($deskripsi) && !empty($operasional) && !empty($tiket) && !empty($latitude) && !empty($longitude) && !empty($gambar)) {

        // Validasi ekstensi file gambar (hanya jpg, jpeg, png)
        $allowed_extensions = array('jpg', 'jpeg', 'png');
        $file_extension = pathinfo($gambar, PATHINFO_EXTENSION);

        if (in_array(strtolower($file_extension), $allowed_extensions)) {
            // Pindahkan file yang diupload ke folder tujuan
            $new_filename = $nama . '.' . $file_extension; // Nama file berdasarkan nama
            if (move_uploaded_file($tmp, $folder . $new_filename)) {
                try {
                    // Simpan data ke dalam database
                    $query = $koneksi->prepare("INSERT INTO `lokasi`(`nama`, `alamat`, `deskripsi`, `operasional`, `tiket`, `latitude`, `longitude`, `gambar`) 
                                                VALUES (:nama, :alamat, :deskripsi, :operasional, :tiket, :latitude, :longitude, :gambar)");
                    $query->bindParam(':nama', $nama);
                    $query->bindParam(':alamat', $alamat);
                    $query->bindParam(':deskripsi', $deskripsi);
                    $query->bindParam(':operasional', $operasional);
                    $query->bindParam(':tiket', $tiket);
                    $query->bindParam(':latitude', $latitude);
                    $query->bindParam(':longitude', $longitude);
                    $query->bindParam(':gambar', $new_filename);

                    if ($query->execute()) {
                        $_SESSION['info'] = 'Ditambahkan'; // Pesan sukses
                    } else {
                        $_SESSION['info'] = 'Gagal Disimpan'; // Pesan gagal simpan database
                    }
                } catch (PDOException $e) {
                    $_SESSION['info'] = 'Error: ' . $e->getMessage(); // Pesan error database
                }
                echo "<script>document.location.href='data.php'</script>";
            } else {
                $_SESSION['info'] = 'Gagal Upload Gambar'; // Pesan gagal upload file
                echo "<script>document.location.href='data.php'</script>";
            }
        } else {
            $_SESSION['info'] = 'Ekstensi Gambar Tidak Valid'; // Pesan ekstensi tidak valid
            echo "<script>document.location.href='data.php'</script>";
        }
    } else {
        $_SESSION['info'] = 'Kosong'; // Pesan input kosong
        echo "<script>document.location.href='data.php'</script>";
    }
}
