<?php
          include './navbar.php';
        include('connection.php');

        $sql = "SELECT * FROM  user";
        $query = mysqli_query($conn, $sql);
       

        ?>
<?php

        include('connection.php');

        $sql = "SELECT * FROM  user";
        $query = mysqli_query($conn, $sql);
       

        ?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dc3545;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #fd7e14;
}
</style>
</head>
<body>
  <header>
  <div class="container ">
    <div class="col-auto bg-primary">
      <div class="alert alert-primary" role="alert">
      <center> <h2>ระบบบันทึกเวลา-เข้าออก</h2></center >
      </div>
    </div>
  </div>
<table>
  <tr>
  <center><th>ชื่อผู้ใช้</th></center>
  <center> <th>ชื่อจริง</th></center>
  <center> <th>นามสกุล</th></center>
  <center><th>อีเมล</th></center>
  <center> <th>เบอร์โทร</th></center>
  <center><th>ชื่อแผนก</th></center>
  <center><th>ตำแหน่ง</th></center>
  <center> <th>menu</th></center>
  </tr>
  <?php foreach ($query as $data){?>

  <tr>
  <center><th><?=$data['username']?></th></center>
  <center><th><?=$data['firstname']?></th></center>
  <center><th><?=$data['lastname']?></th></center>
  <center><th><?=$data['email']?></th></center>
  <center><th><?=$data['tel']?></th></center>
  <center> <th><?=$data['dep_name']?></th></center>
  <center><th><?=$data['position']?></th></center>
    <th>

    <center> <a href="edit_user.php?id=<?=$data['id']?>">แก้ไข and เพิ่ม</a></center>
    <center>  <a href="delete_user.php?id=<?=$data['id']?>">ลบข้อมูล</a></center>
    </th>
  </tr>  
    <?php } ?>
</table>
<center><h3><p><a href="home.php">หน้าหลัก</a></p</h3></center>
</body>
</html>