<?php

@include 'config.php';

Session_start();

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `customer` WHERE CUST_ID = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:profile.php');
      $message[] = 'customer has been deleted';
   }else{
      header('location:profile.php');
      $message[] = 'customer could not be deleted';
   };
};

if(isset($_POST['update_customer'])){ 

   $update_c_id = $_POST['update_c_id'];
   $update_c_name = $_POST['update_c_name'];
   $update_c_username = $_POST['update_c_username'];
   $update_c_password = $_POST['update_c_password'];
   $update_c_address = $_POST['update_c_address'];
   $update_c_email = $_POST['update_c_email'];
   $update_c_phone = $_POST['update_c_phone'];

   $update_query = mysqli_query($conn, "UPDATE `customer` SET CUST_NAME = '$update_c_name', CUST_USERNAME = '$update_c_username',CUST_PASSWORD = '$update_c_password',  ADDRESS = '$update_c_address', CUST_EMAIL = '$update_c_email', CUST_PHONE = '$update_c_phone' WHERE CUST_ID = '$update_c_id'");

   if($update_query){
      $_SESSION['c_log_username'] = $update_c_username;
      $message[] = 'customer updated succesfully';
      header('location:profile.php');
   }else{
      $message[] = 'customer could not be updated';
      header('location:profile.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/style2.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<!-- header section starts  -->

<?php include 'header.php'; ?>

<!-- header section ends -->


<div class="container">

<br></br>
<br></br>
<br></br>

<section class="display-product-table" style="font-size:250%; background-image: url(../image/home2.png) no-repeat;">



         <?php
            $c_username = $_SESSION['c_log_username'];
            $select_customer = mysqli_query($conn, "SELECT * FROM `customer`WHERE CUST_USERNAME = '$c_username'") or die('query failed');
            if(mysqli_num_rows($select_customer) > 0){
               while($row = mysqli_fetch_assoc($select_customer)){
         ?>


            <H3>Customer's Profile:</H3>
        <br>
         <span>name: </span>
            <span><?php echo $row['CUST_NAME']; ?></span>
        </br>
        <br>
         <span>username:</span>
            <span><?php echo $row['CUST_USERNAME']; ?></span>
        </br>
        <br>
         <span>password:</span>
            <span><?php echo $row['CUST_PASSWORD']; ?></span>
        </br>
        <br>
         <span>address:</span>
            <span><?php echo $row['ADDRESS']; ?></span>
        </br>
        <br>
         <span>email:</span>
            <span><?php echo $row['CUST_EMAIL']; ?></span>
         </br>
         <br>
         <span>phone:</span>
            <span><?php echo $row['CUST_PHONE']; ?></span>
         </br>
        <br>
            <span>
               <a href="profile.php?edit=<?php echo $row['CUST_ID']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
            </span>

            <span>
               <a href="index.php" class="btn" name="logout">Log Out </a>
            </span>
        </br>



         <?php
            };    
            }else{
               ?>
               <br></br>
               <?php
               echo "<div class='empty'>no customer</div>";
            ?>
            <span>
               <a href="loginform.php" class="btn" name="Login">Log In </a>
            </span>
            <?php
            };
         ?>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `customer` WHERE CUST_ID = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_c_id" value="<?php echo $fetch_edit['CUST_ID']; ?>">
      <input type="text" class="box" required name="update_c_name" value="<?php echo $fetch_edit['CUST_NAME']; ?>">
      <h1>Username:</h1>
      <input type="text" class="box" required name="update_c_username" value="<?php echo $fetch_edit['CUST_USERNAME']; ?>">
      <h1>Password:</h1>
      <input type="text" class="box" required name="update_c_password" value="<?php echo $fetch_edit['CUST_PASSWORD']; ?>">
      <h1>Address:</h1>
      <input type="text" class="box" required name="update_c_address" value="<?php echo $fetch_edit['ADDRESS']; ?>">
      <h1>Email:</h1>
      <input type="text" class="box" required name="update_c_email" value="<?php echo $fetch_edit['CUST_EMAIL']; ?>">
      <h1>Phone:</h1>
      <input type="text" class="box" required name="update_c_phone" value="<?php echo $fetch_edit['CUST_PHONE']; ?>">
      <input type="submit" value="Edit" name="update_customer" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>
</div>

<!-- custom js file link  -->
<script src="js/script2.js"></script>

</body>
</html>
