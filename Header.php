
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./css/styles.css" rel="stylesheet" />
        <style>

        .language-switcher {
            position: relative;
            cursor: pointer;
        }

        .language-icon {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .dropdown {
            position: absolute;
            top: 40px;
            right: 0;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            width: 120px;
            display: none;
            z-index: 10;
        }

        .dropdown.open {
            display: block;
        }

        .dropdown-item {
            padding: 10px;
            text-align: left;
            font-size: 16px;
            color: #333;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item:hover {
            background-color: #f0f4f8;
        }

        .dropdown-item.active {
            background-color: #e6f7ff;
            color: #007bff;
        }

        .dropdown-item.active::after {
            content: "✔";
            color: #007bff;
            font-weight: bold;
        }
    </style>
<main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html"><span class="fw-bolder text-primary">Start Bootstrap</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link" href="index2.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="product.php">product</a></li>
                            <li class="nav-item"><a class="nav-link" href="fromshop.php">shop</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="fromorder.php">order</a></li>
                            <li class="nav-item"><a class="nav-link" href="cart.php">cart</a></li>
         -->
                            <li class="nav-item"><a class="nav-link" href="./login.php">Login<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                              </svg>
                              </a></li>
                            <form class="d-flex">
                            
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cartModal">
    <i class="bi-cart-fill me-1"></i>
    Cart
    <span id="cart-count" class="badge bg-dark text-white ms-1 rounded-pill"></span>
</button>
                </form>
                <!-- <script>
    // ฟังก์ชันสำหรับเพิ่มสินค้าเข้าตะกร้า
    function addToCart(productId) {
        // ทำการส่งข้อมูลไปยัง PHP ผ่าน AJAX เพื่อเพิ่มสินค้าลงใน session
        fetch(`add_to_cart.php?id=${productId}`)
            .then(response => response.json())
            .then(data => {
                // อัปเดตจำนวนสินค้าในตะกร้า
                document.getElementById('cart-count').innerText = data.cartCount;
            });
    }

    // เมื่อหน้าเว็บโหลด ให้ดึงจำนวนสินค้าที่อยู่ในตะกร้า
    window.onload = function() {
        fetch('get_cart_count.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('cart-count').innerText = data.cartCount;
            });
    }
</script>
<?php
session_start();

$product_id = $_GET['id'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// $product_id = $_GET['id'];

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
} else {
    echo "ยังไม่ได้เข้าสู่ระบบ";
}


// คำนวณจำนวนสินค้าทั้งหมดในตะกร้า
$cartCount = array_sum($_SESSION['cart']);

// ส่งผลลัพธ์เป็น JSON กลับไปยัง JavaScript
echo json_encode(['cartCount' => $cartCount]);
?>
<?php
session_start();

$cartCount = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;

// ส่งผลลัพธ์เป็น JSON
echo json_encode(['cartCount' => $cartCount]);
?> -->

                      
                        &nbsp;&nbsp;&nbsp;   <div class="language-switcher">
        <div class="language-icon">🌐</div>
        <div class="dropdown">
            <div class="dropdown-item" data-lang="en">English</div>
            <div class="dropdown-item active" data-lang="th">ภาษาไทย</div>
        </div>
    </div>
    </ul>
                    </div>
                </div>
            </nav>
            <script>
        const languageSwitcher = document.querySelector('.language-switcher');
        const dropdown = document.querySelector('.dropdown');
        const items = document.querySelectorAll('.dropdown-item');

        languageSwitcher.addEventListener('click', () => {
            dropdown.classList.toggle('open');
        });

        items.forEach(item => {
            item.addEventListener('click', () => {
                // Remove active class from all items
                items.forEach(i => i.classList.remove('active'));
                
                // Mark the clicked item as active
                item.classList.add('active');
                
                // Optionally perform any action here when language changes
                const selectedLanguage = item.getAttribute('data-lang');
                alert(`Language switched to: ${selectedLanguage}`);
                
                // Close the dropdown
                dropdown.classList.remove('open');
            });
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', (event) => {
            if (!languageSwitcher.contains(event.target)) {
                dropdown.classList.remove('open');
            }
        });
    </script>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
