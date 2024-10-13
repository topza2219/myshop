<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="action-buttons">
    <a href="show_product_detail.php?id=<?= $row['id'] ?>" class="btn btn-primary">ดูรายละเอียด</a>
    <input type="number" id="quantity-<?= $row['id'] ?>" min="1" value="1" required>
    <button type="button" class="btn btn-success" onclick="addToCart(<?= $row['id'] ?>)">เพิ่มในตะกร้า</button>
</div>
<script>
function addToCart(productId) {
    var quantity = document.getElementById('quantity-' + productId).value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'add_to_cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                alert('เพิ่มสินค้าลงในตะกร้าเรียบร้อยแล้ว!');
                // อัปเดตจำนวนสินค้าในตะกร้า (ถ้ามี)
                updateCartCount(response.cart_count);
            } else {
                alert('เกิดข้อผิดพลาด: ' + response.message);
            }
        }
    };

    xhr.send('product_id=' + productId + '&quantity=' + quantity);
}

function updateCartCount(count) {
    document.getElementById('cart-count').innerText = count;
}
</script>
<?php
session_start();

// ตั้งค่า header สำหรับ JSON response
header('Content-Type: application/json');

// ตรวจสอบว่ามีการส่งข้อมูลมาหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // เชื่อมต่อฐานข้อมูล
    include 'config.php'; // แก้ไขตามตำแหน่งไฟล์ของคุณ

    // รับค่าจากฟอร์มและป้องกัน SQL Injection
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    // ตรวจสอบข้อมูลสินค้าในฐานข้อมูล
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

        // เพิ่มสินค้าในตะกร้า (Session)
        $cart_item = array(
            'product_id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $quantity
        );

        // ตรวจสอบว่ามีตะกร้าสินค้าอยู่หรือไม่
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // เพิ่มหรืออัปเดตสินค้าที่มีอยู่แล้วในตะกร้า
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['product_id'] == $product_id) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $_SESSION['cart'][] = $cart_item;
        }

        // คำนวณจำนวนสินค้าทั้งหมดในตะกร้า
        $cart_count = 0;
        foreach ($_SESSION['cart'] as $item) {
            $cart_count += $item['quantity'];
        }

        // ส่งการตอบกลับไปยัง JavaScript
        echo json_encode(array('success' => true, 'cart_count' => $cart_count));
    } else {
        // สินค้าไม่พบในฐานข้อมูล
        echo json_encode(array('success' => false, 'message' => 'ไม่พบสินค้า'));
    }
} else {
    // วิธีการไม่ถูกต้อง
    echo json_encode(array('success' => false, 'message' => 'วิธีการร้องขอไม่ถูกต้อง'));
}
?>



</body>
</html>