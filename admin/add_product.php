<?php
include './config.php'; // เชื่อมต่อฐานข้อมูล
require './navbar.php';

// ตรวจสอบว่ามีการส่งข้อมูล POST มาหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']); // Add discount field

    // จัดการกับไฟล์อัปโหลด
    $image = $_FILES['image']['name'];
    $target_dir = "uploads";
    $target_file = $target_dir . basename($image);

    // อัปโหลดไฟล์ไปที่โฟลเดอร์ "uploads"
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // บันทึกข้อมูลลงฐานข้อมูล
        $sql = "INSERT INTO products (name, description, price, stock, image) 
                VALUES ('$name', '$description', '$price', '$stock', '$image')";
        if (mysqli_query($conn, $sql)) {
            echo "เพิ่มสินค้าสำเร็จ!";
        } else {
            echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
        }
    } else {
        echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>เพิ่มสินค้าใหม่</h2>
        <form action="add_product.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">ชื่อสินค้า</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">รายละเอียดสินค้า</label>
                <textarea name="description" class="form-control" id="description" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">ราคา</label>
                <input type="number" step="0.01" name="price" class="form-control" id="price" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">เหลือสินค้า</label>
                <input type="number" step="0.01" name="stock" class="form-control" id="stock" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">รูปภาพสินค้า</label>
                <input type="file" name="image" class="form-control" id="image" required>
            </div>
            <button type="submit" class="btn btn-primary">เพิ่มสินค้า</button>
        </form>
    </div>
</body>
</html>
