<?php
 session_start();
 if(isset($_SESSION['admin'])){
    include './incloud/connction.php';
    include './incloud/header.php';
    coonect();
    ?>
     <div class="col-md-10">
                <!--Start Add New Catetogary -->
                <div class="add-categoray">
                    <?php
                        if(isset($_POST['add'])){
                            $name = $_POST['name'];
                            if(empty($name)){
                                ?>
                                <div class="alert alert-danger col-md-12 text-center form-control">الحقل فارغ </div>
                                <?php
                            }else{
                                
                                $insert = mysqli_query($conn,"INSERT INTO categories(categoryName)VALUES('$name')");
                                if($insert){
                                    ?>
                                    <div class="alert alert-success col-md-12 text-center form-control">تم اضافه التصنيف بنجاح</div>
                                    <meta http-equiv="refresh" content="1;url=index.php">
                                    <?php
                                }
                            }
                        }
                    ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="add-cat" class="form-label">اضافه تصنيف جديد</label>
                            <input type="text" class="form-control" id="add-cat" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary" name="add">اضافه</button>
                    </form>
                </div>
                <!--End Add New Catetogary -->
                        
                <!--Start Table Catetogary -->
                <div class="table-box">
                <table class="table  ">
                    <thead>
                        <tr>
                        <th scope="col">رقم الفئه</th>
                        <th scope="col">اسم الفئه</th>
                        <th scope="col">تاريخ الاضافه</th>
                        <th scope="col">حذف التصنيف</th>
                        </tr>
                    </thead>
                    <?php
                        $select = mysqli_query($conn,"SELECT * FROM categories ORDER BY id DESC");
                        $i=0;
                        while($row = mysqli_fetch_assoc($select)){
                            $i++;
                            ?>
                                
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['categoryName']?></td>
                                    <td><?php echo $row['Date']?></td>
                                    <td>
                                        <a href="./deit&deleteCat/delete.php?id=<?php echo $row['id'];?>" class="btn custom-btn">حذف التصنيف</a>
                                    </td>
                                </tr>
                                <!-- <th scope="col">حذف التصنيف</th> -->
                            <?php
                        }
                    ?>
                </table>
                </div>
                <!--End Table Catetogary -->

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
       