<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

   Session_start();


if($_SESSION['c_log_username'] != 'Username'){
   if($_SESSION['s_log_username'] != ''){
   $s_username = $_SESSION['s_log_username'];
   }
   else{
   $_SESSION['s_log_username'] = 'FatinHannah';
   }
   
   echo $c_username = $_SESSION['c_log_username'];
   echo $s_username = $_SESSION['s_log_username'];
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $address = $_POST['address'];


   $customer_query = mysqli_query($conn, "SELECT CUST_ID FROM `customer` WHERE CUST_USERNAME = '$c_username'") or die('query failed');
   if(mysqli_num_rows($customer_query) > 0){
      while($customer_item = mysqli_fetch_assoc($customer_query)){  
         $custid = $customer_item['CUST_ID'];
      };
   };

   $staff_query = mysqli_query($conn, "SELECT STAFF_ID FROM `staff` WHERE STAFF_USERNAME = '$s_username'");
   if(mysqli_num_rows($customer_query) > 0){
      while($staff_item = mysqli_fetch_assoc($staff_query)){  
         $staffid = $staff_item['STAFF_ID'];
      };
   };

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['PRODUCT_NAME'] .' ('. $product_item['CART_QUANTITY'] .') ';
         $product_price = number_format($product_item['CART_PRICE'] * $product_item['CART_QUANTITY']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `payment`(CUST_ID, STAFF_ID,CUST_NAME, CUST_PHONE, CUST_EMAIL, PAYMENT_METHOD, ADDRESS, TOTAL_PRICE) VALUES('$custid','$staffid','$name','$number','$email','$method','$address','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : RM".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$address."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
         </div>
            <a href='menu.php' class='btn'>Okay</a>
         </div>
      </div>
      ";
   }
}
}
else{
   $message[] = 'you have to sign in!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/style2.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['CART_PRICE'] * $fetch_cart['CART_QUANTITY']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['PRODUCT_NAME']; ?>(<?= $fetch_cart['CART_QUANTITY']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : RM<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="text" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line</span>
            <input type="text" placeholder="enter your address" name="address" required>
         </div>
      </div>
      <input style="background-color: white;" type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script2.js"></script>
   
</body>
</html>