<?php include './admin/config.php';
  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Personal - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #e1e8f0;
}

.product-card {
    flex-wrap: wrap;
    gap: 20px;
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 300px;
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: translateY(-10px);
}

.product-card img {
    max-width: 100%;
    border-radius: 10px;
    margin-top: 15px;
    transition: transform 0.3s ease;
}

.product-card:hover img {
    transform: scale(1.05);
}

.product-title {
    font-size: 18px;
    font-weight: bold;
    margin: 15px 0 5px;
    color: #333;
}

.product-price {
    font-size: 24px;
    color: #333;
}


.old-price {
    text-decoration: line-through;
    font-size: 16px;
    color: #888;
}

.discount-badge {
    background-color: #00aaff;
    color: #fff;
    padding: 5px 10px;
    border-radius: 10px;
    font-size: 14px;
    margin-top: 10px;
    display: inline-block;
}

.small-text {
    font-size: 14px;
    color: #888;
}

.hover-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.product-card:hover .hover-overlay {
    opacity: 1;
}

.hover-overlay .more-info {
    background-color: #00aaff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 50%;
    font-size: 16px;
    margin-bottom: 20px;
}

.action-buttons {
    display: flex;
    justify-content: space-between;
    background-color: #333;
    padding: 10px 0;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover .action-buttons {
    opacity: 1;
}

.action-buttons button {
    background: none;
    border: none;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    flex: 1;
}

.action-buttons button:hover {
    background-color: #555;
}

.action-buttons button:first-child {
    border-right: 1px solid #444;
}
        </style>
    </head>
    <div class="d-flex flex-column h-100">
        <div class="flex-shrink-0">
            <!-- Navigation-->
            <?php
    include  "./Header.php";
    ?>
            <!-- Header-->
            <header class="py-5">
                <div class="container px-5 pb-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-xxl-5">
                            <!-- Header text content-->
                            <div class="text-center text-xxl-start">
                                <!-- <div class="badge bg-gradient-primary-to-secondary text-white mb-4"><div class="text-uppercase">Design &middot; Development &middot; Marketing</div></div> -->
                                <div class="fs-3 fw-light text-muted">น้ําดื่มสําหรับคุณ เราให้บริการน้ําที่ดีต่อสุขภาพและน่ารื่นรมย์นอกเหนือจากน้ําสะอาดเพื่อให้คุณได้รับประสบการณ์การดื่มที่หลากหลายและนําพลังมาสู่ชีวิตประจําวัน</div>
                                <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">เครื่องกรองน้ำ</span></h1>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                    <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="resume.html">Resume</a>
                                    <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="/product.php">Projects</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-7">
                            <!-- Header profile picture-->
                            <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                                <div class="profile bg-gradient-primary-to-secondary">
                                    <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                                    <!-- Watch a tutorial on how to do this on YouTube (link)-->
                                    <img class="profile-img" src="https://platform-api.safe1210.com/uploads/images/image-1691402835610.jpg" alt="..." />
                                </div>
                                </div>
                        </div>
                        </div>
                        </div>
                        </header>  
                        <center><h2  style="color:red">สินค้าแนะนำ</้</h2></center>
                        <div class="album py-5 bg-body-tertiary">
                            <div class="container">
                        
                              <div class="row row-cols-1 row-cols row-cols-md-3 g-3">
                                
                              <?php
    // เชื่อมต่อฐานข้อมูลเพื่อดึงสินค้ามาแสดง
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);
    $count = 0; // ตัวนับเพื่อจำกัดจำนวนสินค้าที่แสดง
    while($row = mysqli_fetch_assoc($result)) {
        if ($count >= 3) { // แสดงแค่ 3 รายการ
            break;
        }
        ?>
        <div class="product-card">
            <!-- <h4 class="small-text"><?php echo $row['model']; ?></h4> -->
            <div class="product-title"><?php echo $row['name']; ?></div>
            <div class="product-price">
                ฿<?php echo $row['price']; ?> <span class="price">฿<br>
                <span class="stock">มีสินค้า<?php echo $row['stock']; ?></span>ชิ้น</span>
            </div>
            <div class="discount-badge">ลด <?php echo $row['stock']; ?>%</div>
            <img src="./admin/uploads/<?php echo $row['image']; ?>" alt="Product Image">
            
            <!-- Hover Overlay -->
            <div class="hover-overlay">
            
            </div>
            
            <!-- Action Buttons -->
            <div class="action-buttons">
                <!-- <a href="show_product_detail.php?id=<?= $row['id'] ?>" class="btn btn-primary">ดูรายละเอียด</a>
                <a href="add_to_cart.php?id=<?= $row['id'] ?>" class="btn btn-success">เพิ่มในตะกร้า</a> -->
            </div>
        </div>
        <br>
        <?php
        $count++; // เพิ่มตัวนับ
    }
?>
</div>
</div>
</div>
</center>
</div>

                        <section class="bg-light py-5">
                            <div class="container px-5">
                            <div class="row gx-5 justify-content-center">
                            <div class="col-xxl-8">
                                <div class="text-center my-5">
                                    <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About Me</span></h2>
                                    <p class="lead fw-light mb-4">My name is Start Bootstrap and I help brands grow.</p>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit dolorum itaque qui unde quisquam consequatur autem. Eveniet quasi nobis aliquid cumque officiis sed rem iure ipsa! Praesentium ratione atque dolorem?</p>
                                    <div class="d-flex justify-content-center fs-2 gap-4">
                                        <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                                        <a class="text-gradient" href="https://www.facebook.com/profile.php?id=61559610711286&locale=th_TH"><i class="bi bi-facebook"></i></a>
                                        <a class="text-gradient" href="#!"><i class="bi bi-line"></i></a>
                                        <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                                  
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>

<?php
include "./footer.php";
?>

                            </section>
                            </main>
                            
    </body>
</html>
