<?php
include "koneksi.php"; // Pastikan Anda telah mengatur koneksi ke database
?>
<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="jkt2.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dijkstra</title>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 text-center">
                <img src="jkt2.png" class="img-fluid mb-4" alt="Logo" width="96" height="96">
                <h3 class="text-dark fw-medium">
                    Sign In
                </h3>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <form id="loginForm" method="POST" action="proses_login.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <input type="text" class="form-control focus-ring border-danger" id="username" name="username" autocomplete="off" placeholder="Masukkan Username" required>
                            <span class="input-group-text bg-white border-danger">
                                <i class="fa-solid fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control border-warning" id="password" name="password" placeholder="*************" required>
                            <span class="input-group-text bg-white border-warning">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <!-- Tombol kembali ke halaman index.php -->
                        <a href="#" class="btn btn-outline-danger" onclick="window.close(); return false;">
                            <i class="fa-solid fa-arrow-left me-2"></i>Kembali
                        </a>

                        <button type="submit" class="btn btn-outline-success">
                            <i class="fa-solid fa-right-to-bracket me-2"></i>Login
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    </div>

    <script src="https://kit.fontawesome.com/7c30bf53db.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah reload halaman

            const formData = new FormData(this);

            fetch('cek.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Login Berhasil',
                            text: 'Anda akan dialihkan dalam beberapa saat',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500, // Durasi tampilan SweetAlert (1.5 detik)
                            timerProgressBar: true
                        }).then(() => {
                            // Redirect ke halaman berdasarkan role
                            if (data.redirect) {
                                window.location.href = data.redirect;
                            } else {
                                Swal.fire({
                                    title: 'Kesalahan',
                                    text: 'Role tidak valid.',
                                    icon: 'error',
                                    confirmButtonText: 'Coba Lagi'
                                });
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Login Gagal',
                            text: data.message || 'Username atau Password salah',
                            icon: 'error',
                            confirmButtonText: 'Coba Lagi'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Kesalahan',
                        text: 'Terjadi masalah dengan server. Silakan coba lagi.',
                        icon: 'error',
                        confirmButtonText: 'Tutup'
                    });
                    console.error('Error:', error);
                });
        });
    </script>


</body>

</html>