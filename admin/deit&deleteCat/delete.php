
<?php
 include '../incloud/connction.php';
 
 coonect();

    $id = $_GET['id'];
    $delete = mysqli_query($conn,"DELETE FROM categories WHERE id='$id'");
    if($delete){
        ?>
        <div class="alert alert-success col-md-12 text-center form-control">تم حذف التصنيف بنجاح</div>
        <meta http-equiv="refresh" content="1;url=../index.php">
        <?php
    }
    $id_post = $_GET['id'];
    $delete_pos = mysqli_query($conn,"DELETE FROM new_posts WHERE id='$id_post'");
    if($delete_pos){
        ?>
         
        <meta http-equiv="refresh" content="1;url=../index.php">
        <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- File Bootstrab Link -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>حذف التصنيف</title>
</head>
<body>
    
</body>
</html>