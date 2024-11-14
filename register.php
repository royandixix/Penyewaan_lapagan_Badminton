<?php
session_start();
include 'config/koneksi.php';

// Proses registrasi
if (isset($_POST['register'])) {
    // Mengamankan input dari user
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($db, $_POST['confirm-password']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $role = mysqli_real_escape_string($db, $_POST['role']);

    // Cek jika password dan konfirmasi password sama
    if ($password === $confirm_password) {
        // Cek apakah email sudah terdaftar
        $check_email_query = "SELECT * FROM pengguna_212096 WHERE email_212096 = '$email'";
        $result = mysqli_query($db, $check_email_query);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['error_message'] = "Email sudah terdaftar. Silakan gunakan email lain.";
        } else {
            // Hash password untuk keamanan
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO pengguna_212096 (nama_212096, email_212096, password_212096, no_telp_212096, role_212096) 
                      VALUES ('$name', '$email', '$hashed_password', '$phone', '$role')";

            if (mysqli_query($db, $query)) {
                $_SESSION['success_message'] = "Registrasi berhasil!";
                header("Location: login.php"); // Redirect ke halaman login setelah registrasi
                exit();
            } else {
                $_SESSION['error_message'] = "Terjadi kesalahan: " . mysqli_error($db);
            }
        }
    } else {
        $_SESSION['error_message'] = "Password dan konfirmasi password tidak sama.";
    }
    header("Location: register.php"); // Redirect kembali ke halaman registrasi
    exit();
}
?>

<!-- HTML Registration Form -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Lapangan Badminton</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .register-card {
            max-width: 400px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            background-color: #ffffff;
        }

        .register-card-description {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .alert {
            font-size: 14px;
        }

        .form-group label {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        .text-reset {
            color: #007bff;
            text-decoration: none;
        }

        .text-reset:hover {
            text-decoration: underline;
        }

        body {
            background-color: #f8f9fa;
            background-image: url(img/istockphoto-1390191053-2048x2048.jpg);
        }

        .login-card {
            max-width: 400px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: white;
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
            <div class="card register-card">
                <div class="card-body">
                    <p class="register-card-description">Daftar akun baru</p>

                    <!-- Display Success or Error Message -->
                    <?php if (isset($_SESSION['error_message'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error_message'];
                            unset($_SESSION['error_message']); ?>
                        </div>
                    <?php elseif (isset($_SESSION['success_message'])): ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success_message'];
                            unset($_SESSION['success_message']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Konfirmasi Password</label>
                            <input type="password" name="confirm-password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">No Telepon</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <button name="register" class="btn btn-primary btn-block" type="submit">Daftar</button>
                    </form>
                    <p class="text-center mt-3">Sudah punya akun? <a href="login.php" class="text-reset">Masuk di sini</a></p>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>