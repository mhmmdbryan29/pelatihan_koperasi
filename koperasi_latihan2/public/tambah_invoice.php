<?php
include '../config/database.php';
include '../templates/header.php';

$customers = $koneksi->query("SELECT * FROM customer");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $koneksi->prepare("INSERT INTO sales (id_sales, tgl_sales, id_customer, do_number, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isiss", $_POST['id_sales'], $_POST['tgl_sales'], $_POST['id_customer'], $_POST['do_number'], $_POST['status']);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>

<h2>Tambah Invoice</h2>
<form method="post">
  <div class="mb-3"><label>ID Sales</label><input type="number" name="id_sales" class="form-control" required></div>
  <div class="mb-3"><label>Tanggal Sales</label><input type="datetime-local" name="tgl_sales" class="form-control" required></div>
  <div class="mb-3"><label>Customer</label>
    <select name="id_customer" class="form-control" required>
      <option value="">-- Pilih Customer --</option>
      <?php while ($c = $customers->fetch_assoc()): ?>
        <option value="<?= $c['id_customer'] ?>"><?= $c['nama_customer'] ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <div class="mb-3"><label>DO Number</label><input type="text" name="do_number" class="form-control" required></div>
  <div class="mb-3"><label>Status</label>
    <select name="status" class="form-control" required>
      <option value="Lunas">Lunas</option>
      <option value="Belum Lunas">Belum Lunas</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
</form>

<?php include '../templates/footer.php'; ?>
