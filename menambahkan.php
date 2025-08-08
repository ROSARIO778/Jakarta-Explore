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
    <link rel="shortcut icon" href="jkt2.png" type="image/png">
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

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="data.php">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Data Lokasi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="menambahkan.php">
                    <i class="fa-solid fa-square-plus"></i>
                    <span>Tambah Data</span></a>
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
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 fw-bolder text-success">Tambah Data</h6>
                        </div>
                        <div class="card-body">
                            <!-- Main content -->
                            <form class="form-horizontal style-form" action="simpan.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <div class="col-sm-6">
                                        <label for="nama" class="form-label fw-bolder text-black">Nama Wisata</label>
                                        <input placeholder="Nama Wisata" id="nama" name="nama" autocomplete="off" class="form-control text-black fw-bolder" required />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-6">
                                        <label for="Alamat" class="form-label fw-bolder text-black">Alamat</label>
                                        <textarea class="form-control text-black fw-bolder" id="Alamat" rows="3" placeholder="Alamat" required name="alamat" autocomplete="off"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-6">
                                        <label for="deskripsi" class="form-label fw-bolder text-black">Deskripsi</label>
                                        <textarea required class="form-control text-black fw-bolder" id="deskripsi" rows="3" placeholder="Deskripsi" name="deskripsi" autocomplete="off"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-6">
                                        <label for="operasional" class="form-label fw-bolder text-black">Jam Operasional</label>
                                        <textarea required placeholder="Jam Operasional" id="operasional" name="operasional" autocomplete="off" class="form-control text-black fw-bolder"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-6">
                                        <label for="harga" class="form-label fw-bolder text-black">Harga Tiket</label>
                                        <input type="text" class="form-control text-black fw-bolder" id="harga" placeholder="Harga Tiket" name="tiket" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-6">
                                        <label for="latitude" class="form-label fw-bolder text-black">Latitude</label>
                                        <input type="text" class="form-control text-black fw-bolder" id="latitude" placeholder="Latitude" required name="latitude" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-6">
                                        <label for="Longitude" class="form-label fw-bolder text-black">Longitude</label>
                                        <input type="text" class="form-control text-black fw-bolder" id="Longitude" placeholder="Longitude" required name="longitude" autocomplete="off" required>
                                    </div>
                                </div>
                                <!-- Tambah bagian untuk upload gambar -->
                                <div class="mb-3">
                                    <div class="col-sm-6">
                                        <label for="gambar" class="form-label fw-bolder text-black">Upload Gambar</label>
                                        <input type="file" class="form-control text-black fw-bolder" id="gambar" name="gambar" required>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 3px;">
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" name="insert" class="btn btn-outline-success">
                                            <i class="fa-regular fa-square-plus"></i>&nbsp;Tambah
                                        </button>
                                    </div>
                                </div>
                            </form>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
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