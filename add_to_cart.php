<?php
session_start(); // เริ่มต้นเซสชัน

// ตรวจสอบว่ามีข้อมูลที่ส่งมาหรือไม่
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // ตรวจสอบว่าตะกร้าอยู่ในเซสชันหรือไม่
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // ตรวจสอบว่ามีสินค้านี้ในตะกร้าแล้วหรือไม่
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $id) {
            $found = true;
            break;
        }
    }

    if (!$found) {
        // เพิ่มสินค้าลงในตะกร้า
        $_SESSION['cart'][] = [
            'id' => $id,
            'name' => $name,
            'price' => $price
        ];
    }

    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cartItems = [];

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const price = this.getAttribute('data-price');

            // ส่งข้อมูลไปยัง add_to_cart.php
            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    'id': id,
                    'name': name,
                    'price': price
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // เพิ่มสินค้าลงในตะกร้า
                    const item = { id: id, name: name, price: price };
                    // Check if the item already exists in the cart
                    const existingItemIndex = cartItems.findIndex(cartItem => cartItem.id === id);
                    if (existingItemIndex < 0) {
                        cartItems.push(item);
                    }
                    updateCartModal();
                } else {
                    console.error('Failed to add item to cart:', data.message);
                }
            })
            .catch(error => console.error('Error:', error));
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
});
</script>
