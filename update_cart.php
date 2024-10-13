<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantity'])) {
    foreach ($_POST['quantity'] as $key => $quantity) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$key]); // Remove item if quantity is zero or negative
        } else {
            $_SESSION['cart'][$key]['product_quantity'] = $quantity; // Update quantity
        }
    }

    // Reindex array to avoid issues with array keys
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

header('Location: shopping_cart.php');
exit();
?>
