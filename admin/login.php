<?php
session_start();
if(isset($_SESSION['admin'])){
    header('location:index.php');
}else {
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
    <title>login || Admin</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
            if(isset($_POST['login'])){
                $user = $_POST['user'];
                $password = $_POST['password'];
                if(empty($user) || empty($password)){
                    ?>
                        <div class="alert alert-danger col-md-12 text-center form-control ">الحقل فارغ </div>

                    <?php
                }else {
                    $select_user = mysqli_query($conn,"SELECT * FROM admins WHERE username='$user'");
                    $cheack_user = mysqli_num_rows($select_user);
                    if($cheack_user == 0){
                        ?>
                        <div class="alert alert-danger col-md-12 text-center form-control "> خطاء ف تسجيل الدخوال</div>
                    <?php
                    }else {
                        $select_pass = mysqli_query($conn,"SELECT password FROM admins WHERE username='$user'");
                        $pass = mysqli_fetch_assoc($select_pass);
                        if($pass['password'] != $password){
                            ?>
                            <div class="alert alert-danger col-md-12 text-center form-control ">كلمه المرور غير صحيحه</div>
                        <?php
                        }else {
                            $_SESSION['admin'] = $user;
                            header('location:index.php');
                        }
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
                    <label for="exampleInputPassword1" class="form-label">كلمه السر</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn custom" name="login">تسجيل</button>
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
    <?php
}
    
?>
