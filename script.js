$(document).ready(function () {
  // Cek apakah elemen dengan kelas .info-data ada
  const notifikasi = $(".info-data").data("infodata");

  if (notifikasi) {
    if (
      notifikasi === "Ditambahkan" ||
      notifikasi === "Dihapus" ||
      notifikasi === "Diupdate"
    ) {
      Swal.fire({
        icon: "success",
        title: "Sukses",
        text: "Data Berhasil " + notifikasi,
      });
    } else if (
      notifikasi === "Gagal Ditambahkan" ||
      notifikasi === "Gagal Dihapus" ||
      notifikasi === "Gagal Di update"
    ) {
      Swal.fire({
        icon: "error",
        title: "GAGAL",
        text: "Data " + notifikasi,
      });
    } else if (notifikasi === "Kosong") {
      // Tidak melakukan apa-apa jika notifikasi kosong
    }
  }

  // Event handler untuk tombol hapus
  $(".hapus").on("click", function (e) {
    e.preventDefault();
    var getLink = $(this).attr("href");

    Swal.fire({
      title: "Hapus Data?",
      text: "Data akan dihapus permanen",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Hapus",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = getLink;
      }
    });
  });

  // Inisialisasi DataTables
  new DataTable("#example");
});
