<?php
session_start();
session_destroy(); // Menghancurkan semua sesi

// Menyimpan informasi ke dalam sesi untuk menampilkan notifikasi setelah logout
echo "<script>document.location.href='login.php'</script>";
