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
    <title>admins accounts</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/
    E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==">


    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php'?>

<!-- admins accounts section starts -->

    <section class="accounts">
        <h1 class="heading">admins accounts</h1>
        <div class="box-container">
            <?php
            $select_account = $conn->prepare("SELECT * FROM 'admins'");
            $select_account->execute();
            if($select_account->rowCount() ? ){
                while($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <div class="box">
                    <p>admin id: <?= $fetch_accounts['id']; ?> </p>
                    <p> user name : <?= $fetch_accounts['user name']; ?> </p>
                    </div>
                    <?php

                }
                
            }else{
                echo '<p class="empty">no accounts available</p>';
            }

            ?>


        

<!-- admins accounts section ends -->
