<?php
include './admin/config.php'; // เชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
    $payment_amount = (float)$_POST['payment_amount'];
    $upload_dir = './admin/uploads/payment_slips/';
    $slip_file = $_FILES['payment_slip'];

    // ตรวจสอบการอัพโหลดไฟล์
    if ($slip_file['error'] === 0) {
        $file_name = uniqid() . "_" . basename($slip_file['name']);
        $file_path = $upload_dir . $file_name;

        // อัพโหลดไฟล์
        if (move_uploaded_file($slip_file['tmp_name'], $file_path)) {
            // บันทึกข้อมูลการชำระเงินในฐานข้อมูล
            $sql = "INSERT INTO payments (bank_name, payment_amount, payment_slip) 
                    VALUES ('$bank_name', '$payment_amount', '$file_name')";
            if (mysqli_query($conn, $sql)) {
                echo "บันทึกการชำระเงินสำเร็จ!";
                // อาจเปลี่ยนสถานะคำสั่งซื้อเป็น "ชำระเงินแล้ว"
                // header("Location: order_summary.php");
            } else {
                echo "เกิดข้อผิดพลาดในการบันทึกข้อมูลการชำระเงิน: " . mysqli_error($conn);
            }
        } else {
            echo "เกิดข้อผิดพลาดในการอัพโหลดไฟล์";
        }
    } else {
        echo "เกิดข้อผิดพลาดในการอัพโหลดสลิป";
    }
}


?>
