<?php
include '../config/database.php';
include '../templates/header.php';

$id = $_GET['id'];
$sales = $koneksi->query("SELECT * FROM sales WHERE id_sales = $id")->fetch_assoc();
$customers = $koneksi->query("SELECT * FROM customer");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $koneksi->prepare("UPDATE sales SET tgl_sales=?, id_customer=?, do_number=?, status=? WHERE id_sales=?");
    $stmt->bind_param("sissi", $_POST['tgl_sales'], $_POST['id_customer'], $_POST['do_number'], $_POST['status'], $id);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>

<h2>Edit Invoice</h2>
<form method="post">
  <div class="mb-3"><label>Tanggal Sales</label><input type="datetime-local" name="tgl_sales" value="<?= date('Y-m-d\TH:i', strtotime($sales['tgl_sales'])) ?>" class="form-control" required></div>
  <div class="mb-3"><label>Customer</label>
    <select name="id_customer" class="form-control" required>
      <?php while ($c = $customers->fetch_assoc()): ?>
        <option value="<?= $c['id_customer'] ?>" <?= $sales['id_customer'] == $c['id_customer'] ? 'selected' : '' ?>><?= $c['nama_customer'] ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <div class="mb-3"><label>DO Number</label><input type="text" name="do_number" value="<?= $sales['do_number'] ?>" class="form-control" required></div>
  <div class="mb-3"><label>Status</label>
    <select name="status" class="form-control" required>
      <option value="Lunas" <?= $sales['status'] == 'Lunas' ? 'selected' : '' ?>>Lunas</option>
      <option value="Belum Lunas" <?= $sales['status'] == 'Belum Lunas' ? 'selected' : '' ?>>Belum Lunas</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php include '../templates/footer.php'; ?>
