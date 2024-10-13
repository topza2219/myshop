<?php
session_start();
include './Header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สั่งซื้อสินค้า</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2, h3 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        td {
            background-color: #fff;
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        .total-price {
            text-align: right;
            padding: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"], input[type="email"], input[type="number"], textarea {
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
        }

        button:hover {
            background-color: #45a049;
        }

        .button-group {
            text-align: center;
            margin-top: 20px;
        }
        #qrcodeImage {
            display: none; /* Hide QR code image by default */
        }
    </style>
</head>
<body>
<?php
$cart_items = isset($_POST['cart_items']) ? json_decode($_POST['cart_items'], true) : [];
$total_price = 0;
foreach ($cart_items as $item) {
    $total_price += $item['price'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Your existing CSS styles */
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Shopping Cart Details</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price (THB)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($cart_items)): ?>
                    <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']); ?></td>
                        <td><?= htmlspecialchars($item['price']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">No items in cart</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <form action="order.php" method="POST">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" required class="form-control">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required class="form-control">
            </div>
            <div class="form-group">
                <label>Phone:</label>
                <input type="text" name="phone" required class="form-control">
            </div>
            <div class="form-group">
                <label>Address:</label>
                <textarea name="address" required class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>ราคาทั้งหมด</label>
                <input type="text" name="total_price" value="<?php echo number_format($total_price, 2); ?> THB" readonly class="form-control">
                <input type="hidden" name="total_price_value" value="<?php echo $total_price; ?>">
            </div>
            <div class="form-group">
                <label>Payment Method:</label>
                <div>
                    <input type="radio" name="payment_method" value="cod" required> Cash on Delivery (COD)
                    <input type="radio" name="payment_method" value="qrcode" required> QR Code Payment
                </div>
            </div>
            <div id="qrcodeImage">
                <img src="admin/uploads/qr-code.jpg" alt="QR Code" class="img-fluid">
            </div>
            <button type="submit" class="btn btn-primary">Confirm Order</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const qrcodeImage = document.getElementById('qrcodeImage');
            
            document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'qrcode') {
                        qrcodeImage.style.display = 'block'; // Show QR code image
                    } else {
                        qrcodeImage.style.display = 'none'; // Hide QR code image
                    }
                });
            });
        });
    </script>
</body>
</html>
  




