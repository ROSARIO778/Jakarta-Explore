<?php
session_start();
$nama = $_SESSION['nama'];
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JakartaExplore</title>
    <link rel="icon" type="image/png" href="jkt2.png">
    <!-- Link jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Link SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Link DataTables -->
    <!-- Link DataTables CSS dan JS yang kompatibel dengan Bootstrap 5 -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://kit.fontawesome.com/7c30bf53db.js" crossorigin="anonymous"></script>
    <link href="css 1/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="data.php">
                <div class="sidebar-brand-icon">
                    <img src="jkt2.png" alt="Logo" style="width: 2em; height: 2em;">
                </div>
                <div class="sidebar-brand-text mx-1">JakartaExplore</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="superadmin.php">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Data Lokasi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="tambah.php">
                    <i class="fa-solid fa-square-plus"></i>
                    <span>Tambah Data</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="user.php">
                    <i class="fa-solid fa-users"></i>
                    <span>Pengguna</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Keluar</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <div class="text-gray-600 small ml-auto" id="clock2"></div>
                    <script type='text/javascript'>
                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                        var date = new Date();
                        var day = date.getDate();
                        var month = date.getMonth();
                        var thisDay = date.getDay(),
                            thisDay = myDays[thisDay];
                        var yy = date.getYear();
                        var year = (yy < 1000) ? yy + 1900 : yy;
                        document.getElementById('clock2').innerHTML = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
                        //-->
                    </script>
                    &nbsp; - &nbsp;
                    <div class="text-gray-600 small" id="clock"></div>
                    <script type="text/javascript">
                        function showTime() {
                            var today = new Date();
                            var curr_hour = today.getHours();
                            var curr_minute = today.getMinutes();
                            var curr_second = today.getSeconds();

                            curr_hour = checkTime(curr_hour);
                            curr_minute = checkTime(curr_minute);
                            curr_second = checkTime(curr_second);

                            document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second;
                        }

                        function checkTime(i) {
                            if (i < 10) {
                                i = "0" + i;
                            }
                            return i;
                        }

                        setInterval(showTime, 500);

                        //-->
                    </script>
                    <ul class="navbar-nav">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo htmlspecialchars($nama); ?></span>
                                <img class="img-profile rounded-md" src="jkt.png">
                            </a>
                            <!-- Modal Structure -->
                            <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Select "Logout" below if you are ready to end your current session.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a class="btn btn-primary" href="logout.php">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Data Wisata Jakarta</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover" width="100%" cellspacing="0">
                                    <thead class="table-success">
                                        <tr>
                                            <th class="text-center fw-bolder text-black">NO</th>
                                            <th class="text-justify fw-bolder text-black">Nama Wisata</th>
                                            <th class="text-center fw-bolder text-black">Alamat</th>
                                            <th class="text-center fw-bolder text-black">Harga Tiket</th>
                                            <th class="text-center fw-bolder text-black">Latitude</th>
                                            <th class="text-center fw-bolder text-black">Longitude</th>
                                            <th class="text-center fw-bolder text-black">Gambar</th>
                                            <th class="text-center fw-bolder text-black">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $host = 'localhost';
                                        $dbname = 'navigasi_wisata';
                                        $username = 'root';
                                        $password = '';

                                        try {
                                            $koneksi = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                                            $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        } catch (PDOException $e) {
                                            die("Koneksi Gagal: " . $e->getMessage());
                                        }
                                        $query = "SELECT * FROM `lokasi`";
                                        $stmt = $koneksi->prepare($query);
                                        $stmt->execute();

                                        // Mengambil data dan menampilkannya
                                        $urut = 1;
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            $id_lokasi = $row['id_lokasi'];
                                            $nama = $row['nama'];
                                            $alamat = $row['alamat'];
                                            $deskripsi = $row['deskripsi'];
                                            $operasional = $row['operasional'];
                                            $tiket = $row['tiket'];
                                            $latitude = $row['latitude'];
                                            $longitude = $row['longitude'];
                                            $gambar = $row['gambar'];
                                        ?>
                                            <tr>
                                                <td class="text-center fw-bolder text-black"><?php echo $urut++; ?></td>
                                                <td class="fw-bolder text-black text-justify"><?php echo $nama; ?></td>
                                                <td class="fw-bolder text-black text-justify"><?php echo $alamat; ?></td>
                                                <td class="fw-bolder text-black text-justify"><?php echo $tiket; ?></td>
                                                <td class="fw-bolder text-black"><?php echo $latitude; ?></td>
                                                <td class="fw-bolder text-black"><?php echo $longitude; ?></td>
                                                <td class="fw-bolder text-black"><img src="uploads/<?php echo $row['gambar']; ?>" alt="Gambar Wisata" title="<?php echo $nama; ?>" style="width: 100%; height: auto;"></td>
                                                <td class="text-center">
                                                    <div class="d-inline-flex gap-2">
                                                        <!-- Button Edit (modal trigger) -->
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $id_lokasi ?>">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                        <!-- Button Hapus -->
                                                        <a href="hapus.php?id_lokasi=<?php echo $id_lokasi ?>" class="btn btn-outline-danger hapus">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>

                                                <!-- Awal Modal Edit -->
                                                <div class="modal fade" id="staticBackdrop<?php echo $id_lokasi ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5 m-0 font-weight-bold text-success" id="staticBackdropLabel">Edit Data (<?php echo $nama; ?>)</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="edit.php" method="POST">
                                                                    <!-- Input untuk ID yang tersembunyi -->
                                                                    <input type="hidden" id="edit-id" name="id_lokasi" value="<?php echo $id_lokasi; ?>" />
                                                                    <div class="mb-3">
                                                                        <label for="edit-nama" class="form-label fw-bolder text-black">
                                                                            Nama Wisata
                                                                        </label>
                                                                        <input type="text" class="form-control fw-bolder text-black" id="edit-nama" placeholder="Nama Wisata" required name="nama" value="<?php echo $nama; ?>" autocomplete="off">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="edit-alamat" class="form-label fw-bolder text-black">
                                                                            Alamat
                                                                        </label>
                                                                        <textarea class="form-control fw-bolder text-black" id="edit-alamat" placeholder="Deskripsi" required name="alamat" rows="3" autocomplete="off"><?php echo $alamat; ?></textarea>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="edit-deskripsi fw-bolder text-black" class="form-label">
                                                                            Deskripsi
                                                                        </label>
                                                                        <textarea class="form-control fw-bolder text-black" id="edit-deskripsi" placeholder="Deskripsi" required name="deskripsi" autocomplete="off" rows="5"><?php echo $deskripsi; ?></textarea>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="edit-operasional" class="form-label fw-bolder text-black">
                                                                            Jam Operasional
                                                                        </label>
                                                                        <textarea class="form-control fw-bolder text-black" id="edit-operasional" placeholder="Jam Operasional" required name="operasional" autocomplete="off"><?php echo $operasional; ?></textarea>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="edit-tiket" class="form-label fw-bolder text-black">
                                                                            Harga Tiket
                                                                        </label>
                                                                        <input type="text" class="form-control fw-bolder text-black" id="edit-tiket" placeholder="Harga Tiket" required name="tiket" value="<?php echo $tiket; ?>" autocomplete="off">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="edit-latitude" class="form-label fw-bolder text-black">
                                                                            Latitude
                                                                        </label>
                                                                        <input type="text" class="form-control fw-bolder text-black" id="edit-latitude" placeholder="Latitude" required name="latitude" value="<?php echo $latitude; ?>" autocomplete="off">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="edit-longitude" class="form-label fw-bolder text-black">
                                                                            Longitude
                                                                        </label>
                                                                        <input type="text" class="form-control fw-bolder text-black" id="edit-longitude" placeholder="Longitude" required name="longitude" value="<?php echo $longitude; ?>" autocomplete="off">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-outline-success" name="edit"><i class="fa-regular fa-floppy-disk"></i>
                                                                            &nbsp;Ubah Data</button>
                                                                        <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i>&nbsp;Tutup</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Modal Edit -->
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Page Content -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Muhammad Rizki Syaumi 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                echo $_SESSION['info'];
                                            }
                                            unset($_SESSION['info']); ?>">
    </div>
    <script src="script.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor 1/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom scripts for all pages-->
    <script src="js 1/sb-admin-2.min.js"></script>

</body>

</html>