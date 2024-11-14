<?php
session_start();
include 'config/koneksi.php'; // Pastikan file koneksi.php sudah ada

if (isset($_POST['login'])) {
    // Mengambil email dan password dari form
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Query untuk mengambil data pengguna berdasarkan email
    $query = "SELECT * FROM pengguna_212096 WHERE email_212096 = '$email'";
    $result = mysqli_query($db, $query);

    // Memeriksa apakah email ditemukan dalam database
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Memeriksa apakah password yang dimasukkan cocok
        if (password_verify($password, $user['password_212096'])) {
            // Menyimpan data pengguna dalam session
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_id'] = $user['idpengguna_212096'];
            $_SESSION['user_name'] = htmlspecialchars($user['nama_212096']);
            $_SESSION['user_role'] = $user['role_212096'];

            // Mengarahkan pengguna ke halaman utama setelah login berhasil
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Password yang Anda masukkan salah.";
        }
    } else {
        $_SESSION['error_message'] = "Email tidak ditemukan.";
    }

    // Mengarahkan kembali ke halaman login jika ada kesalahan
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Lapangan Badminton</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url(img/istockphoto-1390191053-2048x2048.jpg);
            background-size: cover;
            background-position: center;
            font-family: 'Karla', sans-serif;
        }
        .login-card {
            max-width: 400px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 20px;
        }
        .login-btn {
            background-color: #007bff;
            color: white;
        }
        .login-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3">
        <div class="container">
            <div class="card login-card">
                <div class="card-body">
                    <h3 class="login-card-description text-center">Masuk ke akun Anda</h3>

                    <!-- Menampilkan pesan kesalahan jika ada -->
                    <?php if (isset($_SESSION['error_message'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Alamat Email" required>
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button name="login" class="btn btn-block login-btn mb-4" type="submit">Masuk</button>
                    </form>
                    <p>Belum punya akun? <a href="register.php" class="text-reset">Daftar di sini</a></p>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
