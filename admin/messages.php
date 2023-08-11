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
    <title>messages</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/
    E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==">


    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php'?>

<!-- messages section starts -->
   <section class="messages">
    <h1 class="heading"> new messages</h1>
      <div class="box-container">
        <?php
           $select_messages = $conn->prepare("SELECT * FROM 'messages'");
           $select_messages->execute();
           if($select_messages->rowCount() > 0){
            while($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)){

            }

           }else{
            echo '<p class="empty">you have no messages </p>';
           }

        ?>
<!-- messages section ends -->