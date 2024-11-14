<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'config/koneksi.php';

?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">Sewa Lapangan Badminton</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['user_logged_in'])): ?>
                    <?php if ($_SESSION['user_role'] === 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="dhasboard.php">Dashboard</a> <!-- Memanggil dashboard.php -->
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Custom CSS -->
<style>
    .navbar {
        border-bottom: 2px solid #007bff;
        /* Garis bawah navbar */
    }

    .navbar-light .navbar-nav .nav-link {
        color: #555;
        /* Warna teks default */
        transition: color 0.3s, background-color 0.3s;
        /* Efek transisi */
        padding: 10px 15px;
        /* Spasi dalam link */
        border-radius: 5px;
        /* Sudut membulat */
    }

    .navbar-light .navbar-nav .nav-link:hover {
        color: white;
        /* Warna teks saat hover */
        background-color: #007bff;
        /* Warna latar belakang saat hover */
    }

    .navbar-light .navbar-nav .nav-link.active {
        color: white;
        /* Warna teks saat aktif */
        background-color: #007bff;
        /* Warna latar belakang aktif */
        border-radius: 5px;
        /* Sudut membulat untuk link aktif */
    }

    /* Ikon di navbar */
    #home-link::before {
        content: '\1F3C0';
        /* Emoji badminton untuk Home */
        margin-right: 5px;
    }

    #services-link::before {
        content: '\1F3C3';
        /* Emoji layanan untuk Layanan */
        margin-right: 5px;
    }

    #contact-link::before {
        content: '\2709';
        /* Emoji surat untuk Kontak */
        margin-right: 5px;
    }
</style>