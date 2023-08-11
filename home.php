<?php
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">

</head>






<!-- custom js link -->
<script src="js/script.js"></script>

<body>

<?php include 'components/user_header.php'; ?>

<div class="home-bg">
    <section class="swiper home">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/home-img-1.png" alt="">
</div>
<div class = "content">
    <span>upto 50% off </span>
    <h3>latest smartphone </h3>
    <a href = "shop.php" class="btn">Shop now</a>
</div>
</div>
</div>
</section>
</div>

<!-- home category section starts -->

<section class="home-category">
    <h1 class="heading"> shop by category </h1>
    <div class="category-slide">
        <div class="w">
            <a href="category.php?category=laptop" class="slide">
                <img src="images/icon-1.png" alt="">
                <h3>laptop</h3>
</a>

<a href="category.php?category=tv" class="slide">
                <img src="images/icon-2.png" alt="">
                <h3>laptop</h3>
</a>

<a href="category.php?category=camera" class="slide">
                <img src="images/icon-3.png" alt="">
                <h3>camera</h3>
</a>
<a href="category.php?category=mouse" class="slide">
                <img src="images/icon-4.png" alt="">
                <h3>mouse</h3>
</a>

<a href="category.php?category=fridge" class="slide">
                <img src="images/icon-5.png" alt="">
                <h3>fridge</h3>
</a>
</div>
</div>


<!-- home category sections ends -->

<!-- home products section starts -->
<section class="home-products">
    <h1 class="heading">latest products</h1>
    <div class="products-slider">
        <div class="w">
            <p class="empty">no products added yet!</p>
            <?php
            $select_products = $conn->prepare("SELECT * FROM 'products' LIMIT 6");
            $select_products->execute();
            if($select_products->rowCount() > 0){
                while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
             ?>

             <form action="" method="post" class="slide">
                <button type="submit" name="add_to_wisht" class="fas fa-heart"></button>
                <a href="quick_view.php?pid=<?= $fetch_products["id"]; ?>" class="fas fa-eye"></a>
                <img src="uploaded_img/<?= $fetch_products['image_01']; ?>" class="image" alt="">
                <div class="name"><?= $fetch_products['name']; ?></div>
                <div class="flex">
                    <div class="price">$<span><?= $fetch_products['price']; ?></span>/-</div>
                </div>
             <?php 
                }
            }else{
                echo '<p class="empty"> no products added yet!</p>';
            }
            $select_products

            ?>
        </div>
</div>


<!-- home products section ends -->
































<?php include 'components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- custom js file link -->

<script src="js/"></script>
<script>
    var swiper = new Swiper(".home-slider", {
        pagination: {
            el: ".swiper-pagination",
        },
    });
    
</body>
</html>