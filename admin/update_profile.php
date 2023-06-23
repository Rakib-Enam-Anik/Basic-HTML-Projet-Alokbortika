<?php 
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin_login.php');
};

if(isset($_POST['add_product'])){
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);
    $details = $_POST['details'];
    $details = filter_var($details, FILTER_SANITIZE_STRING);

    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
    $image_01_size = $_FILES['image_01']['size'];
    $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
    $image_01_folder = '../upload_img/'.$image_01;

    $image_02 = $_FILES['image_02']['name'];
    $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
    $image_02_size = $_FILES['image_02']['size'];
    $image_02_tmp_name = $_FILES['image_02']['tmp_name'];
    $image_02_folder = '../upload_img/'.$image_02;

    $image_03 = $_FILES['image_03']['name'];
    $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
    $image_03_size = $_FILES['image_03']['size'];
    $image_03_tmp_name = $_FILES['image_03']['tmp_name'];
    $image_03_folder = '../upload_img/'.$image_03;

    $select_products = $conn->prepare("SELECT * FROM 'products' WHERE name = ? ");
    $select_products->execute([$name]);

    if($select_products->rowCount() > 0){
        $message[] = 'product name already exists!';
    }else{
        $insert_product = $conn->prepare("INSERT INTO 'products'(name, details, price, image_01, image_02, image_03) ")
        VALUES(?,?,?,?));
    }
}

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $update_name = $conn->prepare("UPDATE 'admins' SET name = ? WHERE id = ?");
    $update_name-> execute([$name, $admin_id]);

    $empty_pass = '';
    $select_old_pass = $conn->prepare("SELECT password FROM `admins` WHERE id = ?");
    $select_old_pass->execute([$admin_id]);
    $fetch_prev_pass = $select_old_pass->fetch(PDO::FETCH_ASSOC);
    $prev_pass = $fetch_prev_pass['password'];
    $old_pass = sha1($_POST['old_pass']);
    $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
    $new_pass = sha1($_POST['new_pass']);
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    $confirm_pass = sha1($_POST['confirm_pass']);
    $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);  

    if($old_pass == $empty_pass){
        $message[] = 'please enter old password!';
    }elseif($old_pass != $new_pass){
        $message[] = 'old password not matched!';
    }elseif($new_pass != $confirm_pass){
        $message[] = 'confirm password not matched! ';
    }else{
        if($new_pass != $empty_pass){
            $update_pass = $conn->preppare("UPDATE 'admins' SET password = ?
            WHERE id = ?");
            $update_pass->execute([$confirm_pass, $admin_id]);
            $message[] = 'password update successfully!';
        }else{
            $message[] = 'please enter the new password!';
        }
    }

}
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