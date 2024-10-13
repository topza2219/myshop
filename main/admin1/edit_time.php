<?php

include('connection.php');
include './navbar.php';
$id =$_GET['id'];
$sql = "SELECT * FROM  time_emp WHERE id ='$id'";
$query = mysqli_query($conn, $sql);
$data =mysqli_fetch_assoc($query);
if(isset($_POST) && !empty($_POST)){
        $id_emp = $_POST['id_emp'];
        $pass = $_POST['pass'];
        $uname = $_POST['uname'];
        $time_in = $_POST['time_in'];
        $time_out = $_POST['time_out'];
        $id_dep = $_POST['id_dep'];

        $sql_edit = "UPDATE time_emp SET id_emp='$id_emp',pass ='$pass',uname='$uname',time_in='$time_in', time_out='$time_out' ,id_dep='$id_dep'
        WHERE id='$id'"; 
        $query_edit = mysqli_query ($conn,$sql_edit);
        if ($query_edit){
        echo 'อัปเดทข้อมูลสำเร็จ'; 
      }else{
        echo'อัปเดทข้อมูลไม่สำเร็จ';

    }
    
}

?>

<!doctype html>
<html lang="en">
<head>
    
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit and Update</title>
    <link rel="stylesheet" href="style.css">
        <div class="container ">
        <div class="col-auto bg-primary ">
        <center> <h3>ระบบบันทึกข้อมูลพนักงาน</h3></center> 
        </div>
          </head>
            <body>
              <form action="" method="post">
                <div class="row mb-3 mt-3 fs-4">
                    <label for="id_emp" class="col-sm-2 col-form-label">รหัสแผนก</label>
                    <div class="col-6">
                    <input type="text" name="id_emp" value="<?=$data['id_emp']?>" class="form-control" placeholder="รหัสพนักงาน" required>
                    </div>
                  </div>
                <div class="row mb-3 mt-3 fs-4">
                    <label for="pass" class="col-sm-2 col-form-label">รหัสพนักงาน</label>
                    <div class="col-6">
                    <input type="password" name="pass" value="<?=$data['pass']?>" class="form-control" placeholder="รหัสพผ่านนักงาน" required>
                    </div>
                  </div>
                <div class="row mb-3 mt-3 fs-4">
                    <label for="uname" class="col-sm-2 col-form-label" >ชื่อพนักงาน</label>
                    <div class="col-sm-6">
                    <input type="text" name="uname" value="<?=$data['uname']?>" class="form-control" placeholder="ชื่อพนักงาน" required>
                    </div>
                  </div>
                <div class="row mb-3 mt-3 fs-4">
                    <label for="time_in"class="col-sm-2 col-form-label">เวลาเข้า</label>
                    <div class="col-sm-6">
                    <input type="text" name="time_in" value="<?=$data['time_in']?>" class="form-control" placeholder="เวลาเข้า" required>
                    </div>
                  </div>
                <div class="row mb-3 mt-3 fs-4">
                    <label for="time_out"class="col-sm-2 col-form-label">เวลาเข้าออก</label>
                    <div class="col-sm-6">
                <input type="datetime-local" name="time_out" value="<?=$data['time_out']?>" class="form-control" placeholder="รหัสแผนก" required>
                  </div>
                </div>
                <div class="row mb-3 mt-3 fs-4">
                    <label for="id_dep"class="col-sm-2 col-form-label">รหัสแผนก</label>
                    <div class="col-sm-6">
                <input type="text" name="id_dep" value="<?=$data['id_dep']?>" class="form-control" placeholder="เวลาออก" required>
                  </div>
                </div>
                  <br>
                  <center>
                  <div class="col-auto">
                    <input type="submit" class="btn btn-primary" name="submit" value="บันทึกข้อมูล">
                    <input type="reset" class="btn btn-primary" name="reset" value="แก้ไขข้อมูล">
                    </div>
                </div>
                  </center>
              </form>
        </div>
      <br>
      <center><h3><p><a href="home.php">หน้าหลัก</a></p</h3><center>
    
</body>
</html>