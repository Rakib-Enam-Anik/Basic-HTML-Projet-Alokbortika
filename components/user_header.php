<?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
        <span>'.$message.'</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>


<header class="header">
    <section class="flex">
    <a href="dashboard.php" class="logo"><span>S</span></a>
    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="about.php">about</a>
        <a href="orders.php">orders</a>
        <a href="shop.php">shop</a>
        <a href="contact.php">contact</a>
        <a href="messages.php">messages</a>
    </nav>

    <div class="icons">
        <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM 'wishlist'
            WHERE user_id = ?");
            $count_wishlist_items->execute($user_id);
            $total_wishlist_items = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM 'cart'
            WHERE user_id = ?");
            $count_cart_items->execute($user_id);
            $total_cart_items = $count_cart_items->rowCount();
        ?>
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href ="search_page.php"><i class="fas fa-search"></i></a>
        <a href="wishlist.php"><i class="fas fa-heart"><span>(<?=
        $count_wishlist_items; ?>)</span></a>
        <a href="wishlist.php"><i class="fas fa-heart"><span>(<?=
        $count_wishlist_items; ?>)</span></a>
        <div id="user-btn" class="fas fa-user"><div>
    </div>
    <div class="profile">
        <?php
        $select_profile = $conn->prepare("SELECT * FROM 'admins' WHERE id = ?");
        $select_profile->execute([$user_id]);
        if($select_profile->rowCount() > 0){

            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
        }
        
        ?>
        <p><?= $fetch_profile['name']; ?></p>
        <a href="update_profile.php" class="btn">update profile</a>
        <div class="flex-btn">
            <a href="admin_login.php" class="option-btn">login</a>
            <a href="admin_login.php" class="option-btn">register</a>
         </div>
            <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');"
            class="delete-btn">logout</a>
            <?php
            }else{

        
            ?>
            <p> please login first ! </p>
            <div class="flex-btn">
            <a href="admin_login.php" class="option-btn">login</a>
            <a href="admin_login.php" class="option-btn">register</a>
         </div>
            <?php
                }
            ?>

</div>
<a href="../components/admin_logout.php" class="delete-btn">logout</a>
</section>
</header>