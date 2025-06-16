<?php
include '../config/database.php';
include '../templates/header.php';

$id = intval($_GET['id']);
$data = $koneksi->query("SELECT * FROM item WHERE id_item = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $koneksi->prepare("UPDATE item SET nama_item=?, uom=?, harga_beli=?, harga_jual=? WHERE id_item=?");
    $stmt->bind_param("ssiii", $_POST['nama_item'], $_POST['uom'], $_POST['harga_beli'], $_POST['harga_jual'], $id);
    $stmt->execute();
    header("Location: item.php");
    exit;
}
?>

<div class="container mt-4">
  <h4>Edit Item</h4>
  <form method="post">
    <div class="mb-3"><label>Nama Item</label><input type="text" name="nama_item" class="form-control" value="<?= $data['nama_item'] ?>" required></div>
    <div class="mb-3"><label>Satuan (UOM)</label><input type="text" name="uom" class="form-control" value="<?= $data['uom'] ?>" required></div>
    <div class="mb-3"><label>Harga Beli</label><input type="number" name="harga_beli" class="form-control" value="<?= $data['harga_beli'] ?>" required></div>
    <div class="mb-3"><label>Harga Jual</label><input type="number" name="harga_jual" class="form-control" value="<?= $data['harga_jual'] ?>" required></div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="item.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

<?php include '../templates/footer.php'; ?>
