<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   session_start();
   echo $c_username = $_SESSION['c_log_username'];
   $product_code = $_POST['product_code'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE PRODUCT_NAME = '$product_name'");

if($c_username != 'Username'){
   $customer_query = mysqli_query($conn, "SELECT * FROM `customer` WHERE CUST_USERNAME= '$c_username'") or die('query failed');
   if(mysqli_num_rows($customer_query) > 0){
      while($customer_item = mysqli_fetch_assoc($customer_query)){  
         $custid = $customer_item['CUST_ID'];
      };

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{

      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(CUST_ID, PRODUCT_CODE,PRODUCT_NAME, CART_PRICE, CART_IMAGE, CART_QUANTITY) VALUES('$custid','$product_code', '$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }
}

   }
else{

      $message[] = 'you have to log in!';
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

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

<?php include 'header.php'; ?>

<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container menu">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `product`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['PRODUCT_IMAGE']; ?>" alt="">
            <h3><?php echo $fetch_product['PRODUCT_NAME']; ?></h3>
            <div class="price">RM<?php echo $fetch_product['PRODUCT_PRICE']; ?>/-</div>
            <input type="hidden" name="product_code" value="<?php echo $fetch_product['PRODUCT_CODE']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['PRODUCT_NAME']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['PRODUCT_PRICE']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['PRODUCT_IMAGE']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script2.js"></script>

</body>
</html>