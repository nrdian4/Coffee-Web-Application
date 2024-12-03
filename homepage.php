<?php

@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee website</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="CSS/style.css">

</head>
<body>
    
<!-- header section starts  -->

<?php include 'header.php'; ?>


<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="row">

        <div class="content">
            <h3>Freshly <br>Made Coffee</h3>
            <a style="background-color: white;" href="index.php" class="btn">welcome!</a>
        </div>

    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> about us <!--<span>why choose us</span>--> </h1>    

    <div class="row">

        <div class="image">
            <img src="image/about-us.jpg" alt="">
        </div>

        <div class="content">
            <h3 class="title">How Our Coffee Shop Started!</h3>
            <p>We founded our company with the desire to provide you with fresh roasted premium coffees, and we believe that a good cup of coffee inspires good conversation. We hope to make a small difference in the world by sharing great tasting coffee in community with others.</p>
            <!--<a href="#" class="btn">read more</a>-->
            <div class="icons-container">
                <div class="icons">
                    <img src="image/about-icon-1.png" alt="">
                    <h3>roasted bean</h3>
                </div>
                <div class="icons">
                    <img src="image/about-icon-4.png" alt="">
                    <h3>premium coffee</h3>
                </div>
                <div class="icons">
                    <img src="image/about-icon-5.png" alt="">
                    <h3>pastry & cake</h3>
                </div>
            </div>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading"> reviews <span>what people says</span> </h1>

    <div class="swiper review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <i class="fas fa-quote-left"></i>
                <i class="fas fa-quote-right"></i>
                <img src="image/pic-1.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>The BEST Apple Crumble! It taste overwhelmingly of fresh apples, with a bright, clean flavor.</p>
                <h3>Ahmad Rashid</h3>
                <span>satisfied client</span>
            </div>

            <div class="swiper-slide box">
                <i class="fas fa-quote-left"></i>
                <i class="fas fa-quote-right"></i>
                <img src="image/pic-2.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>The food was delicious but the menu was limited. Therefore, I decided to rate it 3 stars.</p>
                <h3>Aimi Nadirah</h3>
                <span>client</span>
            </div>

            <div class="swiper-slide box">
                <i class="fas fa-quote-left"></i>
                <i class="fas fa-quote-right"></i>
                <img src="image/pic-3.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Have you tried the Iced Americano? It’s really good!.</p>
                <h3>Shamsul Aiman</h3>
                <span>satisfied client</span>
            </div>

            <div class="swiper-slide box">
                <i class="fas fa-quote-left"></i>
                <i class="fas fa-quote-right"></i>
                <img src="image/pic-4.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Its slow pace truly invites every guest to have an in-depth conversation with the barista who go out of their way to share their knowledge and tell tales of coffee that will leave you with a sense of deep wonder.</p>
                <h3>Haziq Zul</h3>
                <span>satisfied client</span>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- review section ends -->

<!-- book section starts  -->

<section class="contact" id="contact">

    <h1 class="heading">Get To Know<span>Contact Us</span> </h1>

    

        <div class="box" style=" font-size: 30px; text-align: center; width: 100%; height: 550px;">
            <span>contact info</span>
            <br>
            <a> <i class="fas fa-phone"></i> +06 18-2738773</a>
            <br>
            <a> <i class="fas fa-envelope"></i> coffeebean@gmail.com </a>
            <br>
            <a> <i class="fas fa-envelope"></i> Ipoh, Perak, Malaysia</a>
        </div>


</section>

<!-- book section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>our branches</h3>
            <a> <i class="fas fa-arrow-right"></i> Perak </a>
            <a> <i class="fas fa-arrow-right"></i> Perlis </a>
            <a> <i class="fas fa-arrow-right"></i> Johor </a>
            <a> <i class="fas fa-arrow-right"></i> Negeri Sembilan </a>
            <a> <i class="fas fa-arrow-right"></i> Kuala Lumpur </a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> about </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> menu </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> review </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> book </a>
        </div>
    </div>
</section>

<!-- footer section ends -->

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>