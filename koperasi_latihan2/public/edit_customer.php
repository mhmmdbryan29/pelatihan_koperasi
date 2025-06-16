<?php
include '../config/database.php';
include '../templates/header.php';

$id = $_GET['id'];
$result = $koneksi->query("SELECT * FROM customer WHERE id_customer = $id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $koneksi->prepare("UPDATE customer SET nama_customer=?, alamat=?, telp=?, fax=?, email=? WHERE id_customer=?");
    $stmt->bind_param("sssssi", $_POST['nama_customer'], $_POST['alamat'], $_POST['telp'], $_POST['fax'], $_POST['email'], $id);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>

<h2>Edit Customer</h2>
<form method="post">
  <div class="mb-3"><label>Nama</label><input type="text" name="nama_customer" class="form-control" value="<?= $data['nama_customer'] ?>" required></div>
  <div class="mb-3"><label>Alamat</label><input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>" required></div>
  <div class="mb-3"><label>Telp</label><input type="text" name="telp" class="form-control" value="<?= $data['telp'] ?>" required></div>
  <div class="mb-3"><label>Fax</label><input type="text" name="fax" class="form-control" value="<?= $data['fax'] ?>"></div>
  <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="<?= $data['email'] ?>" required></div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php include '../templates/footer.php'; ?>
