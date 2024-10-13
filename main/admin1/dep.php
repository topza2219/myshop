<?php 

    session_start();

    require_once "connection.php";

    if (isset($_POST['submit'])) {

        $id_dep = $_POST['id_dep'];
        $name_dep = $_POST['name_dep'];
        

      
        $dep_check = "SELECT * FROM dep WHERE id_dep = '$id_dep' LIMIT 1";
        $result = mysqli_query($conn, $dep_check);
        $dep= mysqli_fetch_assoc($result);

        if ($id_dep['id_dep'] === $id_dep) {
            echo "<script>alert('Name already exists');</script>";
        } else {
            $passenc = md5($pass);

            $query = "INSERT INTO dep (id_dep,name_dep)
                        VALUE ('$id_dep' ,'$name_dep')";
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

    <title>Dep Emp</title>
    <link rel="stylesheet" href="style.css">
        <div class="container ">
        <div class="col-auto bg-primary ">
            <center> <h3>ระบบบันทึกข้อมูลแผนก</h3></center> 
            </div>
            </head>
            <body>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="row mb-3 mt-3 fs-4">
                    <label for="id_dep" class="col-sm-2 col-form-label">รหัสแผนก</label>
                        <div class="col-6">
                            <input type="text" name="id_dep"class="form-control" placeholder="รหัสพนักงาน" required>
                            </div>
                            </div>
                        <div class="row mb-3 mt-3 fs-4">
                    <label for="name_dep" class="col-sm-2 col-form-label">ชื่อแผนก</label>
                        <div class="col-6">
                    <input type="text" name="name_dep"class="form-control" placeholder="ชื่อแผนก" required>
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