<?php
include '../config/database.php';
include '../templates/header.php';

// Ambil data dari tabel transaction
$data = [];
$result = $koneksi->query("SELECT * FROM transaction");

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
?>

<!-- Custom Style -->
<style>
  body {
    background: linear-gradient(to right, #f0fdf4, #ecfeff);
    min-height: 100vh;
  }

  .card-custom {
    background-color: #fff;
    border-radius: 16px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.07);
    padding: 30px;
    margin-top: 60px;
  }

  .badge-price {
    background-color: #e0f2fe;
    color: #0369a1;
    font-weight: 500;
    padding: 5px 10px;
    border-radius: 6px;
  }

  .badge-amount {
    background-color: #dcfce7;
    color: #15803d;
    font-weight: 500;
    padding: 5px 10px;
    border-radius: 6px;
  }
</style>

<div class="container">
  <div class="card-custom">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="text-success mb-0"><i class="bi bi-receipt-cutoff me-2"></i> Laporan Transaksi</h4>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped">
        <thead class="table-success text-center">
          <tr>
            <th>ID</th>
            <th>ID Item</th>
            <th>Quantity</th>
            <th>Harga</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $t): ?>
          <tr>
            <td class="text-center"><?= $t['id_transaction'] ?></td>
            <td class="text-center"><?= $t['id_item'] ?></td>
            <td class="text-center"><?= $t['quantity'] ?></td>
            <td class="text-end"><span class="badge-price">Rp <?= number_format($t['price'], 0, ',', '.') ?></span></td>
            <td class="text-end"><span class="badge-amount">Rp <?= number_format($t['amount'], 0, ',', '.') ?></span></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include '../templates/footer.php'; ?>
