<?php 
session_start();
include './header.php'; // Ensure the correct path to your header file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2, h3 {
            color: #343a40;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #dee2e6;
            border-radius: 4px;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #e9ecef;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        .total-price {
            font-weight: bold;
            text-align: right;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #495057;
        }

        input[type="text"], input[type="email"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .button-group {
            text-align: center;
            margin-top: 20px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-group input[type="radio"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order Form</h2>

        <!-- Display cart items -->
        <h3>Selected Items</h3>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price (THB)</th>
            </tr>
            <?php
            $total_price = 0;
            if (isset($_SESSION['order'])) {
                foreach ($_SESSION['order'] as $item) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($item['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($item['quantity']) . "</td>";
                    echo "<td>฿" . number_format($item['price'], 2) . "</td>";
                    echo "</tr>";
                    $total_price += $item['price'] * $item['quantity'];
                }
            } else {
                echo "<tr><td colspan='3'>No items in cart</td></tr>";
            }
            ?>
            <tr>
                <td colspan="2" class="total-price"><strong>Total Price:</strong></td>
                <td><strong>฿<?php echo number_format($total_price, 2); ?></strong></td>
            </tr>
        </table>

        <h2>Customer Information</h2>
        <form action="order.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="total_price">Total Price:</label>
                <input type="hidden" id="total_price" name="total_price" value="<?php echo $total_price; ?>">
                <strong>฿<?php echo number_format($total_price, 2); ?></strong>
            </div>
            <div class="form-group">
                <label>Payment Method:</label>
                <input type="radio" id="cod" name="payment_method" value="cod" required>
                <label for="cod">Cash on Delivery (COD)</label>
                <br>
                <input type="radio" id="qrcode" name="payment_method" value="qrcode" required>
                <label for="qrcode">QR Code Payment</label>
            </div>
            <div class="button-group">
                <button type="submit">Confirm Order</button>
            </div>
        </form>
    </div>

    <!-- Optional: Include Bootstrap JS for further enhancements -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
  
<?php if (isset($_POST['payment_method']) && $_POST['payment_method'] == 'qrcode'): ?>
            <div class="qr-code">
                <?php
                // Generate a payment URL or QR code for the payment method
                $payment_url = generate_qr_code_url($total_price); // Implement this function as needed
                echo '<img src="' . $payment_url . '" alt="QR Code for Payment">';
                ?>
                <p>Scan the QR code to complete your payment.</p>
            </div>
        <?php endif; ?>
    </div>

    <?php
    function generate_qr_code_url($amount) {
        // Replace with actual implementation for generating QR code URL
        $api_url = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Payment%20Amount%3A%20" . urlencode($amount) . "THB";
        return $api_url;
    }
    ?>

