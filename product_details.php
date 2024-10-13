<?php
include './admin/config.php'; // เชื่อมต่อฐานข้อมูล
require './Header.php'; // เพิ่มส่วน navbar (ถ้ามี)

// ตรวจสอบว่ามีการส่ง id มาหรือไม่
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // ดึงข้อมูลสินค้าจากฐานข้อมูล
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // ดึงข้อมูลสินค้าออกมา
    } else {
        echo "<div class='container mt-5'><h3>ไม่พบสินค้าที่คุณต้องการ</h3></div>";
        exit();
    }
} else {
    echo "<div class='container mt-5'><h3>ไม่พบรหัสสินค้า</h3></div>";
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
            <img src="./admin/uploads/<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['name']) ?>">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
                <p class="card-text text-success"><?= number_format($row['price'], 2) ?> บาท</p>

                <!-- Form for adding product to cart -->
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($row['id']) ?>">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">จำนวน:</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" required>
                    </div>
                    <form action="add_to_cart.php" method="POST">
            <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
            <input type="number" name="quantity" min="1" value="1" required>
            <button type="submit" class="btn btn-success">เพิ่มในตะกร้า</button>   
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
