<?php
          include './navbar.php';
        include('connection.php');

        $sql = "SELECT * FROM  time_emp";
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
  background-color: #0dcaf0;
}
</style>
</head>
<body>
  <header>
  <div class="container ">
    <div class="col-auto bg-primary">
      <div class="alert alert-primary" role="alert">
      <center><h2>ระบบบันทึกเวลา-เข้าออก</h2></center >
      </div>
    </div>
  </div>
  <table>
  <tr>
  <center><th>รหัสพนักงาน</th></center>
  <center> <th>ชื่อพนักงาน</th></center>
  <center><th>เวลาเข้า</th><center>
  <center> <th>เวลาออก</th><center>
  <center> <th>รหัสแผนก</th><center>
  <center> <th>menu</th><center>
  </tr>
  <?php foreach ($query as $data){?>
    <tr>
    <center> <th><?=$data['id_emp']?></th></center>
    <center><th><?=$data['uname']?></th></center>
    <center><th><?=$data['time_in']?></th></center>
    <center><th><?=$data['time_out']?></th></center>
    <center><th><?=$data['id_dep']?></th></center>
    <th>
      <br>
      <br>
    <center><h2><a href="edit_time.php?id=<?=$data['id']?>">แก้ไข and เพิ่ม</a></h2></center>
    <center> <a href="delete_time.php?id=<?=$data['id']?>">ลบข้อมูล</a></center>
    </th>
  </tr> 
    <?php } ?>
</table>
<center><h3><p><a href="home.php">หน้าหลัก</a></p</h3></center>
</body>
</html>