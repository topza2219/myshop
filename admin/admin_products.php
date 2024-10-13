<?php
include './config.php'; // เชื่อมต่อฐานข้อมูล
require './navbar.php'; // นำเข้าหน้านำทาง (ถ้ามี)

// ดึงข้อมูลสินค้าจากฐานข้อมูล
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>รายการสินค้า</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>รายละเอียด</th>
                    <th>ราคา</th>
                    <th>รูปภาพ</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    // แสดงข้อมูลในแต่ละแถว
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td><img src='uploads/" . $row['image'] . "' width='100'></td>";
                        echo "<td>";
                        echo "<a href='delete_product.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"คุณต้องการลบสินค้านี้ใช่หรือไม่?\")'>ลบ</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>ไม่มีสินค้า</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>