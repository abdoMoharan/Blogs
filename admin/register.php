<?php
    include './incloud/connction.php';
    coonect();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwson -->
    <link rel="stylesheet" href="../assest/css/all.min.css">

    <!-- File Bootstrab Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- File costoum Style -->
    <link rel="stylesheet" href="../assest/css/dashbord.css">
    <title>Register || Admin</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
            if(isset($_POST['add'])){
                $user = $_POST['user'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                if(empty($user) || empty($email) || empty($password)){
                    ?>
                        <div class="alert alert-danger col-md-12 text-center form-control ">الحقل فارغ </div>

                    <?php
                }else {
                    $insert = mysqli_query($conn,"INSERT INTO admins(username,email,password)VALUES('$user','$email','$password')");
                    if($insert){
                        ?>
                                    <div class="alert alert-success col-md-12 text-center form-control">تم التسجيل  بنجاح</div>
                                    <meta http-equiv="refresh" content="2;url=login.php">
                                    <?php
                    }
                }
            }
            ?>
            <h4 class="text-center" style="margin-top:50px; color:#57a2e4">تسجيل بيانات</h4>
            <div class="col-md-12 form">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <div class="mb-3">
                    <label for="user" class="form-label">اسم المستخدم</label>
                    <input type="text" class="form-control" id="user" name="user">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">البريد الاكتروني</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">كلمه السر</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn custom" name="add">تسجيل</button>
            </form>
            </div>
        </div>
    </div>
    <!-- File Jave Script -->
    <script src="../assest/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>
</body>
</html>