<?php
session_start();
include 'config.php'; // เชื่อมต่อฐานข้อมูล
require 'navbar.php';
$sql = "SELECT orders.id, customers.name, customers.email, customers.phone, customers.address, 
               orders.product_name, orders.quantity, orders.total_price, orders.order_date 
        FROM orders
        INNER JOIN customers ON orders.customer_id = customers.id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำสั่งซื้อของลูกค้า (Admin)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>คำสั่งซื้อของลูกค้า</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ชื่อ</th>
                    <th>อีเมล</th>
                    <th>เบอร์โทร</th>
                    <th>ที่อยู่</th>
                    <th>สินค้า</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                    <th>วันที่สั่งซื้อ</th>
                </tr>
            </thead>
            <tbody>
                <!-- แสดงข้อมูลจากฐานข้อมูล -->
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']); ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= htmlspecialchars($row['phone']); ?></td>
                    <td><?= htmlspecialchars($row['address']); ?></td>
                    <td><?= htmlspecialchars($row['product_name']); ?></td>
                    <td><?= htmlspecialchars($row['quantity']); ?></td>
                    <td><?= number_format($row['total_price'], 2); ?> บาท</td>
                    <td><?= date('d/m/Y H:i:s', strtotime($row['order_date'])); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
