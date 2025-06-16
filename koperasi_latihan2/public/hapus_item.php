<?php
include '../config/database.php';

$id = intval($_GET['id']);
$koneksi->query("DELETE FROM item WHERE id_item = $id");

header("Location: item.php");
exit;
?>
