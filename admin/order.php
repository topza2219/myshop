<?php require './navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Order Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Order Management</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Address</th>
                    <th scope="col">Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
              include './config.php';
                $sql = "SELECT * FROM orders";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row["id"]."</td>
                                <td>".$row["product_name"]."</td>
                                <td>".$row["quantity"]."</td>
                                <td>".$row["price"]."</td>
                                <td>".$row["customer_name"]."</td>
                                <td>".$row["customer_address"]."</td>
                                <td>".$row["order_date"]."</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No orders found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
