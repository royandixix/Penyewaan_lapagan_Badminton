<?php
// Koneksi ke database
$db = mysqli_connect("localhost", "root", "", "db_lapanganbadminton_212096");

// Cek koneksi
if (!$db) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil data dari tabel pemesanan_212096
$query = "SELECT idpemesanan_212096, idpengguna_212096, idlapangan_212096, tanggalpemesanan_212096, jammulai_212096, jamselesai_212096 FROM pemesanan_212096";
$result = mysqli_query($db, $query);

// Cek jika query gagal
if (!$result) {
    die("Query Error: " . mysqli_error($db));
}

// Cek jika ada data yang ditemukan
$rows = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
}
?>
