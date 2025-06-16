<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
include '../config/database.php';
include '../templates/header.php';

// Ambil data customer
$query = "SELECT * FROM customer";
$result = $koneksi->query($query);
?>

<!-- Custom Background -->
<style>
  body {
    background: linear-gradient(to right, #dbeafe, #f0f9ff);
    min-height: 100vh;
  }

  .card-custom {
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    padding: 25px;
  }

  .table th, .table td {
    vertical-align: middle;
  }

  .btn i {
    vertical-align: middle;
  }
</style>

<div class="container py-5">
  <div class="card-custom">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="mb-0"><i class="bi bi-people-fill me-2"></i>DATA CUSTOMER</h4>
      <a href="tambah_customer.php" class="btn btn-success">
        <i class="bi bi-plus-circle me-1"></i> Add Customer
      </a>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped" id="dataTable">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Email</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while ($c = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $c['id_customer'] ?></td>
            <td><?= $c['nama_customer'] ?></td>
            <td><?= $c['alamat'] ?></td>
            <td><?= $c['telp'] ?></td>
            <td><?= $c['email'] ?></td>
            <td>
              <?php if ($no % 2 == 0): ?>
                <span class="badge bg-success">Aktif</span>
              <?php else: ?>
                <span class="badge bg-danger">Tidak Aktif</span>
              <?php endif; ?>
            </td>
            <td>
              <a href="edit_customer.php?id=<?= $c['id_customer'] ?>" class="btn btn-sm btn-warning me-1" title="Edit">
                <i class="bi bi-pencil-square"></i>
              </a>
              <a href="delete_customer.php?id=<?= $c['id_customer'] ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin hapus data ini?')">
                <i class="bi bi-trash"></i>
              </a>
            </td>
          </tr>
          <?php $no++; endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include '../templates/footer.php'; ?>
