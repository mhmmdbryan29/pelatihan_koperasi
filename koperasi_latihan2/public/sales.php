<?php
session_start();
include '../config/database.php';
include '../templates/header.php';

// Ambil data sales + join ke customer
$result = $koneksi->query("
    SELECT s.*, c.nama_customer 
    FROM sales s
    LEFT JOIN customer c ON s.id_customer = c.id_customer
");
?>

<!-- Estetik Style -->
<style>
  body {
    background: linear-gradient(to right, #fdf2f8, #f0f9ff);
    min-height: 100vh;
  }

  .card-custom {
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    padding: 25px;
    margin-top: 40px;
  }

  .table th, .table td {
    vertical-align: middle;
  }

  .btn i {
    vertical-align: middle;
  }

  .badge {
    font-size: 0.85rem;
    padding: 0.5em 0.75em;
    border-radius: 8px;
  }
</style>

<div class="container">
  <div class="card-custom">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="mb-0 text-primary">
        <i class="bi bi-cart-check me-2"></i>DATA SALES
      </h4>
      <a href="tambah_sales.php" class="btn btn-success shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Tambah Sales
      </a>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle" id="dataTable">
        <thead class="table-info">
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Customer</th>
            <th>No. DO</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while ($s = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= date('d-m-Y', strtotime($s['tgl_sales'])); ?></td>
            <td><?= $s['nama_customer']; ?></td>
            <td><?= $s['do_number']; ?></td>
            <td>
              <span class="badge bg-<?= $s['status'] == 'selesai' ? 'success' : 'warning'; ?>">
                <?= ucfirst($s['status']); ?>
              </span>
            </td>
            <td>
              <a href="edit_sales.php?id=<?= $s['id_sales']; ?>" class="btn btn-warning btn-sm me-1">
                <i class="bi bi-pencil-square"></i>
              </a>
              <a href="hapus_sales.php?id=<?= $s['id_sales']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">
                <i class="bi bi-trash"></i>
              </a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include '../templates/footer.php'; ?>
