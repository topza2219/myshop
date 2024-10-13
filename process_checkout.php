<?php
include './admin/config.php'; // เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $cart_items = json_decode($_POST['cart_items'], true); // แปลงข้อมูลสินค้าในตะกร้า

    // เพิ่มข้อมูลคำสั่งซื้อในตาราง orders
    $query = "INSERT INTO orders (fullname, address, phone, email) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $fullname, $address, $phone, $email);
    $stmt->execute();
    $order_id = $stmt->insert_id; // ดึงรหัสคำสั่งซื้อที่เพิ่มเข้าไป

    // เพิ่มข้อมูลสินค้าในตะกร้าในตาราง order_items
    foreach ($cart_items as $item) {
        $product_id = $item['id'];
        $price = $item['price'];
        $query_item = "INSERT INTO order_items (order_id, product_id, price) VALUES (?, ?, ?)";
        $stmt_item = $conn->prepare($query_item);
        $stmt_item->bind_param("iid", $order_id, $product_id, $price);
        $stmt_item->execute();
    }

    // Redirect ไปหน้าแสดงผลหลังจากคำสั่งซื้อสำเร็จ
    header("Location: order_success.php?order_id=" . $order_id);
    exit();
}
?>
