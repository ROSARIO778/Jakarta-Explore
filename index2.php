<?php
include "koneksi.php";

setlocale(LC_TIME, 'id_ID.utf8');

header("ngrok-skip-browser-warning: true");

$tanggal = (new DateTime())->format('d F Y');
?>
<!doctype html>
<html lang="en" data-theme="light" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="src/output.css" rel="stylesheet">
    <link rel="shortcut icon" href="jkt2.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css">
    <title>JakartaExplore</title>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar bg-transparent fixed top-0 left-0 right-0 z-10 px-4 lg:px-8" id="navbar">
        <div class="navbar-start">
            <img src="jkt2.png" class="w-10 h-10">
        </div>
        <div class="navbar-end hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li class="font-bold text-white uppercase"><a href="#beranda">Beranda</a></li>
                <li class="font-bold text-white uppercase"><a href="#lokasi">Lokasi</a></li>
                <li class="font-bold text-white uppercase"><a href="login.php" target="_blank">Login</a></li>
            </ul>
        </div>
        <!-- Dropdown Menu Mobile -->
        <div class="navbar-end lg:hidden">
            <div class="relative">
                <button id="dropdown-button" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                </button>
                <ul id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md hidden">
                    <li class="px-4 py-2 text-gray-800 hover:bg-gray-200">
                        <a href="#beranda">Beranda</a>
                    </li>
                    <li class="px-4 py-2 text-gray-800 hover:bg-gray-200">
                        <a href="#lokasi">Lokasi</a>
                    </li>
                    <li class="px-4 py-2 text-gray-800 hover:bg-gray-200">
                        <a href="login.php" target="_blank">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sesi Beranda -->
    <div id="beranda" class="hero min-h-screen bg-cover bg-center" style="background-image: url(glodok.jpg);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-neutral-content px-4">
            <div class="flex flex-col lg:flex-row-reverse items-center lg:items-start">
                <img src="jkt2.png" class="w-40 lg:w-64 mb-4 lg:mb-0">
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl lg:text-5xl font-bold">JakartaExplore</h1>
                    <p class="py-4 text-justify font-bold">
                        JakartaExplore adalah sebuah website sistem informasi navigasi wisata kota Jakarta yang dirancang untuk membantu wisatawan menemukan rute tercepat menuju destinasi wisata pilihan. Menggunakan algoritma Dijkstra. sistem ini secara otomatis menghitung dan menampilkan jalur tercepat berdasarkan lokasi pengguna dan tujuan wisata yang dipilih.
                    </p>
                    <a href="#lokasi" class="btn btn-outline btn-accent"><i class="fa-solid fa-paper-plane"></i>Mulai Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sesi Lokasi -->
    <section id="lokasi" class="py-12 min-h-screen bg-cover bg-center" style="background-image: url(aquarium.jpg);">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-center mb-8 text-white">Lokasi Wisata</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 justify-center">
                <?php
                try {
                    $query = $koneksi->query("SELECT id_lokasi, nama, gambar FROM lokasi ORDER BY created_at ASC");
                    if ($query && $query->rowCount() > 0):
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)):
                ?>
                            <div class="relative rounded-lg overflow-hidden shadow-lg group cursor-pointer">
                                <img src="uploads/<?php echo $row['gambar']; ?>" alt="<?= htmlspecialchars($row['nama']); ?>"
                                    class="w-full h-48 lg:h-64 object-cover transition-transform duration-300 ease-in-out group-hover:scale-110">
                                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-end p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <h2 class="text-sm font-semibold text-white truncate">
                                        <a href="detail.php?nama=<?= $row['nama']; ?>" class="hover:underline" target="_blank">
                                            <?= htmlspecialchars($row['nama']); ?>
                                        </a>
                                    </h2>
                                </div>
                            </div>
                        <?php
                        endwhile;
                    else:
                        ?>
                        <p class="text-center col-span-full text-gray-300">Tidak ada data lokasi yang tersedia.</p>
                <?php
                    endif;
                } catch (PDOException $e) {
                    echo "<p class='text-center col-span-full text-red-500'>Terjadi kesalahan: " . htmlspecialchars($e->getMessage()) . "</p>";
                }
                ?>
            </div>
        </div>
    </section>
    <div class="hero bg-slate-900 min-h-screen">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div>
                <h1 class="text-5xl font-bold text-white text-left">Ingin Mencari Rute?</h1>
                <p class="py-6">
                </p>
                <button class="btn btn-outline btn-accent" onclick="my_modal_3.showModal()"> <i class="fa-solid fa-magnifying-glass-location"></i>&nbsp;Cari Rute</button>
            </div>
        </div>
    </div>
    <div class="">
        <dialog id="my_modal_3" class="modal modal-lg">
            <div class="modal-box w-11/12 max-w-5xl">
                <form method="dialog">
                    <!-- Tombol Tutup -->
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="resetAndCloseModal()">✕</button>
                </form>
                <!-- Judul Modal -->
                <h3 class="text-2xl font-bold">Cari Rute di Sini</h3>
                <form id="routeForm" class="mt-6">
                    <!-- Lokasi Awal Dropdown -->
                    <div class="form-control mb-6">
                        <label for="startLocation" class="label">
                            <span class="label-text font-bold">Lokasi Tujuan</span>
                        </label>
                        <select id="startLocation" class="select select-bordered w-full">
                            <option selected>-- Pilih Lokasi Tujuan --</option>
                            <?php
                            include "koneksi.php";
                            $query = "SELECT * FROM lokasi";
                            $stmt = $koneksi->prepare($query);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id'] . "' data-lat='" . $row['latitude'] . "' data-lng='" . $row['longitude'] . "'>" . $row['nama'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Lokasi Tujuan Dropdown -->
                    <div class="form-control mb-6">
                        <label for="endLocation" class="label">
                            <span class="label-text font-bold">Lokasi Tujuan</span>
                        </label>
                        <select id="endLocation" class="select select-bordered w-full">
                            <option selected>-- Pilih Lokasi Tujuan --</option>
                            <?php
                            include "koneksi.php";
                            $query = "SELECT * FROM lokasi";
                            $stmt = $koneksi->prepare($query);
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id'] . "' data-lat='" . $row['latitude'] . "' data-lng='" . $row['longitude'] . "'>" . $row['nama'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Tombol Cari Rute -->
                    <div class="form-control mt-6">
                        <button type="button" id="searchRoute" class="btn btn-outline btn-success">
                            <i class="fa-solid fa-magnifying-glass-location"></i> Cari Rute
                        </button>
                    </div>
                </form>

                <!-- Hasil Pencarian -->
                <div id="results" class="mt-4 hidden">
                    <div class="card shadow-lg bg-base-100">
                        <div id="cardBody" class="card-body">
                            <h5 class="card-title text-lg font-bold">Hasil Pencarian Rute</h5>
                            <p><strong>Lokasi Awal&nbsp;:</strong> <span id="resultStart" class="text-black"></span></p>
                            <p><strong>Lokasi Tujuan&nbsp;:</strong> <span id="resultEnd" class="text-black"></span></p>
                            <p><strong>Jarak Tempuh&nbsp;:</strong> <span id="resultDistance" class="text-black">Sedang menghitung...</span></p>
                            <p><strong>Estimasi Waktu&nbsp;:</strong> <span id="resultTime" class="text-black">Sedang menghitung...</span></p>
                            <p><strong>Rute Tercepat&nbsp;:</strong> <span id="routeName" class="text-black"></span></p>
                            <div id="map" class="mt-4 rounded-lg" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </dialog>
    </div>

    <!-- Footer -->
    <section>
        <footer class="footer footer-center bg-blue-950 text-white p-10">
            <nav>
                <h6 class="footer-title">Navigasi</h6>
                <a class="link link-hover" href="#beranda">Beranda</a>
                <a class="link link-hover" href="#lokasi">Lokasi</a>
                <a class="link link-hover" href="login.php" target="_blank">Login</a>
            </nav>
        </footer>
        <footer class="footer footer-center bg-blue-950 text-white border-base-300 border-t px-10 py-4">
            <aside>
                <p>Copyright © <?php echo $tanggal; ?> - Muhammad Rizki Syaumi</p>
            </aside>
        </footer>
    </section>

    <!-- Script -->
    <script>
        function resetAndCloseModal() {
            const modal = document.getElementById('my_modal_3');
            modal.close();

            const form = document.getElementById('routeForm');
            form.reset();

            const results = document.getElementById('results');
            results.classList.add('hidden');

            const fieldsToClear = ['resultStart', 'resultEnd', 'resultDistance', 'resultTime', 'routeName'];
            fieldsToClear.forEach(fieldId => {
                document.getElementById(fieldId).textContent = '';
            });

            const mapContainer = document.getElementById('map');
            if (mapContainer) {
                mapContainer.innerHTML = '';
            }
        }

        function showResults() {
            document.getElementById('results').classList.remove('hidden');
        }

        document.getElementById('searchRoute').addEventListener('click', function() {
            document.getElementById('results').classList.remove('hidden');
        });

        let map;

        document.getElementById("searchRoute").addEventListener("click", function() {
            const startSelect = document.getElementById("startLocation");
            const endSelect = document.getElementById("endLocation");

            const startOption = startSelect.options[startSelect.selectedIndex];
            const endOption = endSelect.options[endSelect.selectedIndex];

            if (!startOption || startOption.value === "-- Pilih Lokasi Awal --" ||
                !endOption || endOption.value === "-- Pilih Lokasi Tujuan --") {
                alert("Silakan pilih lokasi awal dan tujuan!");
                return;
            }

            const startLat = parseFloat(startOption.getAttribute("data-lat"));
            const startLng = parseFloat(startOption.getAttribute("data-lng"));
            const startName = startOption.text;

            const endLat = parseFloat(endOption.getAttribute("data-lat"));
            const endLng = parseFloat(endOption.getAttribute("data-lng"));
            const endName = endOption.text;

            document.getElementById("results").style.display = "block";
            document.getElementById("resultStart").textContent = startName;
            document.getElementById("resultEnd").textContent = endName;
            document.getElementById("resultDistance").textContent = "Sedang menghitung...";
            document.getElementById("resultTime").textContent = "Sedang menghitung...";
            document.getElementById("routeName").textContent = "Menunggu hasil...";

            if (map) {
                map.remove();
            }

            map = L.map("map").setView([startLat, startLng], 13);

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: "© OpenStreetMap contributors",
            }).addTo(map);

            L.marker([startLat, startLng], {
                    draggable: false
                })
                .addTo(map)
                .bindPopup(`Lokasi Awal: ${startName}`);

            L.marker([endLat, endLng], {
                    draggable: false
                })
                .addTo(map)
                .bindPopup(`Lokasi Tujuan: ${endName}`);

            const routingControl = L.Routing.control({
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

                document.getElementById("resultDistance").textContent = `${distance.toFixed(2)} KM`;
                document.getElementById("resultTime").textContent = `${formattedTime}`;
                document.getElementById("routeName").textContent = route.name || "Rute tidak bernama";

                L.polyline(route.coordinates, {
                        color: "#13005A",
                        weight: 3
                    })
                    .addTo(map)
                    .bindPopup(`Rute: ${route.name || "Tidak bernama"}`)
                    .openPopup();
            });

            routingControl.on("routingerror", function() {
                document.getElementById("routeName").textContent = "Tidak ada rute yang ditemukan.";
            });
        });
    </script>


    <script src="https://kit.fontawesome.com/7c30bf53db.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Leaflet Routing Machine CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <style>
        /* Initial navbar style (transparent) */
        .navbar {
            background-color: transparent !important;
            transition: background-color 0.3s ease;
        }

        /* Style when scrolling */
        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.9);
            /* You can adjust opacity */
        }

        /* Add shadow when scrolled */
        .navbar.scrolled {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #map {
            height: 410px;
            width: 100%;
        }
    </style>
</body>

</html>