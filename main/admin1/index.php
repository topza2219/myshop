<?php 

    session_start();
    include './navbar.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <div class="container ">
        <div class="col-auto bg-primary">
                <center><h3>LOG IN</h3></center>
        </div>
    </div>
    <br>
</head>
<body>
    <header>

    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <?php 
                echo $_SESSION['success'];
            ?>
        </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; 
    ?>
    <form action="login.php" method="post">
        <div class="row mb-3 mt-3 fs-4">
            <h4><label for="username" class="col-sm-2 col-form-label">ชื่อผู้ใช้</label></h4>
        <div class="col-6">
        <center><input type="text" name="username"class="form-control" placeholder="กรุณากรอกชื่อผู้ใช้"required></center>
            </div>
        </div>
            <br>
        <div class="row mb-3 mt-3 fs-4">
            <h4><label for="password"class="col-sm-2 col-form-label" >รหัสผ่าน</label></h4>
        <div class="col-6">
        <center><input type="password" name="password"class="form-control" placeholder="กรุณากรอกรหัสผ่าน" required>
            </div>
        </div>
        <br>
        <div class="col-auto">
        <input type="submit" class="btn btn-primary " name="submit" value="Login">
        </div>
    </form>
    <br>
    <h3><a href="register.php">ลงทะเบียนพนักงานใหม่</a></h3>
    </br>
    
</body>
</html>

<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>