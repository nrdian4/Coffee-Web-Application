<header class="header">

      <div id="menu-btn" class="fas fa-bars"></div>

    <a href="#" class="logo"> coffee <i class="fas fa-mug-hot"></i> </a>

      <nav class="navbar">
        <a href="homepage.php#home">home</a>
        <a href="homepage.php#about">about</a>
        <a href="menu.php">menu</a>
        <a href="homepage.php#review">feedback</a>
        <a href="homepage.php#contact">contact us</a>
      </nav>

      <?php


      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>


      <a href="profile.php" class="btn" style="margin-right: -140px;">profile</span></a>
      <a href="cart.php" class="btn">cart <span><?php echo $row_count; ?></span></a>

      <div id="menu-btn" class="fas fa-bars"></div>

</header>