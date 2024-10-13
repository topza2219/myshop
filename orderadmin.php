<!-- order_success.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Order Successful</h1>
        <p>Thank you for your order! Your order number is <?php echo htmlspecialchars(@$_GET['order_id']); ?>.</p>
    </div>
</body>
</html>
