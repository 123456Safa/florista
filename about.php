<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>about us</h3>
    <p> <a href="home.php">home</a> / about </p>
</section>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="http://localhost/images/about-img-1.png">
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p> At our enterprise, customer satisfaction is our top priority. We go above and beyond to understand and fulfill the needs of our clients</p>
            <a href="shop.php" class="btn">shop now</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>what we provide?</h3>
            <p>With a curated selection of vibrant flowers and personalized arrangements, we transform occasions into unforgettable experiences</p>
            <a href="contact.php" class="btn">contact us</a>
        </div>

        <div class="image">
            <img src="http://localhost/images/about-img-2.jpg">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="http://localhost/images/about-img-3.jpg">
        </div>

        <div class="content">
            <h3>who we are?</h3>
            <p>we are a team dedicated to spreading happiness and beauty through nature's most exquisite creations</p>
            <a href="#reviews" class="btn">clients reviews</a> <!--The class "btn" is applied for styling purposes.-->
            <!--#reviews is likely a reference to an element with the id "reviews" on the same page-->
        </div>

    </div>

</section>

<section class="reviews" id="reviews">

    <h1 class="title">client's reviews</h1>

    <div class="box-container">

        <div class="box">
            <img src="http://localhost/images/pic-1.png">
            <p>Absolutely stunning floral arrangements! The flowers were fresh, vibrant, and beautifully arranged. They added a touch of elegance to my special occasion. Highly recommend!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>kanye</h3>
        </div>

        <div class="box">
            <img src="http://localhost/images/pic-2.png" alt="">
            <p>I'm amazed by the exceptional service and attention to detail provided by this flower shop. The staff went above and beyond to create a custom bouquet </p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>ariana</h3>
        </div>

        <div class="box">
            <img src="http://localhost/images/pic-3.png" >
            <p>I can't say enough good things about this flower store! From the moment I walked in, I was greeted with warmth and professionalism. The bouquet I ordered exceeded my expectations </p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>cardiB</h3>
        </div>

        <div class="box">
            <img src="http://localhost/images/pic-4.png" alt="">
            <p>The flowers I received from this florist were absolutely breathtaking! Each stem was carefully selected and arranged, resulting in a stunning masterpiece</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>tailor</h3>
        </div>

        <div class="box">
            <img src="http://localhost/images/pic-5.png" alt="">
            <p>What a wonderful experience! The team at this flower shop is incredibly talented and passionate about their craft. They listened to my preferences and created a unique floral arrangement </p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>travis</h3>
        </div>

        <div class="box">
            <img src="http://localhost/images/pic-6.png" alt="">
            <p>I'm so grateful for the exceptional service provided by this flower boutique. The staff was friendly, knowledgeable, and went above and beyond to ensure my satisfaction</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>megantheestallion</h3>
        </div>

    </div>

</section>











<?php @include 'footer.php'; ?>

<script src="script.js"></script>

</body>
</html>
