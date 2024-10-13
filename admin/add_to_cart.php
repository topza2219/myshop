<?php
include './config.php'; // เชื่อมต่อฐานข้อมูล
require './navbar.php';
// ตรวจสอบว่ามีการส่งข้อมูล POST มาหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']); // สมมติว่ามีการระบุ user_id

    // ตรวจสอบว่ามีสินค้านี้อยู่ในตะกร้าของผู้ใช้หรือไม่
    $sql_check = "SELECT * FROM cart WHERE product_id = '$product_id' AND user_id = '$user_id'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        // อัพเดตปริมาณของสินค้าในตะกร้า
        $sql_update = "UPDATE cart SET quantity = quantity + '$quantity' WHERE product_id = '$product_id' AND user_id = '$user_id'";
        if (mysqli_query($conn, $sql_update)) {
            echo "อัพเดตจำนวนสินค้าสำเร็จ!";
        } else {
            echo "เกิดข้อผิดพลาดในการอัพเดตตะกร้า: " . mysqli_error($conn);
        }
    } else {
        // เพิ่มสินค้าลงในตะกร้า
        $sql_insert = "INSERT INTO cart (product_id, quantity, user_id) VALUES ('$product_id', '$quantity', '$user_id')";
        if (mysqli_query($conn, $sql_insert)) {
            echo "เพิ่มสินค้าลงในตะกร้าสำเร็จ!";
        } else {
            echo "เกิดข้อผิดพลาดในการเพิ่มสินค้าลงในตะกร้า: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้าลงในตะกร้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>เพิ่มสินค้าลงในตะกร้า</h2>
        <form action="add_to_cart.php" method="POST">
            <div class="mb-3">
                <label for="product_id" class="form-label">รหัสสินค้า</label>
                <input type="text" name="product_id" class="form-control" id="product_id" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">จำนวน</label>
                <input type="number" name="quantity" class="form-control" id="quantity" required>
            </div>
            <input type="hidden" name="user_id" value="1"> <!-- แทนที่ด้วย ID ของผู้ใช้ปัจจุบัน -->
            <button type="submit" class="btn btn-primary">เพิ่มลงในตะกร้า</button>
        </form>
    </div>
</body>
</html>
