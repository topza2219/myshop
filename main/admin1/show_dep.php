<?php

        include('connection.php');
        include './navbar.php';
        $sql = "SELECT * FROM  dep";
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
  border: 1px solid #20c997;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #d63384;
}
</style>
</head>
<body>
  <header>
  <div class="container ">
    <div class="col-auto bg-primary">
      <div class="alert alert-primary" role="alert">
        <center><h2>ระบบบันทึกเวลา-เข้าออก</h2></center>
      </div>
    </div>
  </div>
  <table>
  <tr>
  <center><th>รหัสแผนก</th></center>
  <center><th>ชื่อแผนก</th></center>
  <center><th>menu</th></center>
  </tr>
  <?php foreach ($query as $data){?>
    
  <tr>
  <center><th><?=$data['id_dep']?></th><center>
  <center><th><?=$data['name_dep']?></th><center>
    <th>
    <center> <a href="edit_dep.php?id=<?=$data['id']?>">แก้ไข and เพิ่ม</a></center>
    <center> <a href="delete_dep.php?id=<?=$data['id']?>">ลบข้อมูล</a></center>
    </th>
  </tr>
    
    <?php } ?>
</table>
<center><h3><p><a href="home.php">หน้าหลัก</a></p></h3></center>
</body>
</html>