<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Basic styles */
        .container {
            margin-top: 50px;
        }
        .card img {
            max-height: 200px;
            object-fit: cover;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .product {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 30%;
            margin-bottom: 20px;
            text-align: center;
            padding: 15px;
        }
        .product img {
            max-width: 100%;
            height: auto;
        }
        /* Modal styles for resizing */
        .modal-dialog {
            max-width: 90vw;
            max-height: 90vh;
            overflow: auto;
        }
        .modal-content {
            resize: both;
            overflow: auto;
        }
    </style>
</head>
<body>
    <?php include './header.php'; ?>
    <?php include './admin/config.php'; ?>

    <div class="container">
        <h1>Product List</h1>
        <!-- Cart button -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cartModal">View Cart</button> -->

        <!-- Product list -->
        <div class="product-list" id="product-list">
            <?php
            $category = isset($_GET['category']) ? $_GET['category'] : '';
            $price_min = isset($_GET['price_min']) ? (int)$_GET['price_min'] : 0;
            $price_max = isset($_GET['price_max']) ? (int)$_GET['price_max'] : 999999;
            $brand = isset($_GET['brand']) ? $_GET['brand'] : '';
            $popularity = isset($_GET['popularity']) ? $_GET['popularity'] : '';
            $query = "SELECT * FROM products WHERE 1=1";
            if (!empty($category)) $query .= " AND category = '$category'";
            if (!empty($brand)) $query .= " AND brand = '$brand'";
            if (!empty($price_min) || !empty($price_max)) $query .= " AND price BETWEEN $price_min AND $price_max";
            if (!empty($popularity)) $query .= " ORDER BY ratings " . ($popularity == 'asc' ? 'ASC' : 'DESC');
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product">';
                    echo '<img src="./admin/uploads/' . $row['image'] . '" alt="' . $row['name'] . '">';
                    echo '<h2>' . $row['name'] . '</h2>';
                    echo '<h3>' . $row['price'] . ' THB</h3>';
                    echo '<h4> ' . $row['stock'] . '</h4>';
                    echo '<p>' . $row['description'] . '</p>';

            
                    echo '<br>';
                    echo '<button class="btn btn-success add-to-cart" data-id="' . $row['id'] . '" data-name="' . $row['name'] . '" data-price="' . $row['price'] . '">Add to Cart</button>';
                    echo '<br>';
                    echo '</div>';
                }
            } else {
                echo '<p>No products found</p>';
            }
            ?>
        </div>
    </div>

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group" id="cartItems">
                        <!-- Cart items will be dynamically inserted here -->
                    </ul>
                </div>
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="fromshop.php" class="btn btn-primary">Checkout</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const cartItems = [];

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const price = this.getAttribute('data-price');
            const item = { id: id, name: name, price: price };

            // Check if the item already exists in the cart
            const existingItemIndex = cartItems.findIndex(cartItem => cartItem.id === id);
            if (existingItemIndex >= 0) {
                // Optionally update quantity here if needed
            } else {
                cartItems.push(item);
            }
            updateCartModal();
        });
    });

    function updateCartModal() {
        const cartList = document.getElementById('cartItems');
        cartList.innerHTML = '';
        cartItems.forEach(item => {
            const listItem = document.createElement('li');
            listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
            listItem.innerHTML = `
                ${item.name} - ${item.price} THB
                <button type="button" class="btn btn-danger btn-sm ms-2 remove-from-cart" data-id="${item.id}">Remove</button>
            `;
            cartList.appendChild(listItem);
        });
        addRemoveListeners();
    }

    function addRemoveListeners() {
        document.querySelectorAll('.remove-from-cart').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const itemIndex = cartItems.findIndex(item => item.id === id);
                if (itemIndex >= 0) {
                    cartItems.splice(itemIndex, 1);
                    updateCartModal();
                }
            });
        });
    }

    document.querySelector('.btn-primary').addEventListener('click', function() {
        // Prepare cart items for submission
        const cartData = JSON.stringify(cartItems);
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'fromshop.php'; // Update with correct action URL

        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'cart_items';
        input.value = cartData;
        form.appendChild(input);

        document.body.appendChild(form);
        form.submit();
    });
});
</script>

    <?php include './footer.php'; ?>
</body>
</html>
