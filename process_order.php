<?php
session_start();

// เชื่อมต่อฐานข้อมูล
include './admin/config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าข้อมูลจากฟอร์ม
$customer_name = $_POST['customer_name'];
$customer_email = $_POST['customer_email'];
$customer_address = $_POST['customer_address'];
$customer_phone = $_POST['customer_phone'];
$payment_method = $_POST['payment_method'];

// ลูปรายการสินค้าที่ลูกค้าเลือกไว้ใน session
foreach ($_SESSION['cart'] as $cart_item) {
    $product_name = $cart_item['product_name'];
    $quantity = $cart_item['product_quantity'];
    $price = $cart_item['product_price'];
    $total_price = $quantity * $price;

    // บันทึกคำสั่งซื้อแต่ละรายการลงในฐานข้อมูล
    $sql = "INSERT INTO orders1 (customer_name, customer_email, customer_address, customer_phone, product_name, quantity, price, total_price, payment_method, order_date)
            VALUES ('$customer_name', '$customer_email', '$customer_address', '$customer_phone', '$product_name', $quantity, $price, $total_price, '$payment_method', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Order for $product_name placed successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// ล้างตะกร้าหลังจากการสั่งซื้อเสร็จสิ้น
unset($_SESSION['cart']);

$conn->close();
?>
