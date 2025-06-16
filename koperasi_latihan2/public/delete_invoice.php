<?php
include '../config/database.php';

$id = $_GET['id'];
$koneksi->query("DELETE FROM sales WHERE id_sales = $id");

header("Location: index.php");
exit;
?>
