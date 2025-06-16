<?php
include '../config/database.php';
include '../templates/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id_customer = $_POST['id_customer'];
    $nama_customer = $_POST['nama_customer'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $fax = $_POST['fax'];
    $email = $_POST['email'];

    // Siapkan dan eksekusi query dengan mysqli prepared statement
    $stmt = $koneksi->prepare("INSERT INTO customer (id_customer, nama_customer, alamat, telp, fax, email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $id_customer, $nama_customer, $alamat, $telp, $fax, $email);
    $stmt->execute();

    // Arahkan kembali ke halaman index
    header('Location: index.php');
    exit;
}
?>

<h2>Tambah Customer</h2>
<form method="post">
  <div class="mb-3"><label>ID Customer</label><input type="number" name="id_customer" class="form-control" required></div>
  <div class="mb-3"><label>Nama</label><input type="text" name="nama_customer" class="form-control" required></div>
  <div class="mb-3"><label>Alamat</label><input type="text" name="alamat" class="form-control" required></div>
  <div class="mb-3"><label>Telp</label><input type="text" name="telp" class="form-control" required></div>
  <div class="mb-3"><label>Fax</label><input type="text" name="fax" class="form-control"></div>
  <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
  <button type="submit" class="btn btn-success">Simpan</button>
</form>

<?php include '../templates/footer.php'; ?>
