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
    <title>login</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/
    E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==">


    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- register admin sections starts -->

<section class="form-container">
    <form action="" method="POST">
        <h3>update profile </h3>

        <input type="hidden" name="prev_pass" value="<?=$fetch_profile['password']; ?>">

        <input type="text" name="name" maxlength="20" required
        placeholder="enter your username" class="box" oninput="this.value = 
        this.value.replace(/\s/g, '')">

        <input type="password" name="new_pass" maxlength="20" required
        placeholder="enter your new password" class="box" oninput="this.value = 
        this.value.replace(/\s/g, '')">

        <input type="password" name="confirm_pass" maxlength="20" required
        placeholder="confirm your new password" class="box" oninput="this.value = 
        this.value.replace(/\s/g, '')">
        <input type="submit" value="update now"  name="submit" class="btn">
    </form>

<!-- register admin section ends -->


<!-- custom js file link -->
<script src="../js/admin_script.js"></script>

</body>
</html>