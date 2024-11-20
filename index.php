<?php
session_start();

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'config/koneksi.php'; // Pastikan koneksi ke database sudah benar
require 'templates/header.php';
require 'templates/navbar.php';

// Pastikan koneksi database berhasil
if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Pesan dan error
$message = '';
$error = '';

// Jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi data yang dikirim melalui form
    if (isset($_POST['start_time'], $_POST['end_time'], $_POST['court_id'], $_POST['nama'], $_POST['alamat'])) {
        // Ambil data dari formulir dan sanitasi
        $startTime = mysqli_real_escape_string($db, $_POST['start_time']);
        $endTime = mysqli_real_escape_string($db, $_POST['end_time']);
        $courtId = mysqli_real_escape_string($db, $_POST['court_id']);
        $nama = mysqli_real_escape_string($db, $_POST['nama']);
        $alamat = mysqli_real_escape_string($db, $_POST['alamat']);

        // Gunakan ID pengguna yang ada
        $userId = $_SESSION['user_id']; // Pastikan pengguna sudah login

        // Menentukan status konfirmasi sebagai 0 (belum dikonfirmasi)
        $confirm = 0;

        // Query insert ke pemesanan
        $query = "INSERT INTO pemesanan_212096 (idpengguna_212096, idlapangan_212096, tanggalpemesanan_212096, jammulai_212096, jamselesai_212096, konfirmasi_212096, nama_212096, alamat_212096)
                  VALUES ('$userId', '$courtId', NOW(), '$startTime', '$endTime', '$confirm', '$nama', '$alamat')";

        if (mysqli_query($db, $query)) {
            // Pesan keberhasilan
            $message = 'Pemesanan berhasil, status konfirmasi: 0 (belum dikonfirmasi)';
        } else {
            $error = 'Pemesanan gagal: ' . mysqli_error($db);
        }
    } else {
        $error = 'Data tidak lengkap.';
    }
}

// Query untuk menampilkan data lapangan
$courtQuery = "SELECT * FROM lapangan_212096";
$courtResult = mysqli_query($db, $courtQuery);
?>

<div class="container">
    <main class="flex-shrink-0">
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Sewa Lapangan Badminton Terbaik</h1>
                            <p class="lead fw-normal text-white-50 mb-4">Nikmati pengalaman bermain badminton di lapangan berkualitas.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="penyewa.php">Pesan Sekarang</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">Pelajari Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Menampilkan daftar lapangan -->
        <section id="courts" class="py-5 bg-light">
            <div>
                <h3 id="target-element" class="mb-5">Daftar Lapangan</h3>
                <div class="row">
                    <?php if (mysqli_num_rows($courtResult) > 0): ?>
                        <?php while ($court = mysqli_fetch_assoc($courtResult)): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow border-0">
                                    <img src="<?= htmlspecialchars($court['gambar_212096']) ?>" class="card-img-top" alt="<?= htmlspecialchars($court['namalapangan_212096']) ?>" style="height: 200px; object-fit: cover;" onerror="this.onerror=null; this.src='path/to/default-image.jpg';">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($court['namalapangan_212096']) ?></h5>
                                        <p class="card-text">Harga: <?= htmlspecialchars($court['harga_212096']) ?></p>
                                        <p class="card-text">Waktu Tersedia: <?= htmlspecialchars($court['tanggal_waktu_212096']) ?></p>
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bookingModal" data-court-id="<?= $court['idlapangan_212096'] ?>" data-price="<?= $court['harga_212096'] ?>">
                                            Sewa <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>Tidak ada lapangan yang tersedia.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    </main>
</div>

<!-- Modal Konfirmasi Pemesanan -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="bookingModalLabel">Konfirmasi Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="index.php" id="bookingForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="nama" required placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="alamat" required placeholder="Masukkan alamat lengkap"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="startTime" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="startTime" name="start_time" required>
                    </div>

                    <div class="mb-3">
                        <label for="endTime" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" id="endTime" name="end_time" required>
                    </div>

                    <div class="mb-3">
                        <label for="courtPrice" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="courtPrice" disabled>
                    </div>

                    <input type="hidden" name="court_id" id="courtId">
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<?php require 'templates/footer.php'; ?>

<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Menangani event modal untuk mengisi informasi lapangan yang dipilih
    $('#bookingModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var courtId = button.data('court-id');
        var price = button.data('price');

        var modal = $(this);
        modal.find('#courtId').val(courtId);
        modal.find('#courtPrice').val(price);
    });

    // Menampilkan notifikasi setelah pengiriman formulir berhasil
    <?php if ($message): ?>
        Swal.fire({
            icon: 'success',
            title: 'Pemesanan Berhasil',
            text: '<?= $message ?>',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>

    <?php if ($error): ?>
        Swal.fire({
            icon: 'error',
            title: 'Pemesanan Gagal',
            text: '<?= $error ?>',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>
</script>
