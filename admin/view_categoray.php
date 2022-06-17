<?php
    session_start();
if(isset($_SESSION['admin'])){
    include './incloud/connction.php';
    include './incloud/header.php';
    coonect();
    ?>
    <div class="col-md-10">
                
                <!--Start Table Catetogary -->
                <div class="table-box">
                <table class="table  ">
                    <thead>
                        <tr>
                        <th scope="col">رقم المقال</th>
                        <th scope="col"> كاتب المقال</th>
                        <th scope="col">عنوان المقال</th>
                        <th scope="col"> التصنيف</th>
                        <th scope="col">صوره المقال </th>
                        <th scope="col">نص المقال</th>
                        <th scope="col">تعديل او حذف </th>
                        </tr>
                    </thead>
                    <?php
                        $select = mysqli_query($conn,"SELECT * FROM new_posts ORDER BY id DESC");
                        $i=0;
                        while($row = mysqli_fetch_assoc($select)){
                            $i++;
                            ?>
                                
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['author']?></td>
                                    <td><?php echo $row['title']?></td>
                                    <td> <?php  echo $row['cateName'];?>
                                    </td>
                                    <td>
                                        <img src="../assest/image/new_cate/<?php echo $row['image']?>" style="width:100px">
                                        
                                    </td>
                                    <td>
                                        
                                        <?php 

                                        if(strlen($row['message'])>150){
                                            $row['message'] = substr($row['message'],0,50). "....."; 
                                        }
                                        echo $row['message']
                                        
                                        ?>
                                    </td>
                                    <td>
                                    <a href="./deit&deleteCat/edit.php?id=<?php echo $row['id'];?>" class="btn custom">تعديل</a>
                                        <a href="./deit&deleteCat/delete.php?id=<?php echo $row['id'];?>" class="btn custom-btn">حذف</a>
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