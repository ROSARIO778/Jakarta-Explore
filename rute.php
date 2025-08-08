<?php
session_start();
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
    <!-- Leaflet CSS -->
    <link href="css 1/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet Routing Machine CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <style>
        #map {
            height: 410px;
            width: 100%;
        }
    </style>
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
            <li class="nav-item">
                <a class="nav-link" href="data.php">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Data Wisata</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="rute.php">
                    <i class="fa-solid fa-route"></i>
                    <span>Cari Rute</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="tambah.php">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Muhammad Rizki Syaumi</span>
                                <img class="img-profile rounded-circle" src="aku.jpeg">
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid mt-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Cari Rute Wisata</h6>
                        </div>
                        <div class="card-body">
                            <form id="routeForm">
                                <!-- Lokasi Awal Dropdown -->
                                <div class="mb-3">
                                    <label for="startLocation" class="form-label fw-bold">Lokasi Awal</label>
                                    <input type="text" id="startLocation" class="form-control" placeholder="Mendeteksi lokasi perangkat..." readonly>
                                    <small id="locationStatus" class="text-muted"></small>
                                </div>

                                <script>
                                    // Fungsi untuk mendapatkan lokasi perangkat
                                    function getCurrentLocation() {
                                        const locationInput = document.getElementById('startLocation');
                                        const locationError = document.getElementById('locationError');

                                        if (navigator.geolocation) {
                                            navigator.geolocation.getCurrentPosition(
                                                async (position) => {
                                                        const {
                                                            latitude,
                                                            longitude
                                                        } = position.coords;

                                                        // Menampilkan koordinat (opsional)
                                                        console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);

                                                        // Menggunakan Nominatim API untuk geocoding
                                                        const url = `https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`;

                                                        try {
                                                            const response = await fetch(url);
                                                            const data = await response.json();

                                                            // Mendapatkan alamat dari data API
                                                            const address = data.display_name || "Alamat tidak ditemukan";
                                                            locationInput.value = address;
                                                        } catch (error) {
                                                            console.error("Gagal mendapatkan alamat:", error);
                                                            locationInput.value = "Gagal mendapatkan alamat";
                                                        }
                                                    },
                                                    (error) => {
                                                        console.error("Gagal mendapatkan lokasi:", error);
                                                        locationError.classList.remove('hidden');
                                                    }
                                            );
                                        } else {
                                            console.error("Geolocation tidak didukung oleh browser ini.");
                                            locationError.classList.remove('hidden');
                                        }
                                    }

                                    // Memanggil fungsi saat halaman dimuat
                                    document.addEventListener('DOMContentLoaded', getCurrentLocation);
                                </script>

                                <!-- Lokasi Tujuan Dropdown -->
                                <div class="mb-3">
                                    <label for="endLocation" class="form-label fw-bold">Lokasi Tujuan</label>
                                    <select id="endLocation" class="form-select">
                                        <option selected>-- Pilih Lokasi Tujuan --</option>
                                        <?php
                                        include "koneksi.php"; // Pastikan file koneksi database sudah benar

                                        // Query untuk mengambil data dari tabel 'lokasi'
                                        $query = "SELECT * FROM lokasi";
                                        $stmt = $koneksi->prepare($query);
                                        $stmt->execute();

                                        // Menampilkan data dalam elemen <option>
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row['id'] . "' data-lat='" . $row['latitude'] . "' data-lng='" . $row['longitude'] . "'>" . $row['nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <button type="button" id="searchRoute" class="btn btn-outline-success">
                                        <i class="fa-solid fa-magnifying-glass-location"></i> Cari Rute
                                    </button>
                                </div>
                            </form>

                            <!-- Hasil Pencarian -->
                            <div id="results" class="mt-4 d-none">
                                <div class="card shadow-lg">
                                    <div id="cardBody" class="card-body">
                                        <h5 class="card-title fw-bold">Hasil Pencarian Rute</h5>
                                        <p><strong>Lokasi Awal&nbsp;:</strong> <span id="resultStart" class="text-dark"></span></p>
                                        <p><strong>Lokasi Tujuan&nbsp;:</strong> <span id="resultEnd" class="text-dark"></span></p>
                                        <p><strong>Jarak Tempuh&nbsp;:</strong> <span id="resultDistance" class="text-dark">Sedang menghitung...</span></p>
                                        <p><strong>Estimasi Waktu&nbsp;:</strong> <span id="resultTime" class="text-dark">Sedang menghitung...</span></p>
                                        <p><strong>Rute Tercepat&nbsp;:</strong> <span id="routeName" class="text-dark"></span></p>
                                        <div id="map" class="mt-4 rounded" style="height: 400px;"></div>
                                    </div>
                                </div>
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
    <!-- Script Libraries -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Leaflet Routing Machine CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <script>
        let map; // Variabel global untuk peta
        let routingControl = null; // Variabel global untuk kontrol routing
        let deviceLocation = {
            lat: null,
            lng: null,
            name: null
        }; // Lokasi perangkat

        document.getElementById("searchRoute").addEventListener("click", function() {
            const endSelect = document.getElementById("endLocation");
            const endOption = endSelect.options[endSelect.selectedIndex];

            if (!endOption || endOption.value === "-- Pilih Lokasi Tujuan --") {
                alert("Silakan pilih lokasi tujuan!");
                return;
            }

            const endLat = parseFloat(endOption.getAttribute("data-lat"));
            const endLng = parseFloat(endOption.getAttribute("data-lng"));
            const endName = endOption.text;

            document.getElementById("results").style.display = "block";
            document.getElementById("resultStart").textContent = "Menentukan lokasi awal...";
            document.getElementById("resultEnd").textContent = endName;
            document.getElementById("resultDistance").textContent = "Sedang menghitung...";
            document.getElementById("resultTime").textContent = "Sedang menghitung...";
            document.getElementById("routeName").textContent = "Menunggu hasil...";

            if (map) {
                map.remove(); // Hapus instance peta sebelumnya
            }

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        const startLat = position.coords.latitude;
                        const startLng = position.coords.longitude;

                        deviceLocation.lat = startLat;
                        deviceLocation.lng = startLng;

                        const geocodeUrl = `https://nominatim.openstreetmap.org/reverse?lat=${startLat}&lon=${startLng}&format=json`;

                        fetch(geocodeUrl)
                            .then((response) => response.json())
                            .then((data) => {
                                const startName = data.display_name || "Lokasi tidak ditemukan";
                                deviceLocation.name = startName;
                                document.getElementById("resultStart").textContent = startName;

                                map = L.map("map", {
                                    dragging: true
                                }).setView([startLat, startLng], 13);

                                L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                                    attribution: "© OpenStreetMap contributors",
                                }).addTo(map);

                                L.marker([startLat, startLng]).addTo(map).bindPopup(`Lokasi Awal: ${startName}`);
                                L.marker([endLat, endLng]).addTo(map).bindPopup(`Lokasi Tujuan: ${endName}`);

                                if (routingControl) {
                                    map.removeControl(routingControl); // Hapus kontrol routing sebelumnya
                                    routingControl = null; // Reset variabel
                                }

                                routingControl = L.Routing.control({
                                    waypoints: [
                                        L.latLng(startLat, startLng),
                                        L.latLng(endLat, endLng),
                                    ],
                                    routeWhileDragging: false,
                                    lineOptions: {
                                        styles: [{
                                            color: "#13005A",
                                            weight: 3
                                        }],
                                    },
                                    router: L.Routing.osrmv1({
                                        serviceUrl: "https://router.project-osrm.org/route/v1",
                                    }),
                                    createMarker: function() {
                                        return null;
                                    },
                                }).addTo(map);

                                routingControl.on("routesfound", function(e) {
                                    const route = e.routes[0];
                                    const distance = route.summary.totalDistance / 1000;
                                    const time = route.summary.totalTime / 60;
                                    const hours = Math.floor(time / 60);
                                    const minutes = Math.round(time % 60);
                                    const formattedTime = `${hours > 0 ? hours + " jam " : ""}${minutes} menit`;

                                    const routeName = route.name || "Rute tidak bernama";

                                    document.getElementById("resultDistance").textContent = `${distance.toFixed(2)} KM`;
                                    document.getElementById("resultTime").textContent = `${formattedTime}`;
                                    document.getElementById("routeName").textContent = routeName;

                                    L.polyline(route.coordinates, {
                                            color: "#13005A",
                                            weight: 3
                                        })
                                        .addTo(map)
                                        .bindPopup(`Rute: ${routeName}`)
                                        .openPopup();
                                });

                                routingControl.on("routingerror", function() {
                                    document.getElementById("routeName").textContent = "Tidak ada rute yang ditemukan.";
                                });
                            })
                            .catch((error) => {
                                console.error("Gagal mendapatkan alamat lokasi awal:", error);
                                document.getElementById("resultStart").textContent = "Gagal mendapatkan lokasi awal.";
                            });
                    },
                    function(error) {
                        console.error("Gagal mendapatkan lokasi perangkat:", error);
                        alert("Gagal mendapatkan lokasi perangkat. Pastikan izin lokasi diaktifkan.");
                    }
                );
            } else {
                alert("Geolocation tidak didukung oleh browser ini.");
            }
        });
    </script>

    <style>
        #map {
            height: 410px;
            width: 100%;
        }
    </style>
</body>

</html>