<?php
session_start();
include './Header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Shopping Cart</h2>
        <div class="row">
            <?php
            if (isset($_SESSION['order_items']) && !empty($_SESSION['cart2'])) {
                echo '<div class="col-md-12">';
                echo '<form action="update_cart.php" method="POST">';
                echo '<table class="table table-bordered">';
                echo '<thead><tr><th>Product Name</th><th>Quantity</th><th>Price</th><th>Actions</th></tr></thead>';
                echo '<tbody>';

                foreach ($_SESSION['order_items'] as $key => $item) {
                    $product_name = isset($item['product_name']) ? $item['product_name'] : 'Not specified';
                    $quantity = isset($item['product_quantity']) ? $item['product_quantity'] : 0;
                    $price = isset($item['product_price']) ? $item['product_price'] : 0;

                    echo "<tr>";
                    echo "<td>$product_name</td>";
                    echo "<td>
                            <input type='number' name='quantity[$key]' value='$quantity' min='1' class='form-control' style='width: 100px;'>
                          </td>";
                    echo "<td>฿" . number_format($price, 2) . "</td>";
                    echo "<td>
                            <a href='remove_from_cart.php?key=$key' class='btn btn-danger btn-sm'>Remove</a>
                          </td>";
                    echo "</tr>";
                }

                echo '</tbody>';
                echo '</table>';
                echo '<button type="submit" class="btn btn-primary">Update Cart</button>';
                echo '</form>';
                echo '</div>';
            } else {
                echo '<p class="text-center">Your cart is empty.</p>';
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
