<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
    <?php 
    include     '.././Header.php';
    ?>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
   
                            <section class="py-5">
                                <div class="container px-4 px-lg-5 mt-5">
                                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                                        
                                        <?php
                                        include '../admin/config.php';
                            
                                        // ดึงค่าที่ลูกค้าเลือกจากฟิลเตอร์
                                        $category = isset($_GET['category']) ? $_GET['category'] : '';
                                        $price_min = isset($_GET['price_min']) ? (int)$_GET['price_min'] : 0;
                                        $price_max = isset($_GET['price_max']) ? (int)$_GET['price_max'] : 999999;
                                        $brand = isset($_GET['brand']) ? $_GET['brand'] : '';
                                        $popularity = isset($_GET['popularity']) ? $_GET['popularity'] : '';
                            
                                        // สร้าง SQL query ตามฟิลเตอร์ที่เลือก
                                        $query = "SELECT * FROM products WHERE 1=1";
                            
                                        if (!empty($category)) {
                                            $query .= " AND category = '$category'";
                                        }
                                        if (!empty($brand)) {
                                            $query .= " AND brand = '$brand'";
                                        }
                                        if (!empty($price_min) || !empty($price_max)) {
                                            $query .= " AND price BETWEEN $price_min AND $price_max";
                                        }
                                        if (!empty($popularity)) {
                                            $query .= " ORDER BY popularity " . ($popularity == 'asc' ? 'ASC' : 'DESC');
                                        }
                            
                                        $result = mysqli_query($conn, $query);
                            
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<div class="col mb-5">';
                                                echo '<div class="card h-100">';
                                                // แสดงภาพสินค้า
                                                echo '<img class="card-img-top" src="uploads/' . $row['image'] . '" alt="' . $row['name'] . '" />';
                                                echo '<div class="card-body p-4">';
                                                echo '<div class="text-center">';
                                                // แสดงชื่อสินค้า
                                                echo '<h5 class="fw-bolder">' . $row['name'] . '</h5>';
                                                // แสดงราคาสินค้า
                                                echo '<p>' . $row['price'] . ' THB</p>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">';
                                                echo '<div class="text-center">';
                                                // ปุ่มดูรายละเอียดสินค้า
                                                echo '<a class="btn btn-outline-dark mt-auto" href="product.php?id=' . $row['id'] . '">View Details</a>';
                                                // ปุ่มเพิ่มในตะกร้า
                                                echo '<a class="btn btn-outline-dark mt-auto" href="add_to_cart.php?id=' . $row['id'] . '">Add to Cart</a>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        } else {
                                            echo '<p>No products found</p>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </section>
                            
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
