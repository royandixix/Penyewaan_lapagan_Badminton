
<?php
// Koneksi ke database
$db = mysqli_connect("localhost", "root", "", "db_lapanganbadminton_212096");

// Cek koneksi
if (!$db) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil data dari tabel pemesanan_212096
$query = "SELECT id_pemesanan_212096, nama_212096, alamat_212096, jam_mulai_212096, jam_selesai_212096 FROM pemesanan_212096";
$result = mysqli_query($db, $query);

// Cek jika ada data yang ditemukan
$rows = [];
if ($result && mysqli_num_rows($result) > 0) {
    // Mengisi array $rows dengan data yang diambil
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
}
