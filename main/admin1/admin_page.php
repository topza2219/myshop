<?php 

    session_start();

    if (!$_SESSION['userid']) {
        header("Location: index.php");
    } else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

    <link rel="stylesheet" href="style.css">
<div class="container ">
     <div class="col-auto bg-primary">
        <div class="alert alert-primary" role="alert">
        <center> <h2>ระบบบันทึกเวลา-เข้าออก</h2></center>
        </div>
    </div>
</div>
<br>
</head>
<body>
    <header>
<nav class="navbar navbar-light bg-primary">
    <div class="container-fluid">
        <a class="nav-link " aria-current="page" href="index.php">หน้า login</a>
            &nbsp;
        <a class="nav-link " aria-current="page" href="home.php">หน้าหลัก</a>
            &nbsp;
        <a class="nav-link " aria-current="page" href="register.php">บันทึกข้อมูลพนักงาน</a>
            &nbsp;
        <a class="nav-link " aria-current="page" href="time_emp.php">บันทึกเวลา</a>
            &nbsp;
            <a class="nav-link" href="showuser.php">แสดงข้อมูลทั่วไป</a>
            &nbsp;
        <a class="nav-link" href="show_dep.php">แสดงข้อมูลแผนก</a>
            &nbsp;
        <a class="nav-link" href="showtime.php">แสดงข้อมูลเวลา</a>
            &nbsp;
            <a class="nav-link" href="dep.php">เพิ่มข้อมูลแผนก</a>
            &nbsp;

       <h4> <a class="nav-link" href="logout.php">ออกจากระบบ</a></h4>
        <br>
    </div>
</nav>
    </from>
        <h1>You are Admin</h1>
        <h3>Hi, <?php echo $_SESSION['user']; ?></h3>
        <h4><p><a href="logout.php">Logout</a></p></h4>
        
    
</body>
</html>


<?php } ?>