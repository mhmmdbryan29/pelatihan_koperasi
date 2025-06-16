<?php
include '../config/database.php';

$id = $_GET['id'];
$koneksi->query("DELETE FROM customer WHERE id_customer = $id");

header("Location: index.php");
exit;
?>
