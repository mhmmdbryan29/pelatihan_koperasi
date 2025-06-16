<?php
include '../config/database.php';
include '../templates/header.php';

// Ambil daftar customer
$customers = $koneksi->query("SELECT * FROM customer");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $koneksi->prepare("INSERT INTO sales (id_sales, tgl_sales, id_customer, do_number, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isiss", $_POST['id_sales'], $_POST['tgl_sales'], $_POST['id_customer'], $_POST['do_number'], $_POST['status']);
    $stmt->execute();
    header("Location: sales.php");
    exit;
}
?>

<div class="container mt-4">
  <h4>Tambah Data Sales</h4>
  <form method="post">
    <div class="mb-3">
      <label>Tanggal Sales</label>
      <input type="date" name="tgl_sales" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Customer</label>
      <select name="id_customer" class="form-select" required>
        <option value="">-- Pilih Customer --</option>
        <?php while ($c = $customers->fetch_assoc()): ?>
        <option value="<?= $c['id_customer'] ?>"><?= $c['nama_customer'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="mb-3">
      <label>DO Number</label>
      <input type="text" name="do_number" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-select" required>
        <option value="LUNAS">LUNAS</option>
        <option value="BELUM LUNAS">BELUM LUNAS</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="invoice.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

<?php include '../templates/footer.php'; ?>
