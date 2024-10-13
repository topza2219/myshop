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
                    <button type="button" class="btn btn-primary">Checkout</button>
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
                        // Update quantity or handle as needed
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
        });
    </script>
