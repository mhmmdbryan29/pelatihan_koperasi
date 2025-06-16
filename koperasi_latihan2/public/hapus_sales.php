<?php
include '../config/database.php';

$id = intval($_GET['id']);

if ($id > 0) {
    // Jalankan query hapus
    $stmt = $koneksi->prepare("DELETE FROM sales WHERE id_sales = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Kembali ke halaman utama sales
header("Location: sales.php");
exit;
?>
