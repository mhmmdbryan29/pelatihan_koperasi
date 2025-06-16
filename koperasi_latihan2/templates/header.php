<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Koperasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }
    .sidebar {
      height: 100vh;
      width: 240px;
      position: fixed;
      background-color:rgb(159, 95, 0);
      padding: 30px 20px;
      overflow-y: auto;
    }
    .sidebar h4 {
      font-weight: bold;
      color: white;
      margin-bottom: 30px;
    }
    .sidebar a {
      display: block;
      color: white;
      padding: 10px 15px;
      margin: 6px 0;
      border-radius: 8px;
      transition: background 0.3s;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color:rgb(22, 13, 2);
    }
    .sidebar p {
      color: white;
      margin-top: 25px;
      margin-bottom: 5px;
      font-size: 13px;
      font-weight: bold;
      opacity: 0.8;
      border-bottom: 1px solid rgba(126, 78, 6, 0.2);
      padding-bottom: 4px;
    }
    .main-content {
      margin-left: 260px;
      padding: 20px;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <h4>KOPERASI</h4>

  <p>Data Master</p>
  <a href="index.php"><i class="bi bi-people"></i> Customer</a>

  <p> Master</p>
  <a href="sales.php"><i class="bi bi-people"></i> Sales</a>

  <p>Transaksi</p>
  <a href="transaksi.php"><i class="bi bi-cart-plus"></i> Transaksi</a>
  <a href="item.php"><i class="bi bi-cart-plus"></i> Item</a>

  <p>Laporan</p>
  <a href="laporan.php"><i class="bi bi-clipboard-data"></i> Laporan</a>

  <p class="mt-4">Akun</p>
  <a href="logout.php" class="text-danger fw-bold"><i class="bi bi-box-arrow-left"></i> Logout</a>
</div>

<div class="main-content">
