<?php 
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin_login.php');
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_users = $conn->prepare("DELETE FROM 'userss' WHERE id = ?");
    $delete_users ->execute([$delete_id]);
    header('location:users_accounts.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users accounts</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/
    E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==">


    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php'?>

<!-- users accounts section starts -->

<section class="accounts">
        <h1 class="heading">admins accounts</h1>
        <div class="box-container">
            <div class="box">
                <p>register new admin</p>
                <a href="register_admin.php" class="option-btn">register</a>
            </div>
            <?php
            $select_account = $conn->prepare("SELECT * FROM 'admins'");
            $select_account->execute();
            if($select_account->rowCount() ? ){
                while($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <div class="box">
                    <p> admin id: <span><?= $fetch_accounts['id']; ?></span> </p>
                    <p> username : <span><?= $fetch_accounts['name']; ?> </span></p>
                     <div class="flex-btn">
                     <a href="admin_accounts.php?delete=<?= $fetch_accounts['id']; ?>"
                     class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
                    
                     <?php
                     if($fetch_accounts['id'] == $admin_id){
                        echo ' <a href="update_profile.php" class="option-btn">update</a>';
                     }

                    </div>
                    <?php

                }
                
            }else{
                echo '<p class="empty">no accounts available</p>';
            }

            ?>


        

<!-- users accounts section ends -->
