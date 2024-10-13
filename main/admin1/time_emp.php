<?php 
    include './navbar.php';
    session_start();
   
    require_once "connection.php";

    if (isset($_POST['submit'])) {

        $id_emp = $_POST['id_emp'];
        $pass = $_POST['pass'];
        $uname = $_POST['uname'];
        $time_in = $_POST['time_in'];
        $time_out = $_POST['time_out'];
        $id_dep = $_POST['id_dep'];

      
        $time_emp_check = "SELECT * FROM time_emp WHERE id_emp = '$id_emp' LIMIT 1";
        $result = mysqli_query($conn, $time_emp_check);
        $time_emp= mysqli_fetch_assoc($result);

        if ($time_emp['id_emp'] === $id_emp) {
            echo "<script>alert('Name already exists');</script>";
        } else {
            $passenc = md5($pass);

            $query = "INSERT INTO time_emp(id_emp,pass, uname,time_in,time_out, id_dep)
                        VALUE ('$id_emp' ,'$passenc' , '$uname', '$time_in','$time_out', '$id_dep')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "Insert time_emp successfully";
                header("Location: home.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: home.php");
            }
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

    <title>Time in-out</title>
    <link rel="stylesheet" href="style.css">
        <div class="container ">
        <div class="col-auto bg-primary ">
            <center> <h3>ระบบบันทึก เวลาเข้า-ออก</h3></center> 
            </div>
            </head>
            <body>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="row mb-3 mt-3 fs-4">
                    <label for="id_emp" class="col-sm-2 col-form-label">รหัสพนักงาน</label>
                        <div class="col-6">
                            <input type="text" name="id_emp"class="form-control" placeholder="รหัสพนักงาน" required>
                            </div>
                            </div>
                        <div class="row mb-3 mt-3 fs-4">
                    <label for="pass" class="col-sm-2 col-form-label">รหัสผ่าน</label>
                        <div class="col-6">
                    <input type="password" name="pass"class="form-control" placeholder="รหัสพผ่านนักงาน" required>
                            </div>
                            </div>
                        <div class="row mb-3 mt-3 fs-4">
                    <label for="uname" class="col-sm-2 col-form-label" >ชื่อพนักงาน</label>
                        <div class="col-sm-6">
                    <input type="text" name="uname" class="form-control" placeholder="ชื่อพนักงาน" required>
                            </div>
                            </div>
                        <div class="row mb-3 mt-3 fs-4">
                    <label for="time_in"class="col-sm-2 col-form-label">เวลาเข้า</label>
                        <div class="col-sm-6">
                    <input type="datetime-local" name="time_in" class="form-control" placeholder="เวลาเข้า" required>
                            </div>
                            </div>
                        <div class="row mb-3 mt-3 fs-4">
                    <label for="time_out"class="col-sm-2 col-form-label">เวลาเข้าออก</label>
                        <div class="col-sm-6">
                    <input type="datetime-local" name="time_out" class="form-control" placeholder="เวลาออก" required>
                            </div>
                            </div>
                            <div class="row mb-3 mt-3 fs-4">
                    <label for="id_dep"class="col-sm-2 col-form-label">รหัสแผนก</label>
                        <div class="col-sm-6">
                    <input type="text" name="id_dep" class="form-control" placeholder="รหัสแผก" required>
                            </div>
                            </div>

                        <br>
                    <center>
                        <div class="col-auto">
                    <input type="submit" class="btn btn-primary" name="submit" value="บันทึกข้อมูล">
                    <input type="reset" class="btn btn-primary" name="reset" value="แก้ไขข้อมูล">
                    </center>
                
                        </div>
                    </div>
                </div>
            
            </form>
        </div>
    </form>
    <br>
    <center><h3><p><a href="home.php">หน้าหลัก</a></p</h3></center>
    
</body>
</html>