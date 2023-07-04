<?php 
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin_login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update product</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/
    E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==">


    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php'?>

<!-- update product section starts -->

<section class="update-product">
    <h1 class="heading">update product</h1>

<?php 
    
     $update_id = $_GET['update'];
     $show_products = $conn->prepare("SELECT * FROM 'products' WHERE id = ?");
     $show_products->execute([$update_id]);
     if($show_products->rowCount() > 0){
        while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){
     
     ?>
     <form action="" method="POST" enctype="multipart/form-data">
        <div class="image-container">
            <div class="main-image">
                <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="">
        </div>
        <div class="sub-images">
        <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="">
        <img src="../uploaded_img/<?= $fetch_products['image_02']; ?>" alt="">
        <img src="../uploaded_img/<?= $fetch_products['image_03']; ?>" alt="">
        <img src="../uploaded_img/<?= $fetch_products['image_04']; ?>" alt="">
        </div>
        </div>
        <span>update name</span>
        <input type="text" required placeholder="enter product name"
                name="name" maxlength="100" class="box" value="<?= $fetch_products['name']; ?>">
        <span>update price</span>
        <input type="number" min="0" max="9999999999" required placeholder="enter product price"
                name="price" onkeypress="if(this.value.length == 10) return false;" class="box" 
                value="<?= $fetch_products['price']; ?>">
                <span>update details</span>
                <textarea name="details" class="box" placeholder="enter product details" required 
                maxlength="500" cols="30" rows="10"><?= $fetch_products['details']; ?> </textarea>
                <span> update image 01 </span>
                <input type="file" name="image_01" class="box" accept="image/jpg,
                 image/jpeg, image/png, image/webp" required>
                 <span> update image 02 </span>
                 <input type="file" name="image_02" class="box" accept="image/jpg,
                 image/jpeg, image/png, image/webp" required>
                 <span> update image 03 </span>
                 <input type="file" name="image_03" class="box" accept="image/jpg,
                 image/jpeg, image/png, image/webp" required>
                 <div class="flex-btn">
                    <input type="submit" value="update" class="btn" name="submit">
                    <a href="products.php" class="option-btn">go back</a>
        </div>
        </form>
    <?php
        }
    }
    else{
        echo '<p class="empty"> no products added yet! </p>';
    }

     </section>

<!-- update product ssection ends -->











<!-- custom js file link -->

<script src="../js/admin_script.js"></script>
</body>