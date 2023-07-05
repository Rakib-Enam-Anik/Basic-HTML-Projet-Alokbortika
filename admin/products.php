<?php 
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin_login.php');
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_product_image = $conn->prepare("SELECT * FROM 'products' WHERE id = ?");
    $delete_product_image->execute([$delete_id]);
    $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
    $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
    unlink('../upload_img/'.$fetch_delete_image['image_01']);
    unlink('../upload_img/'.$fetch_delete_image['image_02']);
    unlink('../upload_img/'.$fetch_delete_image['image_03']);
    $delete_product = $conn->prepare("DELETE FROM 'products' WHERE id = ?");
    $delete_product->execute([$delete_id]);
    $delete_product = $conn->prepare("DELETE FROM 'cart' WHERE pid = ?");
    $delete_product->execute([$delete_id]);
    $delete_product = $conn->prepare("DELETE FROM 'wishlist' WHERE pid = ?");
    $delete_product->execute([$delete_id]);
    header('location:products.php');
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
                <input type="file" name="image_02" class="box" accept="image/jpg,
                 image/jpeg, image/png, image/webp" required>
            </div>
            <div class="inputBox">
                <span>image 03 (required) </span>
                <input type="file" name="image_03" class="box" accept="image/jpg,
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

<section class="show-products" style="padding-top: ">
    <h1 class="heading">products added </h1>
<div class="box-container">



 <?php
$show_product = $conn->prepare("SELECT * FROM 'products'");
 $show_products->execute();
 if($show_products>rowCount() > 0){
    while($fetch_products = $show_product->fetch(PDO::FETCH_ASSOC)){
        ?>
    <div class="box">
        <img src="../uploaded_img/<?= $fetch_pproducts['image_01']; ?>" alt="">
        <div class="name"><?= $fetch_products['name']; ?></div>
        <div class="price"><?= $fetch_products['price']; ?></div>
        <div class="details"><?= $fetch_products['details']; ?></div>
        <div class="flex-btn">
            <a href="update_product.php?update=<?= $fetch_products['id']; ?>"
            class="option-btn">update</a>
            <a href="update_product.php?update=<?= $fetch_products['id']; ?>"
            class="option-btn" onclick="return confirm('delete this product?');">delete</a>
    </div>
    </div>


    }

 }else{
    echo '<p class="empty"> no products added yet!</p>';
 }
 ?>

</div>
</section>
<!-- show products section ends -->