<?php
include './admin/config.php'; // เชื่อมต่อฐานข้อมูล
include './Header.php';

// ดึงข้อมูลสินค้าทั้งหมดจากตาราง products
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
    <style>
        .container {
            margin-top: 5ฤ0px;
        }
        .card img {
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>รายการสินค้า</h2>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="./admin/uploads/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['name'] ?></h5>
                            <p class="card-text"><?= $row['description'] ?></p>
                            <p class="card-text text-success"><?= number_format($row['price'], 2) ?> บาท</p>
                            <a href="show_product_detail.php?id=<?= $row['id'] ?>" class="btn btn-primary">ดูรายละเอียด</a>
                            <form action="add_to_cart.php" method="POST">
    <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
    <input type="number" name="quantity" min="1" value="1" required>
    <button type="submit" class="btn btn-success">เพิ่มในตะกร้า</button>
</form>
                                    <!-- <script>
    // ฟังก์ชันสำหรับเพิ่มสินค้าเข้าตะกร้า
    function addToCart(productId) {
        // ทำการส่งข้อมูลไปยัง PHP ผ่าน AJAX เพื่อเพิ่มสินค้าลงใน session
        fetch(`add_to_cart.php?id=${productId}`)
            .then(response => response.json())
            .then(data => {
                // อัปเดตจำนวนสินค้าในตะกร้า
                document.getElementById('cart-count').innerText = data.cartCount;
            });
    }

    // เมื่อหน้าเว็บโหลด ให้ดึงจำนวนสินค้าที่อยู่ในตะกร้า
    window.onload = function() {
        fetch('get_cart_count.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('cart-count').innerText = data.cartCount;
            });
    }
</script>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
