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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="css 1/sb-admin-2.min.css" rel="stylesheet">
    <!-- Leaflet Routing Machine CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
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
                                    <select id="startLocation" class="form-select" aria-label="Lokasi Awal">
                                        <option selected>-- Pilih Lokasi Awal --</option>
                                        <?php
                                        include "koneksi.php"; // Pastikan file koneksi database sudah benar

                                        // Query untuk mengambil data dari tabel 'lokasi'
                                        $query = "SELECT * FROM lokasi";
                                        $stmt = $koneksi->prepare($query);
                                        $stmt->execute();

                                        // Menampilkan data dalam elemen <option>
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row['id_lokasi'] . "' data-lat='" . $row['latitude'] . "' data-lng='" . $row['longitude'] . "'>" . $row['nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Lokasi Tujuan Dropdown -->
                                <div class="mb-3">
                                    <label for="endLocation" class="form-label fw-bold">Lokasi Tujuan</label>
                                    <select id="endLocation" class="form-select" aria-label="Lokasi Tujuan">
                                        <option selected>-- Pilih Lokasi Tujuan --</option>
                                        <?php
                                        include "koneksi.php"; // Pastikan file koneksi database sudah benar

                                        // Query untuk mengambil data dari tabel 'lokasi'
                                        $query = "SELECT * FROM lokasi";
                                        $stmt = $koneksi->prepare($query);
                                        $stmt->execute();

                                        // Menampilkan data dalam elemen <option>
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row['id_lokasi'] . "' data-lat='" . $row['latitude'] . "' data-lng='" . $row['longitude'] . "'>" . $row['nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-outline-success" id="searchRoute">
                                    <i class="fa-solid fa-magnifying-glass-location"></i> Cari Rute
                                </button>
                            </form>

                            <!-- Hasil Pencarian -->
                            <div id="results" class="mt-4" style="display: none;">
                                <h5>Hasil Pencarian Rute</h5>
                                <p><strong>Lokasi Awal :</strong> <span id="resultStart"></span></p>
                                <p><strong>Lokasi Tujuan :</strong> <span id="resultEnd"></span></p>
                                <ul id="resultRoute"></ul>
                                <p><strong>Jarak Tempuh :</strong> <span id="resultDistance"></span></p>
                                <p><strong>Apakah Ini Adalah Rute Terpendek?</strong> <span id="routeInfo"></span></p>
                                <!-- Peta Leaflet -->
                                <div id="map" style="height: 400px; width: auto;"></div>
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

    <script>
        let map;
        let graph = {};
        let coordinates = {};

        // Ambil data dari PHP
        fetch('fetch_locations.php')
            .then(response => response.json())
            .then(data => {
                graph = data.graph;
                coordinates = data.lokasi;
            });

        document.getElementById("searchRoute").addEventListener("click", function() {
            const startSelect = document.getElementById("startLocation").value;
            const endSelect = document.getElementById("endLocation").value;

            if (!startSelect || !endSelect || startSelect === endSelect) {
                alert("Silakan pilih lokasi awal dan tujuan yang berbeda!");
                return;
            }

            const {
                path,
                distance
            } = dijkstra(graph, startSelect, endSelect);

            if (!path.length) {
                alert("Rute tidak ditemukan!");
                return;
            }

            // Tampilkan hasil
            document.getElementById("results").style.display = "block";
            document.getElementById("resultStart").textContent = coordinates[startSelect].nama;
            document.getElementById("resultEnd").textContent = coordinates[endSelect].nama;
            document.getElementById("resultDistance").textContent = `${distance} KM`;

            // Reset peta jika sudah ada instance sebelumnya
            if (map) {
                map.remove();
            }

            // Tampilkan peta dengan Leaflet
            map = L.map('map').setView([coordinates[startSelect].lat, coordinates[startSelect].lng], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Tambahkan marker
            path.forEach((node, index) => {
                const coord = coordinates[node];
                L.marker([coord.lat, coord.lng], {
                        draggable: false
                    }).addTo(map)
                    .bindPopup(`${coord.nama} (${index === 0 ? "Start" : index === path.length - 1 ? "End" : "Waypoint"})`)
                    .openPopup();
            });

            // Gambarkan jalur
            const routeCoordinates = path.map(node => [coordinates[node].lat, coordinates[node].lng]);
            L.polyline(routeCoordinates, {
                color: '#13005A',
                weight: 6
            }).addTo(map);
        });

        // Algoritma Dijkstra
        function dijkstra(graph, start, end) {
            const distances = {};
            const visited = {};
            const previous = {};
            const queue = [];

            for (let node in graph) {
                distances[node] = Infinity;
                previous[node] = null;
            }
            distances[start] = 0;
            queue.push([start, 0]);

            while (queue.length > 0) {
                queue.sort((a, b) => a[1] - b[1]); // Urutkan berdasarkan jarak
                const [current, distance] = queue.shift();

                if (visited[current]) continue;
                visited[current] = true;

                for (let neighbor in graph[current]) {
                    const newDistance = distance + graph[current][neighbor];
                    if (newDistance < distances[neighbor]) {
                        distances[neighbor] = newDistance;
                        previous[neighbor] = current;
                        queue.push([neighbor, newDistance]);
                    }
                }
            }

            const path = [];
            let current = end;
            while (current) {
                path.unshift(current);
                current = previous[current];
            }

            return {
                path,
                distance: distances[end]
            };
        }
    </script>

</body>

</html>