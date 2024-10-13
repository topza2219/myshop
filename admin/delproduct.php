<?php
include './config.php'; // เชื่อมต่อฐานข้อมูล

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // ค้นหาข้อมูลสินค้าที่ต้องการลบ เพื่อลบรูปภาพในโฟลเดอร์ด้วย
    $sql = "SELECT image FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image_path = './uploads/' . $row['image'];

        // ตรวจสอบและลบรูปภาพจากโฟลเดอร์
        if (!empty($row['image']) && file_exists($image_path)) {
            if (unlink($image_path)) {
                echo "ลบรูปภาพสำเร็จ!";
            } else {
                echo "ไม่สามารถลบรูปภาพได้.";
            }
        } else {
            echo "ไม่พบรูปภาพหรือรูปภาพไม่สามารถลบได้.";
        }

        // ลบข้อมูลสินค้าในฐานข้อมูล
        $sql = "DELETE FROM products WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "ลบสินค้าสำเร็จ!";
            // กลับไปยังหน้าแสดงรายการสินค้า
            header("Location: admin_products.php");
            exit();
        } else {
            echo "เกิดข้อผิดพลาดในการลบสินค้า: " . mysqli_error($conn);
        }
    } else {
        echo "ไม่พบสินค้าที่ต้องการลบ";
    }
} else {
    echo "ไม่พบรหัสสินค้า";
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>
