<?php
include '../config/database.php';
include '../templates/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_transaction = $_POST['id_transaction'];
    $id_item = $_POST['id_item'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];

    $stmt = $koneksi->prepare("INSERT INTO transaction (id_transaction, id_item, quantity, price, amount) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $id_transaction, $id_item, $quantity, $price, $amount);
    $stmt->execute();

    echo "<div class='alert alert-success container mt-4'>✅ Transaksi berhasil ditambahkan!</div>";
}
?>

<!-- Estetik Styling -->
<style>
  body {
    background: linear-gradient(to right, #fef9c3, #e0f2fe);
    min-height: 100vh;
  }

  .card-custom {
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    padding: 30px;
    margin-top: 60px;
  }

  label {
    font-weight: 500;
  }

  .btn-success {
    border-radius: 8px;
    padding: 10px 20px;
  }
</style>

<div class="container">
  <div class="card-custom">
    <h4 class="mb-4 text-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Transaksi</h4>

    <form method="post">
      <div class="mb-3">
        <label>ID Transaksi</label>
        <input type="number" name="id_transaction" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>ID Item</label>
        <input type="number" name="id_item" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Harga (Price)</label>
        <input type="text" name="price" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Total (Amount)</label>
        <input type="text" name="amount" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">
        <i class="bi bi-save me-1"></i> Simpan
      </button>
    </form>
  </div>
</div>

<?php include '../templates/footer.php'; ?>
