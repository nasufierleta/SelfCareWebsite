<?php
require_once('database/models/Customer.php');

?>
<header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="Index.php" class="logo">
        <img src="images/oceanica.png" width="60px">
        <span>OCEANICA</span>
    </a>

    <nav class="navbar">
        <a href="Index.php">Home</a>
        <a href="AboutUs.php">About Us</a>
        <a href="Index.php#products">Latest products</a>
        <a href="Categories.php">Categories</a>
        <a href="#contact">Contact Us</a>
    </nav>

    <div class="icons">
        <?php
        if(isset($_SESSION["customer"])){
            $customer = $_SESSION["customer"];

            if($customer->role=='admin'){
                ?>
                <a href="admin/dashboard.php">Admin</a>
                <?php
            }
        }
        ?>
        <a href="Wishlist.php" class="fas fa-heart"></a>
        <a href="ShoppingCart.php" class="fas fa-shopping-cart"></a>
        <!--login:-->
        <?php
            if(isset($_SESSION["customer"])){
                ?>
                <a href="logout.php">Log out</a>
                <?php
            }
            else{
                ?>
                <a href="#"><div id="login-btn" class="fas fa-user"></div></a>
                <?php
            }
        ?>
            <div class="login-form-container">
                <div id="close-login-btn" class="fas fa-times"></div>
                    <form action="Login.php" method="post">
                        <h3>Sign in</h3>
                        <span>Email</span>
                        <span id="email-error"></span>
                        <input type="email" name="email" class="box" placeholder="Enter your email" id="emailid">
                        <span>Password</span>
                        <span id="password-error"></span>
                        <input type="password" name="password" class="box" placeholder="Enter your password" id="passwordid">
                        <!--<div class="checkbox">
                            <input type="checkbox" name="" id="remember-me">
                            <label for="remember-me"> remember me</label>
                        </div> -->
                        <input type="submit" value="Sign in" class="btn" onclick="return validoSignIn();" >
                        <p>Don't have an account?<a href="SignUp.php">Sign Up</a></p>
                    </form>
                </div>
            </div>    
    </div>
            
       
    </div>

</header>