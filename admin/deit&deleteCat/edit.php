<?php
 session_start();
    if(isset($_SESSION['admin'])){
        include '../incloud/connction.php';
        coonect();
        ?>
<!DOCTYPE html>
<html  lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assest/css/all.min.css">

<!-- File Bootstrab Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assest/css/dashbord.css">
    <title>Document</title>
</head>
<body>
        <div class="container">
            <div class="row">
                <?php
                $id = $_GET['id'];
                if(isset($_POST['edit'])){
                    $author = $_POST['author'];
                    $title = $_POST['title'];
                    $categories = $_POST['categories'];
                    $message = $_POST['message'];
                    if(empty($author) || empty($title) || empty($message)){
                        ?>
                        <div class="alert alert-danger col-md-12 text-center form-control ">الحقل فارغ </div>
                        <?php
                    }elseif($message > 1000){

                        ?>
                        <div class="alert alert-danger col-md-12 text-center form-control"> حجم المقال كبير جدا </div>
                        <?php
                    }else {
                      
                            $file_name = $_FILES['file']['name'];
                            $tmp = $_FILES['file']['tmp_name'];
                            $type = $_FILES['file']['type'];
                            $size = $_FILES['file']['size'];
                            
                            if(empty($file_name) || $type != "image/jpeg" || $size > 830000){
                                ?>
                                <div class="alert alert-danger col-md-12 text-center form-control"> Error Of The image </div>
                                <?php
                            }else{
                                $folder = "../../assest/image/new_cate/";
                                $cut_name = explode(".",$file_name);
                                $scond = strtotime(date("Y-m-d H:i:s"));
                                $new_name = $scond . "." . $cut_name[count($cut_name)-1];
                                move_uploaded_file($tmp,$folder.$new_name);
                                
                                $update = mysqli_query($conn,"UPDATE new_posts SET author='$author', title='$title',cateName='$categories',image='$new_name', message='$message' WHERE id='$id'");
                                if($update){
                                    ?>
                                    <div class="alert alert-success col-md-12 text-center form-control">تم التحديث بنجاح</div>
                                    <meta http-equiv="refresh" content="1;url=../view_categoray.php">
                                    <?php
                                }
                            }
                    }

                }
                $slect_post = mysqli_query($conn,"SELECT * FROM new_posts WHERE id='$id'");
                $rows = mysqli_fetch_assoc($slect_post);
                ?>
                <div class="col-md-8 form">
                <div class="alert alert-dark col-md-12 text-center form-control">تعديل المقال</div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                    <label for="author"> كاتب المقال</label>
                                    <input type="text" id="author" name="author" class="form-control" value="<?php echo $rows['author']?>">
                                </div>
                                <div class="form-group">
                                    <label for="title"> عنوان المقال</label>
                                    <input type="text" id="title" name="title" class="form-control" value="<?php echo $rows['title']?>">
                                </div>
                                <div class="form-group">
                                    <label for="cate"> التصنيف</label>
                                    <select name="categories" id="cate" class="form-control">
                                    <option value=""></option>
                                    <?php
                                        $select_cat = mysqli_query($conn,"SELECT * FROM categories ORDER BY id DESC");
                                        while ($row = mysqli_fetch_assoc($select_cat)) {
                                            ?>
                                                <option value="<?php echo $row['categoryName']?>"><?php echo $row['categoryName']?></option>
                                            <?php
                                        }
                                    ?>
                                        <!-- <option value="">بلوجر</option>
                                        <option value="">php</option>
                                        <option value="">Jave script</option> -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image"> صوره المقال</label>
                                    <input type="file" id="image" name="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="message"> نص المقال</label>
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control" ></textarea>
                                </div>
                                <button type="submit"class="btn btn-primary" name="edit">تعديل  المقاله</button>
                        </form>
                </div>
                <div class="col-md-4">
                <div class="image">
                <img src="../../assest/image/new_cate/<?php echo $rows['image'];?>" class="img-fluid" alt="...">
                </div>
                </div>
            </div>
        </div>


    <script src="../assest/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>
</html>
        <?php
    }else {
        header('location:login.php');

    }

?>
