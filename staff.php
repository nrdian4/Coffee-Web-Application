<?php

@include 'config.php';

if(isset($_POST['add_staff'])){

   $s_id = $_POST['s_id'];
   $s_username = $_POST['s_username'];
   $s_password = $_POST['s_password'];
   $s_name = $_POST['s_name'];
   $s_email = $_POST['s_email'];
   $s_phone = $_POST['s_phone'];

   $insert_query = mysqli_query($conn, "INSERT INTO `staff`(STAFF_ID, STAFF_USERNAME, STAFF_PASSWORD, STAFF_NAME, STAFF_EMAIL, STAFF_PHONE) VALUES('$s_id','$s_username', '$s_password','$s_name', '$s_email', '$s_phone')") or die('query failed');

   if($insert_query){
      $message[] = 'staff add succesfully';
   }else{
      $message[] = 'could not add the staff';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `staff` WHERE STAFF_ID = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:staff.php');
      $message[] = 'staff has been deleted';
   }else{
      header('location:staff.php');
      $message[] = 'staff could not be deleted';
   };
};

if(isset($_POST['update_staff'])){ 
   $update_s_id = $_POST['update_s_id'];
   $update_s_name = $_POST['update_s_name'];
   $update_s_username = $_POST['update_s_username'];
   $update_s_password = $_POST['update_s_password'];
   $update_s_email = $_POST['update_s_email'];
   $update_s_phone = $_POST['update_s_phone'];

   $update_query = mysqli_query($conn, "UPDATE `staff` SET STAFF_NAME = '$update_s_name', STAFF_USERNAME = '$update_s_username', STAFF_EMAIL = '$update_s_email', STAFF_PASSWORD = '$update_s_password', STAFF_PHONE = '$update_s_phone' WHERE STAFF_ID = '$update_s_id'");

   if($update_query){
      $message[] = 'staff updated succesfully';
      header('location:staff.php');
   }else{
      $message[] = 'staff could not be updated';
      header('location:staff.php');
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
   <h3>add a new staff</h3>
   <input type="text" name="s_id" placeholder="enter the staff id" class="box" required>
   <input type="text" name="s_name" placeholder="enter the staff name" class="box" required>
   <input type="text" name="s_username" placeholder="enter the staff username" class="box" required>
   <input type="text" name="s_password" placeholder="enter the staff password" class="box" required>
   <input type="text" name="s_email" placeholder="enter the staff email" class="box" required>
   <input type="text" name="s_phone" placeholder="enter the staff phone" class="box" required>
   <input type="submit" value="add the staff" name="add_staff" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>id</th>
         <th>name</th>
         <th>username</th>
         <th>password</th>
         <th>email</th>
         <th>phone</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_staff = mysqli_query($conn, "SELECT * FROM `staff`");
            if(mysqli_num_rows($select_staff) > 0){
               while($row = mysqli_fetch_assoc($select_staff)){
         ?>

         <tr>
            <td><?php echo $row['STAFF_ID']; ?></td>
            <td><?php echo $row['STAFF_NAME']; ?></td>
            <td><?php echo $row['STAFF_USERNAME']; ?></td>
            <td><?php echo $row['STAFF_PASSWORD']; ?></td>
            <td><?php echo $row['STAFF_EMAIL']; ?></td>
            <td><?php echo $row['STAFF_PHONE']; ?></td>
            <td>
               <a href="staff.php?delete=<?php echo $row['STAFF_ID']; ?>" class="btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="staff.php?edit=<?php echo $row['STAFF_ID']; ?>" class="btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>


         <?php
            };    
            }else{
               echo "<div class='empty'>no staff added</div>";
            };
         ?>

      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php 
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `staff` WHERE STAFF_ID = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_s_id" value="<?php echo $fetch_edit['STAFF_ID']; ?>">
      <input type="text" class="box" required name="update_s_name" value="<?php echo $fetch_edit['STAFF_NAME']; ?>">
      <h1>Username:</h1>
      <input type="text" class="box" required name="update_s_username" value="<?php echo $fetch_edit['STAFF_USERNAME']; ?>">
      <h1>Password:</h1>
      <input type="text" class="box" required name="update_s_password" value="<?php echo $fetch_edit['STAFF_PASSWORD']; ?>">
      <h1>Email:</h1>
      <input type="text" class="box" required name="update_s_email" value="<?php echo $fetch_edit['STAFF_EMAIL']; ?>">
      <h1>Phone:</h1>
      <input type="text" class="box" required name="update_s_phone" value="<?php echo $fetch_edit['STAFF_PHONE']; ?>">
      <input type="submit" value="update the staff" name="update_staff" class="btn">
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