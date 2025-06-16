<?php
include '../config/database.php';
include '../templates/header.php';

$id = intval($_GET['id']);
$data = $koneksi->query("SELECT * FROM sales WHERE id_sales = $id")->fetch_assoc();
$customers = $koneksi->query("SELECT * FROM customer");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $koneksi->prepare("UPDATE sales SET tgl_sales=?, id_customer=?, do_number=?, status=? WHERE id_sales=?");
    $stmt->bind_param("sissi",
        $_POST['tgl_sales'],
        $_POST['id_customer'],
        $_POST['do_number'],
        $_POST['status'],
        $id
    );
    $stmt->execute();
    header("Location: sales.php");
    exit;
}
?>

<div class="container mt-4">
  <h4>Edit Data Sales</h4>
  <form method="post">
    <div class="mb-3">
      <label>Tanggal Sales</label>
      <input type="date" name="tgl_sales" class="form-control" value="<?= $data['tgl_sales'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Customer</label>
      <select name="id_customer" class="form-select" required>
        <?php while ($c = $customers->fetch_assoc()): ?>
        <option value="<?= $c['id_customer'] ?>" <?= $data['id_customer'] == $c['id_customer'] ? 'selected' : '' ?>>
          <?= $c['nama_customer'] ?>
        </option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="mb-3">
      <label>DO Number</label>
      <input type="text" name="do_number" class="form-control" value="<?= $data['do_number'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-select" required>
        <option value="LUNAS" <?= $data['status'] == 'LUNAS' ? 'selected' : '' ?>>LUNAS</option>
        <option value="BELUM LUNAS" <?= $data['status'] == 'BELUM LUNAS' ? 'selected' : '' ?>>BELUM LUNAS</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="sales.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

<?php include '../templates/footer.php'; ?>
