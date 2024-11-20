<?php
include 'config/koneksi.php'; // Sertakan koneksi ke database

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">



    <link rel="stylesheet" href="dhasboard/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="dhasboard/assets/css/animate.css">

    <link rel="stylesheet" href="dhasboard/assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="dhasboard/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="dhasboard/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="dhasboard/assets/css/style.css">
</head>
<style>
    .sidebar-menu a {
        display: flex;
        align-items: center;
    }

    .sidebar-menu a i {
        margin-right: 8px;
        /* Jarak antara ikon dan teks */
    }
</style>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">
        <div class="header">

            <div class="header-left active">
                <!-- <a href="index.html" class="logo">
        <img src="dhasboard/assets/img/logo.png" alt="">
    </a> -->
                <a href="index.html" class="logo-small">
                    <img src="dhasboard/assets/img/logo-small.png" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);"></a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">
                <li class="nav-item">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#">
                            <div class="searchinputs">
                                <input type="text" placeholder="Cari di sini ...">
                                <div class="search-addon">
                                    <span><img src="dhasboard/assets/img/icons/closes.svg" alt="img"></span>
                                </div>
                            </div>
                            <a class="btn" id="searchdiv">
                                <img src="dhasboard/assets/img/icons/search.svg" alt="img">
                            </a>
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <img src="dhasboard/assets/img/icons/notification-bing.svg" alt="img">
                        <span class="badge rounded-pill">4</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifikasi</span>
                            <a href="javascript:void(0)" class="clear-noti"> Hapus Semua </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="dhasboard/assets/img/profiles/avatar-02.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> menambahkan tugas baru <span class="noti-title">Pemesanan janji pasien</span></p>
                                                <p class="noti-time"><span class="notification-time">4 menit yang lalu</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="dhasboard/assets/img/profiles/avatar-03.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> mengubah nama tugas <span class="noti-title">Pemesanan janji dengan gateway pembayaran</span></p>
                                                <p class="noti-time"><span class="notification-time">6 menit yang lalu</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="dhasboard/assets/img/profiles/avatar-06.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Misty Tison</span> menambahkan <span class="noti-title">Domenic Houston</span> dan <span class="noti-title">Claire Mapes</span> ke proyek <span class="noti-title">Modul dokter tersedia</span></p>
                                                <p class="noti-time"><span class="notification-time">8 menit yang lalu</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="dhasboard/assets/img/profiles/avatar-17.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Rolland Webber</span> menyelesaikan tugas <span class="noti-title">Video konferensi pasien dan dokter</span></p>
                                                <p class="noti-time"><span class="notification-time">12 menit yang lalu</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="dhasboard/assets/img/profiles/avatar-13.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> menambahkan tugas baru <span class="noti-title">Modul chat pribadi</span></p>
                                                <p class="noti-time"><span class="notification-time">2 hari yang lalu</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">Lihat semua Notifikasi</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img src="dhasboard/assets/img/profiles/avator1.jpg" alt="">
                            <span class="status online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img">
                                    <img src="dhasboard/assets/img/profiles/avator1.jpg" alt="">
                                    <span class="status online"></span>
                                </span>
                                <div class="profilesets">
                                    <h6>John Doe</h6>
                                    <h5>Admin</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i> Profil Saya</a>
                            <a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i> Pengaturan</a>
                            <hr class="m-0">
                            <a class="dropdown-item logout pb-0" href="logout.php">
                                <img src="dhasboard/assets/img/icons/log-out.svg" class="me-2" alt="img">Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <!-- harga sama degan data yg akan di tampilkan degan keseluruhan degan data yang ada  -->

        <div class="dropdown mobile-user-menu">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.html">Profil Saya</a>
                <a class="dropdown-item" href="generalsettings.html">Pengaturan</a>
                <a class="dropdown-item" href="logout.php">Logout</a> <!-- Mengarahkan ke logout.php -->
            </div>
        </div>


    </div>



    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="active">
                        <a href="dashboard.html"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="pengguna.php"><i class="fas fa-user"></i><span> Profil Pengguna</span></a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="tambahlapagan.php"><i class="fas fa-table-tennis"></i><span> Manajemen Lapangan</span></a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="detailpemesanan.php"><i class="fas fa-calendar-check"></i><span> Pemesanan</span></a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="reports.html"><i class="fas fa-chart-line"></i><span> Laporan</span></a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="index.php"><i class="fas fa-chart-line"></i><span> Keluar </span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <div class="page-wrapper">
        <div class="content">
            <div class="row">

                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count">
                        <div class="dash-counts">
                            <h4>100</h4>
                            <h5>Pengguna</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="user"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das1">
                        <div class="dash-counts">
                            <h4>50</h4>
                            <h5>Penyewa</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="user-check"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das2">
                        <div class="dash-counts">
                            <h4>20</h4>
                            <h5>Invoice Penyewaan</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file-text"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das3">
                        <div class="dash-counts">
                            <h4>15</h4>
                            <h5>Invoice Pembayaran</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive dataview">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Konfirmasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'config/koneksi.php'; // Sertakan koneksi ke database

                    // Pastikan koneksi berhasil
                    if (!$db) {
                        die("Koneksi gagal: " . mysqli_connect_error());
                    }

                    // Ambil data dari tabel pemesanan_212096
                    $query = "SELECT * FROM pemesanan_212096";
                    $result = mysqli_query($db, $query);

                    // Pastikan query berhasil
                    if (!$result) {
                        echo "Error: " . mysqli_error($db);
                    } else {
                        $no = 1; // Penomoran mulai dari 1
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($row['nama_212096'] ?? 'Data tidak tersedia'); ?></td> <!-- Menampilkan Nama -->
                                <td><?php echo htmlspecialchars($row['alamat_212096'] ?? 'Data tidak tersedia'); ?></td> <!-- Menampilkan Alamat -->
                                <td><?php echo htmlspecialchars($row['jammulai_212096'] ?? 'Data tidak tersedia'); ?></td> <!-- Menampilkan Jam Mulai -->
                                <td><?php echo htmlspecialchars($row['jamselesai_212096'] ?? 'Data tidak tersedia'); ?></td> <!-- Menampilkan Jam Selesai -->
                                <td>
                                    <?php
                                    // Debugging: tampilkan nilai konfirmasi
                                    echo 'Konfirmasi: ' . $row['konfirmasi_212096'];

                                    // Menampilkan ikon ceklis jika konfirmasi = 1, jika tidak tampilkan ikon silang
                                    if ($row['konfirmasi_212096'] == 1) {
                                        echo '<i class="fas fa-check" style="color: green;"></i>'; // Ikon ceklis berwarna hijau
                                    } else {
                                        echo '<i class="fas fa-times" style="color: red;"></i>'; // Ikon silang berwarna merah
                                    }
                                    ?>
                                </td> <!-- Menampilkan ikon ceklis atau silang berdasarkan status konfirmasi -->

                            </tr>
                    <?php
                        }
                    }

                    // Tutup koneksi database setelah selesai
                    mysqli_close($db);
                    ?>
                </tbody>

            </table>
        </div>



        <script src="dhasboard/assets/js/jquery-3.6.0.min.js"></script>

        <script src="dhasboard/assets/js/feather.min.js"></script>

        <script src="dhasboard/assets/js/jquery.slimscroll.min.js"></script>

        <script src="dhasboard/assets/js/jquery.dataTables.min.js"></script>
        <script src="dhasboard/assets/js/dataTables.bootstrap4.min.js"></script>

        <script src="dhasboard/assets/js/bootstrap.bundle.min.js"></script>

        <script src="dhasboard/assets/plugins/apexchart/apexcharts.min.js"></script>
        <script src="dhasboard/assets/plugins/apexchart/chart-data.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="dhasboard/assets/js/script.js"></script>
</body>

</html>