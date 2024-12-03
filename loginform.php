<?php

@include 'config.php';

if(isset($_POST['sign_up'])){

   $c_username = $_POST['c_username'];
   $c_password = $_POST['c_password'];
   $c_name = $_POST['c_name'];
   $c_address = $_POST['c_address'];
   $c_email = $_POST['c_email'];
   $c_phone = $_POST['c_phone'];

   $customer = mysqli_query($conn, "SELECT * FROM `customer` WHERE CUST_EMAIL = '$c_email'");
   if(mysqli_num_rows($customer) > 0){

          $message[] = 'Email already existed';
}
else{
   $insert_query = mysqli_query($conn, "INSERT INTO `customer`(CUST_USERNAME, CUST_PASSWORD, CUST_NAME, ADDRESS, CUST_EMAIL, CUST_PHONE) VALUES('$c_username','$c_password', '$c_name', '$c_address', '$c_email', '$c_phone')") or die('query failed');

   if($insert_query){
      $message[] = 'sign up successfull';

   }else{
      $message[] = 'could not sign up';
   }
  };
};

if(isset($_POST['login'])){

   $c_log_username = $_POST['c_log_username'];
   $c_log_password = $_POST['c_log_password'];

   $login_query = mysqli_query($conn, "SELECT * FROM `customer` WHERE CUST_USERNAME = '$c_log_username' AND CUST_PASSWORD = '$c_log_password'");

 if ($c_log_username != "" && $c_log_password != ""){

        $sql_query = "select count(*) as cntUser from customer where CUST_USERNAME ='".$c_log_username."' and CUST_PASSWORD='".$c_log_password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
          session_start();
          $_SESSION['c_log_username'] = $c_log_username;
          $message[] = 'login successfull';
          header('location:homepage.php');
        }
        else{
          $message[] = 'could not login';
        }
  }
};

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login & Signup Form Customer</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
  	@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background-position: center;
}
::selection{
  color: #fff;
}
.wrapper{
  overflow: hidden;
  max-width: 390px;
  background: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title-text{
  display: flex;
  width: 200%;
}
.wrapper .title{
  width: 50%;
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.wrapper .slide-controls{
  position: relative;
  display: flex;
  height: 50px;
  width: 100%;
  overflow: hidden;
  margin: 30px 0 10px 0;
  justify-content: space-between;
  border: 1px solid lightgrey;
  border-radius: 5px;
}
.slide-controls .slide{
  height: 100%;
  width: 100%;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  text-align: center;
  line-height: 48px;
  cursor: pointer;
  z-index: 1;
  transition: all 0.6s ease;
}
.slide-controls label.signup{
  color: #000;
}
.slide-controls .slider-tab{
  position: absolute;
  height: 100%;
  width: 50%;
  left: 0;
  z-index: 0;
  border-radius: 5px;
  background: -webkit-linear-gradient(left, #e4d6c0, #b29781);
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
input[type="radio"]{
  display: none;
}
#signup:checked ~ .slider-tab{
  left: 50%;
}
#signup:checked ~ label.signup{
  color: #fff;
  cursor: default;
  user-select: none;
}
#signup:checked ~ label.login{
  color: #000;
}
#login:checked ~ label.signup{
  color: #000;
}
#login:checked ~ label.login{
  cursor: default;
  user-select: none;
}
.wrapper .form-container{
  width: 100%;
  overflow: hidden;
}
.form-container .form-inner{
  display: flex;
  width: 200%;
}
.form-container .form-inner form{
  width: 50%;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.form-inner form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
}
.form-inner form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 15px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  border-bottom-width: 2px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.form-inner form .field input:focus{
  border-color: #b29781;
  /* box-shadow: inset 0 0 3px #fb6aae; */
}
.form-inner form .field input::placeholder{
  color: #999;
  transition: all 0.3s ease;
}
form .field input:focus::placeholder{
  color: #b3b3b3;
}
.form-inner form .pass-link{
  margin-top: 5px;
}
.form-inner form .signup-link{
  text-align: center;
  margin-top: 30px;
}
.form-inner form .pass-link a,
.form-inner form .signup-link a{
  color: #c8853c;
  text-decoration: none;
}
.form-inner form .pass-link a:hover,
.form-inner form .signup-link a:hover{
  text-decoration: underline;
}
form .btn{
  height: 50px;
  width: 100%;
  border-radius: 5px;
  position: relative;
  overflow: hidden;
}
form .btn .btn-layer{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #e4d6c0, #b29781, #e4d6c0, #b29781);
  border-radius: 5px;
  transition: all 0.4s ease;;
}
form .btn:hover .btn-layer{
  left: 0;
}
form .btn input[type="submit"]{
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  background: none;
  border: none;
  color: #fff;
  padding-left: 0;
  border-radius: 5px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
}

  </style>
  <body>

    <header>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"> X </i> </div>';
   };
};?>

    </header> 



        <br></br>
    <div class="wrapper">
      <div class="title" style="font-size:30px; margin-left: 25%; margin-right: 55%;">Customer</div>
      <div class="title-text">
        <div class="title login">Login Form</div>
        <div class="title signup">Signup Form</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form action="" method="post" class="login">
            <div class="field">
              <input type="text" name="c_log_username"  placeholder="Username" required>
            </div>
            <div class="field">
              <input type="password" name="c_log_password" placeholder="Password" required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" name="login" value="Login">
            </div>
            <div class="signup-link">Not a member? <a href="">Signup now</a></div>
          </form>
          <form action="#" method="post" class="signup">
            <div class="field">
              <input type="text" name="c_username" placeholder="Username" required>
            </div>
            <div class="field">
              <input type="password" name="c_password" placeholder="Password" required>
            </div>
            <div class="field">
              <input type="text" name="c_name" placeholder="Name" required>
            </div>
            <div class="field">
              <input type="text" name="c_address" placeholder="Address" required>
            </div>
            <div class="field">
              <input type="text" name="c_email" placeholder="Email" required>
            </div>
            <div class="field">
              <input type="text" name="c_phone" placeholder="Phone Number" required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Signup" name="sign_up">
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
    </script>

  </body>
</html>