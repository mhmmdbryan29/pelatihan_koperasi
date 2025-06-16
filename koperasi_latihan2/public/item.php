<?php
session_start();
include '../config/database.php';
include '../templates/header.php';

$result = $koneksi->query("SELECT * FROM item");
?>

<!-- Custom Style -->
<style>
  body {
    background: linear-gradient(to right, #fefce8, #e0f2fe);
    min-height: 100vh;
  }

  .card-custom {
    background-color: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    padding: 30px;
    margin-top: 60px;
  }

  .btn i {
    vertical-align: middle;
  }

  .badge-satuan {
    font-size: 0.85rem;
    background: #e2e8f0;
    padding: 4px 8px;
    border-radius: 6px;
    font-weight: 500;
  }
</style>

<div class="container">
  <div class="card-custom">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="text-primary mb-0"><i class="bi bi-box me-2"></i>DATA ITEM</h4>
      <a href="tambah_item.php" class="btn btn-success">
        <i class="bi bi-plus-circle me-1"></i> Tambah Item
      </a>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped">
        <thead class="table-info text-center">
          <tr>
            <th>No</th>
            <th>Nama Item</th>
            <th>Satuan</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while ($i = $result->fetch_assoc()): ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= $i['nama_item'] ?></td>
            <td class="text-center"><span class="badge-satuan"><?= strtoupper($i['uom']) ?></span></td>
            <td>Rp <?= number_format($i['harga_beli'], 0, ',', '.') ?></td>
            <td>Rp <?= number_format($i['harga_jual'], 0, ',', '.') ?></td>
            <td class="text-center">
              <a href="edit_item.php?id=<?= $i['id_item'] ?>" class="btn btn-warning btn-sm me-1" title="Edit">
                <i class="bi bi-pencil-square"></i>
              </a>
              <a href="hapus_item.php?id=<?= $i['id_item'] ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin hapus?')">
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
