<?php
include './admin/config.php'; // เชื่อมต่อฐานข้อมูล
require './Header.php'; // เพิ่มส่วน navbar (ถ้ามี)

// ตรวจสอบว่ามีการส่ง id มาหรือไม่
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // ดึงข้อมูลสินค้าจากฐานข้อมูล
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // ดึงข้อมูลสินค้าออกมา
    } else {
        echo "ไม่พบสินค้าที่คุณต้องการ";
        exit();
    }
} else {
    echo "ไม่พบรหัสสินค้า";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>รายละเอียดสินค้า</h2>
        <div class="card mb-4">
            <img src="./admin/uploads/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['name'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $row['name'] ?></h5>
                <p class="card-text"><?= $row['description'] ?></p>
                <p class="card-text text-success"><?= number_format($row['price'], 2) ?> บาท</p>
                <a href="add_to_cart.php?id=<?= $row['id'] ?>" class="btn btn-success">เพิ่มในตะกร้า</a>
            </div>
        </div>
    </div>
</body>
</html>
