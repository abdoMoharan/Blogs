<?php
    session_start();
    if(isset($_SESSION['admin'])){
        include './incloud/header.php';
        include './incloud/connction.php';
        coonect();
        ?>
    <div class="col-md-10">
                <div class="add-category">
                    <?php
                        if(isset($_POST['add'])){
                            $author = $_POST['author'];
                            $title = $_POST['title'];
                            $categories = $_POST['categories'];
                            $message = $_POST['message'];

                            if(empty($author) || empty($title) ||  empty($message) ){
                                ?>
                                <div class="alert alert-danger col-md-12 text-center form-control">الحقل فارغ </div>
                                <?php
                            }elseif($message > 1000){
                                ?>
                                <div class="alert alert-danger col-md-12 text-center form-control"> حجم المقال كبير جدا </div>
                                <?php
                            }else{
                                $file_name = $_FILES['file']['name'];
                                $tmp = $_FILES['file']['tmp_name'];
                                $type = $_FILES['file']['type'];
                                $size = $_FILES['file']['size'];
                                
                                if(empty($file_name) || $type != "image/jpeg" || $size > 830000){
                                    ?>
                                    <div class="alert alert-danger col-md-12 text-center form-control"> Error Of The image </div>
                                    <?php
                                }else {
                                    $folder = "../assest/image/new_cate/";
                                    $cut_name = explode(".",$file_name);
                                    $scond = strtotime(date("Y-m-d H:i:s"));
                                    $new_name = $scond . "." . $cut_name[count($cut_name)-1];
                                    move_uploaded_file($tmp,$folder.$new_name);
                                    $insert = mysqli_query($conn,"INSERT INTO  new_posts(author,title,cateName,image,message)
                                    VALUES('$author','$title','$categories','$new_name','$message')");
                                    if($insert){
                                        ?>
                                        <div class="alert alert-success col-md-12 text-center form-control">تم  اضافه المقال بنجاح</div>
                                        <!-- <meta http-equiv="refresh" content="1;url=../view_categoray.php"> -->
                                        <?php
                                    }
                                }
                            }
                        }
                    
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <label for="author"> كاتب المقال</label>
                            <input type="text" id="author" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="title"> عنوان المقال</label>
                            <input type="text" id="title" name="title" class="form-control">
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
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit"class="btn btn-primary" name="add">نشر  المقاله</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php
    include './incloud/footer.php';
?>

        <?php
    }else {
        header('location:login.php');

    }

?>
        