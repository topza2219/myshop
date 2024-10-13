<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<style>
.add-to-cart {
    background-color: #ff5722;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

#cart-count {
    background-color: #f5f5f5;
    padding: 10px;
    margin-top: 20px;
    border-radius: 5px;
    text-align: right;
}


</style>
<!-- ตัวอย่างสินค้าที่จะแสดง -->
<div class="product">
    <h3>ชื่อสินค้า</h3>
    <p>ราคาสินค้า: 100 บาท</p>
    <input type="hidden" id="product_id" value="1">
    <button class="add-to-cart" data-id="1" data-name="ชื่อสินค้า" data-price="100">เพิ่มลงในรถเข็น</button>
</div>

<!-- แสดงจำนวนสินค้าในรถเข็น -->
<div id="cart-count">
    สินค้าในรถเข็น: <span id="cart-total">0</span> ชิ้น
</div>

<script>

document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        let productId = this.getAttribute('data-id');
        let productName = this.getAttribute('data-name');
        let productPrice = this.getAttribute('data-price');

        // ส่งข้อมูลสินค้าไปยัง server เพื่อเพิ่มสินค้าในรถเข็น
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_to_cart.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (this.status == 200) {
                // อัพเดตจำนวนสินค้าในรถเข็นหลังจากเพิ่มสินค้าแล้ว
                document.getElementById('cart-total').innerText = this.responseText;
            }
        };
        xhr.send('id=' + productId + '&name=' + productName + '&price=' + productPrice);
    });
});

</script>




</body>
</html>

<?php
session_start();

// ตรวจสอบว่ามีการส่งข้อมูลสินค้ามาหรือไม่
if (isset($_POST['id'])) {
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];

    // ตรวจสอบว่ามีสินค้าภายใน session รถเข็นหรือไม่
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // ตรวจสอบว่าสินค้าในรถเข็นมีอยู่แล้วหรือไม่
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += 1; // เพิ่มจำนวนสินค้า
    } else {
        // เพิ่มสินค้าใหม่ในรถเข็น
        $_SESSION['cart'][$productId] = [
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => 1
        ];
    }

    // นับจำนวนสินค้าทั้งหมดในรถเข็น
    $totalItems = 0;
    foreach ($_SESSION['cart'] as $item) {
        $totalItems += $item['quantity'];
    }

    // ส่งจำนวนสินค้ากลับไปที่ client
    echo $totalItems;
}
?>

