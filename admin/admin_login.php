<?php 
include '../components/connect.php';

session_start();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $name = filter_var($name,)
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

<!-- admin login form section atarts -->
<section class="form-container">
    <form action="" method="POST">
        <h3>login now</h3>
        <p>default username = <span>admin</span> & password = <span>111</span></p>
        <input type="text" name="name" maxlength="20" required
        placeholder="enter your username" class="box" oninput="this.value = 
        this.value.replace(/\s/g, '')">

        <input type="password" name="pass" maxlength="20" required
        placeholder="enter your password" class="box" oninput="this.value = 
        this.value.replace(/\s/g, '')">
        <input type="submit" value="login now"  name="submit" class="btn">
    </form>






    
</body>
</html>