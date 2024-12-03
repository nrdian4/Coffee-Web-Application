<?php

@include 'config.php';

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `customer` WHERE CUST_ID = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:customer.php');
      $message[] = 'customer has been deleted';
   }else{
      header('location:customer.php');
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

   $update_query = mysqli_query($conn, "UPDATE `customer` SET CUST_NAME = '$update_c_name', CUST_USERNAME = '$update_c_username', CUST_PASSWORD = '$update_c_password', ADDRESS = '$update_c_address', CUST_EMAIL = '$update_c_email', CUST_PHONE = '$update_c_phone' WHERE CUST_ID = '$update_c_id'");

   if($update_query){
      $message[] = 'customer updated succesfully';
      header('location:customer.php');
   }else{
      $message[] = 'customer could not be updated';
      header('location:customer.php');
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

<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a href="#" class="logo"> coffee <i class="fas fa-mug-hot"></i> </a>

    <nav class="navbar">
        <a href="admin.php">product</a>
        <a href="customer.php">customer</a>
        <a href="staff.php">staff</a>
        <a href="index.php">Log out</a>
    </nav>

</header>

<!-- header section ends -->


<div class="container">

<br></br>
<br></br>
<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Search for customer</h3>
   <input type="text" name="c_id" placeholder="enter the customer id" class="box" required>
   <input type="text" name="c_name" placeholder="enter the customer name" class="box" required>
   <input type="submit" value="Search" name="search" class="btn">
</form>

</section>

<?php
if(isset($_POST['search'])){

   ?>

<section class=display-product-table style="font-size:250%; text-align: center;">

         <?php


         $c_id = $_POST['c_id'];
         $c_name = $_POST['c_name'];
         
            $select_customer = mysqli_query($conn, "SELECT * FROM `customer` WHERE CUST_ID = '$c_id' AND CUST_NAME = '$c_name'");
            if(mysqli_num_rows($select_customer) > 0){
               while($row = mysqli_fetch_assoc($select_customer)){
         ?>
         
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

               <a href="customer.php?delete=<?php echo $row['CUST_ID']; ?>" class="btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>

         <?php
            } 
         } else{
               echo "<div class='empty'>no customer</div>";
            };
      };
?>

</section>

<?php
?>

<section class="display-product-table">

   <table style="font-size:1.5rem;">

      <thead>
         <th>id</th>
         <th>name</th>
         <th>username</th>
         <th>password</th>
         <th>address</th>
         <th>email</th>
         <th>phone</th>
      </thead>

      <tbody>
         <?php
         
            $select_customer = mysqli_query($conn, "SELECT * FROM `customer`");
            if(mysqli_num_rows($select_customer) > 0){
               while($row = mysqli_fetch_assoc($select_customer)){
         ?>

         <tr>
            <td><?php echo $row['CUST_ID']; ?></td>
            <td><?php echo $row['CUST_NAME']; ?></td>
            <td><?php echo $row['CUST_USERNAME']; ?></td>
            <td><?php echo $row['CUST_PASSWORD']; ?></td>
            <td><?php echo $row['ADDRESS']; ?></td>
            <td><?php echo $row['CUST_EMAIL']; ?></td>
            <td><?php echo $row['CUST_PHONE']; ?></td>
         </tr>


         <?php
            };    
            }else{
               echo "<div class='empty'>no customer</div>";
            };

         ?>

      </tbody>
   </table>

</section>
</div>

<!-- custom js file link  -->
<script src="js/script2.js"></script>

</body>
</html>
