<?php
session_start();
include './admin/config.php'; // Ensure this is the correct path to your config file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $total_price = (float)$_POST['total_price'];
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);

    // Insert customer data
    $sql_customer = "INSERT INTO customers (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
    if (mysqli_query($conn, $sql_customer)) {
        $customer_id = mysqli_insert_id($conn);

        // Insert order data
        $sql_order = "INSERT INTO orders (customer_id, total_price, payment_method) VALUES ('$customer_id', '$total_price', '$payment_method')";
        if (mysqli_query($conn, $sql_order)) {
            $order_id = mysqli_insert_id($conn);

            // Insert order details
            if (isset($_SESSION['order']) && !empty($_SESSION['order'])) {
                foreach ($_SESSION['order'] as $item) {
                    $product_id = mysqli_real_escape_string($conn, $item['id']);
                    $quantity = mysqli_real_escape_string($conn, $item['quantity']);
                    $price = mysqli_real_escape_string($conn, $item['price']);
                    $sql_order_details = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$price')";
                    mysqli_query($conn, $sql_order_details);
                }
                // Clear cart after successful order
                unset($_SESSION['order']);
            }

            echo "<p>Order placed successfully!</p>";
        } else {
            echo "Error saving order: " . mysqli_error($conn);
        }
    } else {
        echo "Error saving customer data: " . mysqli_error($conn);
    }
}
?>
