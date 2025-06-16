<?php
// Contoh data
$invoice_number = "INV-20250615-001";
$date = date("d-m-Y");
$customer_name = "Nia Oktavia";
$items = [
    ['nama' => 'Pulpen', 'qty' => 2, 'harga' => 3500],
    ['nama' => 'Buku Tulis', 'qty' => 3, 'harga' => 7500],
    ['nama' => 'Penggaris', 'qty' => 1, 'harga' => 5000],
];

// Hitung total
$total = 0;
foreach ($items as $item) {
    $total += $item['qty'] * $item['harga'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 300px;
            margin: auto;
        }
        h2, p {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        td, th {
            padding: 5px;
        }
        .total {
            border-top: 1px dashed #000;
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>TOKO MAJU JAYA</h2>
    <p>Jl. Contoh No. 123 - Jakarta</p>
    <hr>

    <p><strong>No. Invoice:</strong> <?= $invoice_number ?><br>
    <strong>Tanggal:</strong> <?= $date ?><br>
    <strong>Pelanggan:</strong> <?= $customer_name ?></p>

    <table>
        <thead>
            <tr>
                <th>Barang</th>
                <th>Qty</th>
                <th class="text-right">Harga</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $item['nama'] ?></td>
                <td><?= $item['qty'] ?></td>
                <td class="text-right"><?= number_format($item['harga']) ?></td>
                <td class="text-right"><?= number_format($item['qty'] * $item['harga']) ?></td>
            </tr>
            <?php endforeach; ?>
            <tr class="total">
                <td colspan="3" class="text-right">Total</td>
                <td class="text-right"><?= number_format($total) ?></td>
            </tr>
        </tbody>
    </table>

    <p class="text-center">Terima kasih sudah berbelanja!<br>~ Toko Maju Jaya ~</p>
</body>
</html>
