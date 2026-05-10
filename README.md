# Jakarta-Explore

Jakarta-Explore adalah project tugas akhir skripsi yang dikembangkan sebagai aplikasi pencarian rute tercepat menuju destinasi wisata di wilayah Jakarta, Indonesia. Aplikasi ini bertujuan membantu pengguna menemukan jalur perjalanan yang lebih efisien sehingga waktu tempuh menuju lokasi wisata dapat menjadi lebih optimal.

Dalam proses pencarian rute, Jakarta-Explore menerapkan algoritma Dijkstra untuk menghitung jalur terpendek dari titik awal menuju destinasi yang dipilih. Algoritma ini bekerja dengan menganalisis setiap kemungkinan rute berdasarkan bobot jarak antar lokasi, kemudian menentukan lintasan dengan total jarak paling kecil. Hasil perhitungan tersebut digunakan sebagai rekomendasi rute tercepat bagi pengguna.

## Tujuan Project

Project ini dibuat sebagai implementasi tugas akhir skripsi sekaligus penerapan konsep algoritma pencarian jalur terpendek dalam pengembangan aplikasi berbasis web. Jakarta-Explore dirancang agar dapat menjadi media informasi sekaligus alat bantu navigasi sederhana bagi pengguna yang ingin mengeksplorasi destinasi wisata di Jakarta.

## Fitur Utama

* Menampilkan daftar destinasi wisata di Jakarta
* Menyediakan informasi singkat mengenai lokasi wisata
* Menghitung rute tercepat dari titik awal menuju destinasi
* Menampilkan hasil perhitungan jalur menggunakan algoritma Dijkstra
* Membantu pengguna memilih rute perjalanan yang lebih efisien

## Teknologi yang Digunakan

Project ini dikembangkan menggunakan:

* PHP Native
* Tailwind CSS
* HTML
* JavaScript
* MySQL

## Database

Jakarta-Explore menggunakan database MySQL untuk menyimpan data destinasi wisata, data lokasi, serta data bobot jarak antar titik. Struktur data tersebut digunakan sebagai dasar pembentukan graf yang kemudian diproses oleh algoritma Dijkstra dalam menentukan rute tercepat.

## Cara Menjalankan Project

1. Clone repository ini.
2. Simpan project di folder web server seperti `htdocs` jika menggunakan XAMPP.
3. Import file database `.sql` ke MySQL melalui phpMyAdmin.
4. Pastikan konfigurasi koneksi database sudah sesuai.
5. Jalankan web server Apache dan MySQL.
6. Buka project melalui browser.

## Cara Kerja Singkat

Pengguna memilih titik awal dan destinasi wisata yang ingin dituju. Sistem kemudian mengambil data lokasi dan bobot jarak dari database, lalu memprosesnya dalam bentuk graf. Setelah perhitungan selesai, aplikasi menampilkan jalur dengan total jarak paling kecil sebagai rute tercepat yang direkomendasikan.

## Author

Project ini dibuat sebagai tugas akhir skripsi.
