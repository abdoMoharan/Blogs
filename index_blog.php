<?php
    include './inc/header.php';
    include './admin/incloud/connction.php';
    coonect();
?>
<!-- Start Post -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php
                    $select_posts = mysqli_query($conn,"SELECT * FROM new_posts ORDER BY id DESC");
                    while ($row_post = mysqli_fetch_assoc($select_posts)) {
                        ?>
                        <div class="post text-center">
                    <div class="image-post">
                        <a href="post.php?id=<?php echo $row_post['id'];?>"><img src="./assest/image/new_cate/<?php echo $row_post['image'];?>" class="img-fluid" alt="..."></a>
                        
                    </div>
                    <div class="post-title">
                        <a href="post.php?id=<?php echo $row_post['id'];?>"><h4><?php echo $row_post['title'];?></h4></a>
                    </div>
                    <div class="post-detalis">
                        <p class="info">
                            <span><i class="fas fa-user"></i><?php echo $row_post['author'];?></span>
                            <span><i class="far fa-calendar-alt"></i><?php echo $row_post['Date'];?></span>
                            <span><i class="fas fa-tags"></i><?php echo $row_post['cateName'];?></span>
                        </p>
                        <p class="contents">
                        <?php
                                    if(strlen($row_post['message'])>150){
                                        $row_post['message'] = substr($row_post['message'],0,300). "....."; 
                                    }
                                    echo $row_post['message'];
                                    ?>
                        </p>
                        <a href="post.php?id=<?php echo $row_post['id'];?>"  class="btn btn-secondary coustom-but">اقراء المزيد</a>
                    </div>
                </div>
                <hr>
                        <?php
                    }
                ?>

                
            </div>

            <div class="col-md-3">
                <div class="categoray">
                    <h4 class="text-center"> التصنيفات</h4>
                    <div class="cate-list">
                        <ul>
                            <?php
                                 $select_cate= mysqli_query($conn,"SELECT * FROM categories ORDER BY id DESC");
                                    while ($row_cate = mysqli_fetch_assoc($select_cate)){
                                        ?>

                                        <li>
                                            <a href="category.php?category=<?php echo $row_cate['categoryName']?>">
                                                <span><i class="fas fa-tags"></i></span>
                                                <span><?php echo $row_cate['categoryName']?></span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="new-post">
                    <h4 class="text-center">احدث المنشورات</h4>
                    <ul>
                        <?php
                        $select_new= mysqli_query($conn,"SELECT * FROM new_posts ORDER BY id DESC LIMIT 3");
                        while ($row_new = mysqli_fetch_assoc($select_new)){
                            ?>
                                <li>
                                    <a href="post.php?id=<?php echo $row_new['id']?>">
                                        <span><img src="./assest/image/new_cate/<?php echo $row_new['image'];?>" class="img-fluid" ></span>
                                        <span><?php echo $row_new['title'];?></span>
                                    </a>
                                </li>
                            <?php
                        }
                        ?>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Post -->
<?php
    include './inc/footer.php';
?>
