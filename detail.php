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
                        JakartaExplore adalah aplikasi berbasis web yang dirancang untuk membantu wisatawan dan penduduk lokal menjelajahi Jakarta dengan mudah. Dengan memanfaatkan algoritma Dijkstra, aplikasi ini menyediakan rute terpendek dan tercepat untuk mencapai berbagai destinasi wisata di Jakarta.
                    </p>
                    <a href="#lokasi" class="btn btn-outline btn-accent"><i class="fa-solid fa-paper-plane"></i>Mulai Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sesi Lokasi -->
    <section id="lokasi" class="py-12 min-h-screen bg-cover bg-center" style="background-image: url(ancol.jpg);">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-center mb-8 text-white">Lokasi Wisata</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 justify-center">
                <?php
                try {
                    $query = $koneksi->query("SELECT id_lokasi, nama, gambar FROM lokasi ORDER BY created_at ASC");
                    if ($query && $query->rowCount() > 0):
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)):
                ?>
                            <div class="relative rounded-lg overflow-hidden shadow-lg group cursor-pointer"
                                onclick="window.open('detail.php?nama=<?= $row['nama']; ?>', '_blank')">
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
        <div class="mt-3 mx-3">
            <button class="btn btn-outline btn-accent w-full" onclick="my_modal_3.showModal()"> <i class="fa-solid fa-magnifying-glass-location"></i>&nbsp;Cari Rute</button>

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
                                <span class="label-text font-bold">Lokasi Awal</span>
                            </label>
                            <input id="startLocation" type="text" class="input input-bordered w-full" placeholder="Menentukan lokasi..." readonly>
                            <small id="locationError" class="text-red-500 hidden">Gagal mendapatkan lokasi. Pastikan izin lokasi diaktifkan.</small>
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
    </section>

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
        // Fungsi untuk reset dan menyembunyikan hasil
        function resetAndCloseModal() {
            // Tutup modal
            const modal = document.getElementById('my_modal_3');
            modal.close();

            // Reset form
            const form = document.getElementById('routeForm');
            form.reset();

            // Sembunyikan hasil pencarian
            const results = document.getElementById('results');
            results.classList.add('hidden');

            // Reset konten hasil pencarian
            const fieldsToClear = ['resultStart', 'resultEnd', 'resultDistance', 'resultTime', 'routeName'];
            fieldsToClear.forEach(fieldId => {
                const element = document.getElementById(fieldId);
                element.textContent = ''; // Menghapus teks dari elemen
            });

            // Bersihkan peta jika ada
            const map = document.getElementById('map');
            if (map) {
                map.innerHTML = ''; // Menghapus konten peta
            }
        }

        // Fungsi untuk menampilkan hasil pencarian
        function showResults() {
            const results = document.getElementById('results');
            results.classList.remove('hidden'); // Tampilkan elemen hasil
        }

        // Contoh untuk membuka modal
        document.getElementById('searchRoute').addEventListener('click', function() {
            document.getElementById('results').classList.remove('hidden');
        });

        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown-menu');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        const navbar = document.getElementById('navbar');
        window.onscroll = () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        };

        let map; // Variabel global untuk menyimpan instance peta
        let deviceLocation = {
            lat: null,
            lng: null,
            name: null
        }; // Variabel global untuk lokasi perangkat

        document.getElementById("searchRoute").addEventListener("click", function() {
            const endSelect = document.getElementById("endLocation");
            const endOption = endSelect.options[endSelect.selectedIndex];

            // Validasi lokasi tujuan
            if (!endOption || endOption.value === "-- Pilih Lokasi Tujuan --") {
                alert("Silakan pilih lokasi tujuan!");
                return;
            }

            // Ambil data lokasi tujuan
            const endLat = parseFloat(endOption.getAttribute("data-lat"));
            const endLng = parseFloat(endOption.getAttribute("data-lng"));
            const endName = endOption.text;

            // Tampilkan hasil awal
            document.getElementById("results").style.display = "block";
            document.getElementById("resultStart").textContent = "Menentukan lokasi awal...";
            document.getElementById("resultEnd").textContent = endName;
            document.getElementById("resultDistance").textContent = "Sedang menghitung...";
            document.getElementById("resultTime").textContent = "Sedang menghitung...";
            document.getElementById("routeName").textContent = "Menunggu hasil...";

            // Reset peta jika sudah ada instance sebelumnya
            if (map) {
                map.remove();
            }

            // Gunakan Geolocation API untuk mendapatkan lokasi perangkat
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        const startLat = position.coords.latitude;
                        const startLng = position.coords.longitude;

                        // Simpan lokasi perangkat ke variabel global
                        deviceLocation.lat = startLat;
                        deviceLocation.lng = startLng;

                        // Tampilkan nama lokasi awal menggunakan reverse geocoding
                        const geocodeUrl = `https://nominatim.openstreetmap.org/reverse?lat=${startLat}&lon=${startLng}&format=json`;

                        fetch(geocodeUrl)
                            .then((response) => response.json())
                            .then((data) => {
                                const startName = data.display_name || "Lokasi tidak ditemukan";
                                deviceLocation.name = startName; // Simpan nama lokasi perangkat
                                document.getElementById("resultStart").textContent = startName;

                                // Tampilkan peta dengan Leaflet
                                map = L.map("map", {
                                    dragging: true,
                                }).setView([startLat, startLng], 13);

                                L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                                    attribution: "© OpenStreetMap contributors",
                                }).addTo(map);

                                // Tambahkan marker untuk lokasi awal dan tujuan
                                L.marker([startLat, startLng], {
                                        draggable: false,
                                    })
                                    .addTo(map)
                                    .bindPopup(`Lokasi Awal: ${startName}`);

                                L.marker([endLat, endLng], {
                                        draggable: false,
                                    })
                                    .addTo(map)
                                    .bindPopup(`Lokasi Tujuan: ${endName}`);

                                // Tambahkan kontrol routing untuk rute tercepat
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
                                    }, // Hilangkan marker tambahan dari routing
                                }).addTo(map);

                                // Event untuk menangani hasil rute
                                routingControl.on("routesfound", function(e) {
                                    const route = e.routes[0]; // Ambil rute pertama (rute terpendek secara default)
                                    const distance = route.summary.totalDistance / 1000; // dalam kilometer
                                    const time = route.summary.totalTime / 60; // dalam menit
                                    const hours = Math.floor(time / 60);
                                    const minutes = Math.round(time % 60);
                                    const formattedTime = `${hours > 0 ? hours + " jam " : ""}${minutes} menit`;

                                    // Ambil nama rute
                                    const routeName = route.name || "Rute tidak bernama";

                                    // Tampilkan hasil
                                    document.getElementById("resultDistance").textContent = `${distance.toFixed(2)} KM`;
                                    document.getElementById("resultTime").textContent = `${formattedTime}`;
                                    document.getElementById("routeName").textContent = routeName;

                                    // Tambahkan nama rute ke peta
                                    L.polyline(route.coordinates, {
                                            color: "#13005A",
                                            weight: 3,
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

        // Saat modal dibuka kembali, isi input lokasi awal dengan lokasi perangkat
        document.getElementById("startLocation").addEventListener("focus", function() {
            if (deviceLocation.name) {
                this.value = deviceLocation.name;
            }
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