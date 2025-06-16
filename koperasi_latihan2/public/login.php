<?php
session_start();
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $koneksi->prepare("SELECT * FROM petugas WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
        exit;
    } else {
        $error = "Login gagal! Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Koperasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1500&q=80') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-wrapper {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-box {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.3);
      width: 100%;
      max-width: 400px;
    }
    .login-box h3 {
      text-align: center;
      color: #fff;
      margin-bottom: 25px;
    }
    .form-label, .form-control, .btn {
      font-size: 16px;
    }
    .form-control {
      background: rgba(255, 255, 255, 0.3);
      border: none;
      color: #fff;
    }
    .form-control::placeholder {
      color: #eee;
    }
    .form-control:focus {
      background: rgba(255, 255, 255, 0.4);
      color: #fff;
    }
    .btn-primary {
      background-color: #4b7bec;
      border: none;
    }
  </style>
</head>
<body>

<div class="login-wrapper">
  <div class="login-box">
    <h3>LOGIN </h3>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label class="form-label text-white">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
      </div>
      <div class="mb-3">
        <label class="form-label text-white">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</div>

</body>
</html>
