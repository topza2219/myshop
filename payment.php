<?php
session_start();
include './Header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงิน</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="file"], input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ชำระเงิน</h2>
        <form action="process_payment.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>ชื่อธนาคารที่ชำระ:</label>
                <input type="text" name="bank_name" required>
            </div>
            <div class="form-group">
                <label>ยอดเงินที่ชำระ:</label>
                <input type="number" name="payment_amount" step="0.01" value="<?php echo isset($_POST['total_price']) ? $_POST['total_price'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>อัพโหลดสลิปการโอนเงิน:</label>
                <input type="file" name="payment_slip" required>
            </div>
            <button type="submit">ยืนยันการชำระเงิน</button>
        </form>
    </div>
</body>
</html>
