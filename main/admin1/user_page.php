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
    <title>User Page</title>

    <link rel="stylesheet" href="style.css">
    <div class="container ">
 

</head>
<body>

        <h1>ระบบบันทึกเวลาเข้า-ออก</h1>
        <h3>ยินดีต้อนรับ, <?php echo $_SESSION['user']; ?></h3>
        <br>
        <h3><a class="nav-link " aria-current="page" href="time_emp.php">บันทึกเวลาเข้า-ออก</a></h3>
        <br>
        <p><a href="logout.php">Logout</a></p>
    
</body>
</html>


<?php } ?>