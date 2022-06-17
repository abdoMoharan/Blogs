<?php
// include 'connction.php';

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
 
    
    <title>لوحه التحكم</title>
</head>
<body>
 <div class="container-fluid">
    <div class="dashbord">
        <div class="row">
            <div class="col-md-2 content" id="side-area">
              <div class="">
                <h4>لوحه التحكم</h4>
                <ul>
                    <li>
                        <a href="index.php">
                            <span><i class="fas fa-tags"></i></span>
                            <span>التصنيفات</span>
                        </a>
                    </li>
                    <!-- Start Articles -->
                    <li data-bs-toggle="collapse" data-bs-target="#menu">
                        <a href="add.php">
                            <span><i class="fas fa-newspaper"></i></span>
                            <span>المقالات</span>
                        </a>
                    </li>
                    <ul class="collapse" id="menu">
                        <li>
                            <a href="add.php">
                                <span<i class="fas fa-edit"></i></span>
                                <span>مقال جديد</span>
                            </a>
                        </li>
                        <li>
                            <a href="view_categoray.php">
                                <span><i class="fas fa-th-large"></i></span>
                                <span>كل المقالات</span>
                            </a>
                        </li>
                    </ul>
                    <!-- End Articles -->

                    <li>
                        <a href="../index_blog.php" target="_blank">
                            <span><i class="fas fa-window-restore"></i></span>
                            <span>عرض الموقع</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <span><i class="fas fa-sign-out-alt"></i></span>
                            <span>تسجيل الخروج</span>
                        </a>
                    </li>
                </ul>
              </div>
            </div>