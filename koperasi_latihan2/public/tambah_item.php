<?php
include '../config/database.php';
include '../templates/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $koneksi->prepare("INSERT INTO item (nama_item, uom, harga_beli, harga_jual) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $_POST['nama_item'], $_POST['uom'], $_POST['harga_beli'], $_POST['harga_jual']);
    $stmt->execute();
    header("Location: item.php");
    exit;
}
?>

<div class="container mt-4">
  <h4>Tambah Item</h4>
  <form method="post">
    <div class="mb-3"><label>Nama Item</label><input type="text" name="nama_item" class="form-control" required></div>
    <div class="mb-3"><label>Satuan</label><input type="text" name="uom" class="form-control" required></div>
    <div class="mb-3"><label>Harga Beli</label><input type="number" name="harga_beli" class="form-control" required></div>
    <div class="mb-3"><label>Harga Jual</label><input type="number" name="harga_jual" class="form-control" required></div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="item.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

<?php include '../templates/footer.php'; ?>
