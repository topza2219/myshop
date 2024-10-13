<?php

// เริ่มการใช้งาน session
session_start();

// ตรวจสอบว่ามีการส่งข้อมูล POST มาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // เชื่อมต่อฐานข้อมูล
    include './admin/config.php'; // ไฟล์สำหรับเชื่อมต่อฐานข้อมูล

    // รับข้อมูลจากฟอร์ม
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // ตรวจสอบว่ามีข้อมูลที่ว่างเปล่าหรือไม่
    if (empty($email) || empty($password)) {
        $error = "กรุณากรอกอีเมลและรหัสผ่าน";
    } else {
        // Query เพื่อตรวจสอบข้อมูลผู้ใช้
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        
        // ตรวจสอบว่าพบผู้ใช้หรือไม่
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
            // ตรวจสอบรหัสผ่าน
            if ( $row['password'] ==  $password ) {
                // รหัสผ่านถูกต้อง ตั้งค่า session และนำผู้ใช้ไปยังหน้าอื่น
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                header("Location: index2.php");
                exit();
            } else {
                $error = "รหัสผ่านไม่ถูกต้อง";
            }
        } else {
            $error = "ไม่พบอีเมลนี้ในระบบ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- ใช้ไฟล์ CSS เพิ่มเติม -->

    <style>
        body {
            background: #81d4fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }

        .card {
            width: 400px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: back;
            color: #81d4fa;
            text-align: center;
            border-radius: 10px 10px 0px 0px;
            padding: 15px;
            font-size: 24px;
            font-weight: bold;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
        }

        .form-label {
            font-weight: bold;
        }

        .alert {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            เข้าสู่ระบบ
        </div>
        <div class="card-body">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="กรอกอีเมล" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="กรอกรหัสผ่าน" required>
                </div>
                <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>

                <div class="container signin">
                <p>Already have an account? <a href="fromregister.php">Sign in</a>.</p>
            </div>
            </form>
        </div>
    </div>
</body>
</html>
