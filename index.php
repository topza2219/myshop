<?php
include './admin/config.php'; // เชื่อมต่อฐานข้อมูล

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
                        <img src="uploads/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['name'] ?></h5>
                            <p class="card-text"><?= $row['description'] ?></p>
                            <p class="card-text text-success"><?= number_format($row['price'], 2) ?> บาท</p>
                            <a href="show_product_detail.php?id=<?= $row['id'] ?>" class="btn btn-primary">ดูรายละเอียด</a>
                            <a href="add_to_cart.php?id=<?= $row['id'] ?>" class="btn btn-success">เพิ่มในตะกร้า</a>

                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
