<?php
require_once('database/ProductRepository.php');
require_once('database/models/Customer.php');

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webpage</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
</head>
<body >
    
    
<!-- header section starts  -->

<?php 
    require("Header.php");
?>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">
   
    <div class="content">
        <h3>Did you know?</h3>
        <span> Your skin is your best accessory </span>
        <a href="categories.php" class="btn">Shop now</a>
    </div> 
    

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span> About </span> Us </h1>

    <div class="row">

        <div class="video-container">
            <video src="images/istockphoto-1343916877-640_adpp_is.mp4" loop autoplay muted></video>
            <h3>Best cosmetic sellers</h3>
        </div>

        <div class="content">
            <h3>Our Goal?</h3>
            <p>
                The skincare ekziston në luftimin për një botë më të drejtë dhe më të bukur.
                Ky është qëllimi ynë dhe drejton gjithçka që ne bëjmë.
                Besimet tona si: një biznes është një forcë për të mirë, besimi në fuqizim
                të grave dhe vajzave dhe besimi se të gjithë janë të bukur, jane gjithçka per ne.
                Lexoni platformën tonë të markës dhe zbuloni sesi qëllimi dhe besimet tona janë vërtet në zemër të gjithçkaje që ne bëjmë.
            </p>
            
            <a href="AboutUs.php" class="btn">learn more</a>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- icons section starts  -->

<section class="icons-container">

    <div class="icons">
        <img src="images/icon-1.png" alt="">
        <div class="info">
            <h3>Free delivery</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/icon-2.png" alt="">
        <div class="info">
            <h3>10 days returns</h3>
            <span>moneyback guarantee</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/icon-3.png" alt="">
        <div class="info">
            <h3>Offer & gifts</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/icon-4.png" alt="">
        <div class="info">
            <h3>Secure paymens</h3>
            <span>protected by paypal</span>
        </div>
    </div>
   
</section>

<!-- icons section ends -->

<!-- prodcuts section starts  -->

<section class="products" id="products">

    <h1 class="heading"> Latest <span>products</span> </h1>

    <?php
        $productRepo = new ProductRepository();
        $latestProducts = $productRepo->getLatestProducts();
    ?>
    <div class="box-container">
        <?php
            if(isset($latestProducts)){
                foreach($latestProducts as $product){
                    ?>
                    <div class="box">
                    <span class="discount"></span>
                    <div class="image">
                        <img src="<?php echo($product->pictureUrl)?>" alt="">
                        <div class="icons">
                            <a href="addToWishlist.php?productId=<?php echo($product->id)?>" class="fas fa-heart"></a>
                            <a href="
                            <?php
                                if($product->stock>0){
                                    echo("addToCart.php?id=$product->id");
                                }
                                else{
                                    echo("#");
                                }
                            ?>
                            " class="cart-btn">
                                <?php
                                    if($product->stock>0){
                                        echo("add to cart");
                                    }
                                    else{
                                        echo("no stock");
                                    }
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <h3><a class="product-title" href="ProductDetails.php?id=<?php echo($product->id)?>"><?php echo($product->title)?></a></h3>
                        <div class="price"><?php echo($product->price)?> €<span></span> </div>
                    </div>
                </div>
                <?php
                }
            }
            ?>
    </div>
            <a href="categories.php" class="btn">More</a>
</section>


<!-- slider section starts  -->

<section class="slider">

 
    <div class="slideshow-container">
    
        
        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="images/serum3Slider.png"  >
          <div class="text">You can try our products by visitng our stores everywhere</div>
        </div>
      
        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="images/serum1Slider.png" >
          <div class="text">Tested by the best dermatologists</div>
        </div>
      
        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="images/cream1Slider.png" >
          <div class="text">Sellers to the most prestige brands all over the world</div>
        </div>
      
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
      <br>
      
    
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
      </div>
    
        
    
        
    </section>
    
    <!-- review section ends -->
    
    <!-- contact section starts  -->
    
    <section class="contact" id="contact">
    
        <h1 class="heading"> <span> Contact </span> Us </h1>
    
        <div class="row">
    
            <form action="">
                <input type="text" placeholder="Name" class="box" id="name">
                <input type="email" placeholder="Email" class="box" id="email">
                <input type="tel" placeholder="Number" class="box" id="number">
                <textarea name="" class="box" placeholder="Message" id="text" cols="30" rows="10"></textarea>
                <input type="submit" value="send message" class="btn" onclick="validoContact()">
            </form>
    
            <div class="image">
                <img src="images/4256047.jpg" alt="">
            </div>
    
        </div>
    
    </section>
    
    <!-- contact section ends -->
    
    <!-- footer section starts  -->
    
    <section class="footer">
    
        <div class="box-container">
    
           <!-- <div class="box">
                <h3>Links</h3>
                <a href="#">Home</a>
                <a href="#">About us</a>
                <a href="#">Products</a>
                <a href="#">Advent Calendars</a>
                <a href="#">Contact us</a>
            </div> -->
    
            <div class="box">
                <h3>Rrjetet sociale</h3>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i> Facebook</a>
                <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></i> Twitter</a>
            </div>
    
            <div class="box">
                <h3>Lokacionet</h3>
                <a href="https://goo.gl/maps/6pTpysy5uzU2ZQuE7"><i class="fas fa-location-arrow"></i> Prishtine</a>
                <a href="https://goo.gl/maps/qSV4bwnN6NURpSeE8"><i class="fas fa-location-arrow"></i> Prizren</a>
                <a href="https://goo.gl/maps/Tv5w2CLrJWoqBemJA"><i class="fas fa-location-arrow"></i> Gjakove</a>
                <a href="https://goo.gl/maps/S1VFTgcJBvnE1MGR6"><i class="fas fa-location-arrow"></i> Ferizaj</a>
            </div>
    
            <div class="box">
                <h3>Kontakti</h3>
                <a href="#"><i class="fas fa-phone"></i> +383-45-678-332</a>
                <a href="#"><i class="fas fa-envelope"></i> oceanica@gmail.com</a>
                
                <img src="images/payment.png" alt="">
            </div>
    
        </div>
    
        <div class="credit"> Created by <span> Puhiza & Erleta</span></div>
    
    </section>
    
    <!-- footer section ends -->
    
    <script src="script.js"></script>

</body>
</html>