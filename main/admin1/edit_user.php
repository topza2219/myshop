<?php

include('connection.php');
include './navbar.php';
$id = $_GET['id'];
$sql = "SELECT * FROM  user WHERE id ='$id'";
$query = mysqli_query($conn, $sql);
$data =mysqli_fetch_assoc($query);
if(isset($_POST) && !empty($_POST)){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $dep_name = $_POST['dep_name'];
    $position = $_POST['position'];

    $sql_edit = "UPDATE user SET username='$username',password ='$password',firstname='$firstname',lastname='$lastname', email='$email' ,tel='$tel' ,dep_name='$dep_name',
    position='$position'
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

    <title>Employee Page</title>
    <link rel="stylesheet" href="style.css">

     <div class="container ">
     <center><div class="col-auto bg-primary">
        <div class="alert alert-primary" role="alert">
        <h2>ระบบบันทึกเวลา-เข้าออก</h2>
</div>
            </div>
            </center>
            <br>
            </div>
            </head>
            <body>
            <header>
              
            <form action="" method="post">
                <div class="input-group mb-3">
                    <label for="username" class="col-sm-2 col-form-label ">ชื่อผู้ใช้</label>
                    <div class="col-5">
                    <input type="text" name="username" value="<?=$data['username']?>" class="form-control" placeholder="ชื่อผู้ใช้"  required> 
                    </div> 
                </div>
            </dv>

            <div class="input-group mb-3">
                    <label for="password" class="col-sm-2 col-form-label" >รหัสผ่าน</label>
                     <div class="col-sm-5">
                     <input type="password" name="password" class="form-control" placeholder="กรุณาใส่ รหัสผ่าน" required value="<?=$data['password']?>"> 
                    </div>
             </div>
            <div class="input-group mb-3">
                    <label for="firstname"class="col-sm-2 col-form-label">ชื่อจริง</label>
                    <div class="col-sm-5">
                    <input type="text" name="firstname"  value="<?=$data['firstname']?>" class="form-control" placeholder="กรุณาใส่ ชื่อจริง" required > 
                    </div>
                </div>
            </div> 
            <div class="input-group mb-3">
                    <label for="lastname"class="col-sm-2 col-form-label">นามสกุล</label>
                    <div class="col-sm-5">
                    <input type="text" name="lastname"  value="<?=$data['lastname']?>" class="form-control" placeholder="กรุณาใส่ นามสกุล" required value="<?=$data['lastname']?>"  > 
                  </div>
                </div>
            </div>
            <div class="input-group mb-3">
                    <label for="email"class="col-sm-2 col-form-label">อีเมล</label>
                    <div class="col-sm-5">
                    <input type="text" name="email"  value="<?=$data['email']?>" class="form-control" placeholder="กรุณาใส่ อีเมล" required  > 
                  </div>
                </div>
            </div>
           <div class="input-group mb-3">
                    <label for="tel"class="col-sm-2 col-form-label">เบอร์โทร</label>
                    <div class="col-sm-5">
                    <input type="text" name="tel"  value="<?=$data['tel']?>" class="form-control" placeholder="กรุณาใส่ เบอร์โทร" required > 
                  </div>
                </div>
            </div>
            <div class="input-group mb-3">
                    <label for="dep_name"class="col-sm-2 col-form-label">แผนก</label>
                    <div class="col-sm-5">
                    <input type="text" name="dep_name" value="<?=$data['dep_name']?>"class="form-control" placeholder="กรุณาใส่ แผนก" required   > 
                  </div>
                </div>
            </div>
            <div class="input-group mb-3">
                    <label for="position"class="col-sm-2 col-form-label">ตำแหน่ง</label>
                    <div class="col-sm-5">
                    <input type="text" name="position" value="<?=$data['position']?>" class="form-control" placeholder="กรุณาใส่ ตำแหน่ง" require > 
                  </div>
            </div>
        </div>

                    <br>
                    <center>
                    <div class="col-auto">
                    <input type="submit" class="btn btn-primary" name="submit" value="บันทึกข้อมูล">
                    <input type="reset" class="btn btn-primary" name="reset" value="แก้ไขข้อมูล">
                    </div></center>
                    </div>
           
            
                </form>

<br>
<center><h3><p><a href="home.php">หน้าหลัก</a></p</h3><center>
</body>
</html>