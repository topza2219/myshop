<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        /* Footer */
.footer {
    background-color: #006666;
    color: white;
    padding: 40px 0;
    font-family: 'Arial', sans-serif;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.footer-section {
    flex: 1;
    min-width: 250px;
    margin: 10px;
}

.footer-section h3 {
    margin-bottom: 20px;
    font-size: 1.5em;
    border-bottom: 2px solid white;
    padding-bottom: 10px;
}

.footer-section p, .footer-section ul {
    font-size: 0.9em;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section a {
    color: white;
    text-decoration: none;
}

.social-icons a {
    margin-right: 10px;
    font-size: 1.5em;
    color: white;
}

.footer-bottom {
    text-align: center;
    padding: 20px;
    border-top: 1px solid white;
    font-size: 0.8em;
}

/* Icon Styles */
.fa-facebook, .fa-envelope, .fa-youtube {
    padding: 10px;
    background-color: #333;
    border-radius: 50%;
    color: white;
}


    </style>
<footer class="footer">
    <div class="footer-container">
        <div class="footer-section about">
            <h3>เกี่ยวกับเรา</h3>
            <p>
                บริษัท อิโทะคอลส์ จำกัด เป็นผู้นำเข้าและจัดจำหน่าย เอทิลแอลกอฮอล์ชั้นนำในประเทศไทย
                เบื้องหลังความสำเร็จของการผลิตสินค้าแบรนด์ดังระดับโลก
                ด้วยคุณภาพที่ยอดเยี่ยม และได้มาตรฐานจากเรา
            </p>
            <p><strong>Etohcols จำหน่าย เอทานอล แอลกอฮอล์ คุณภาพดี</strong></p>
            <div class="social-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-envelope"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>

        <div class="footer-section contact">
            <h3>ติดต่อเรา</h3>
            <p>โทร: 02-100-6987</p>
            <p>Line ID: @etohcols</p>
            <p>อีเมล: Sales@etohcols.com</p>
            <p>ที่อยู่: 8/65 ซอยอนามัยงามเจริญ 11 แขวงท่าข้าม เขตบางขุนเทียน กรุงเทพฯ 10150</p>
        </div>

        <div class="footer-section products">
            <h3>สินค้าของเรา</h3>
            <ul>
                <li>สำหรับบุคคลทั่วไป</li>
                <li>ยาและเวชภัณฑ์</li>
                <li>ผลิตภัณฑ์เครื่องสำอาง</li>
                <li>อาหารและเครื่องปรุงรส</li>
                <li>เครื่องดื่ม</li>
                <li>เคมีภัณฑ์และอื่นๆ</li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>Copyright 2024 © ETOHCOLS</p>
    </div>
</footer>

</body>
</html>