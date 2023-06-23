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
    <title>products</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/
    E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==">


    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php'?>

<!-- add products section starts -->
<section class="add-products">

   <h1 class="heading">add product</h1>

   <form action="" method="POST" encytype="multipart/form-data">
  
        <div class="flex">
            <div class="inputBox">
                <span>product name (required) </span>
                <input type="text" required placeholder="enter product name"
                name="name" maxlength="100" class="box">
            </div>

            <div class="inputBox">
                <span>product price (required) </span>
                <input type="number" min="0" max="9999999999" required placeholder="enter product price"
                name="price" onkeypress="if(this.value.length == 10) return false;" class="box">
            </div>
            <div class="inputBox">
                <span>image 01 (required) </span>
                <input type="file" name="image_01" class="box" accept="image/jpg,
                 image/jpeg, image/png, image/webp" required>
            </div>
            <div class="inputBox">
                <span>image 02 (required) </span>
                <input type="file" name="image_01" class="box" accept="image/jpg,
                 image/jpeg, image/png, image/webp" required>
            </div>
            <div class="inputBox">
                <span>image 03 (required) </span>
                <input type="file" name="image_01" class="box" accept="image/jpg,
                 image/jpeg, image/png, image/webp" required>
            </div>
            <div class="inputBox">
                <span>product details</span>
                <textarea name="details" class="box"placeholder="enter product details" required 
                maxlength="500" cols="30" rows="10"></textarea>
            </div>
            <input type="submit" value="add product" name="add_product" class="btn">
</div>
</form>
</section>  
       


<!-- add products section ends -->

<!-- show products section starts -->

<section class="show-products">
<div class="box-container">



 <?php
$show_product = $conn->prepare("SELECT * FROM 'products'");
 $show_products->execute();
 if($show_products>rowCount() > 0){

 }else{
    echo '<p class="empty"> no products added yet!</p>';
 }
 ?>

</div>
</section>
<!-- show products section ends -->