<?php
$host = "localhost"; // Host database
$username = "root"; // Username database
$password = ""; // Password database
$database = "db_koperasi"; // Nama database

// Membuat koneksi ke database
$koneksi = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Setel karakter set UTF-8 untuk koneksi
$koneksi->set_charset("utf8");
?>