<?php
session_start();

require_once('database/CustomerRepository.php');

if(isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["phone_number"]) && isset($_POST["birthdate"]) && isset($_POST["gender"])){
  $customerRepo = new CustomerRepository();

  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $phone = $_POST["phone_number"];
  $birthdate = $_POST["birthdate"];
  $gender = $_POST["gender"];

  $customer = $customerRepo->addCustomer($name,$surname,$email,$password,$phone,$birthdate,$gender);

  $_SESSION["customer"] = $customer;

  header("Location: Index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Regjistrimi</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="signup.css" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
  </head>


  <body>

  <header>

    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="index.php" class="logo">
        <img src="images/oceanica.png" width="60px">
        <span>OCEANICA</span>
    </a>

    <nav class="navbar">
        <a href="index.php" class="fas fa-home"></a>
    
    </nav>

</header>

    <section class="container">
      <form name="signupForm" action="SignUp.php" class="form" onsubmit="return validateSignup()" method="post">
        
        <div class="input-box">
          <label for="username">Name</label>
          <input type="text" id="username" name="name" placeholder="Enter name" required />
        </div>
        <div class="input-box">
          <label for="username">Surname</label>
          <input type="text" id="surname" name="surname" placeholder="Enter surname" required />
        </div>

        <div class="input-box">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" placeholder="Enter email address" required />
        </div>

        <div class="input-box">
          <label for="email">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter password" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label for="phone-number">Phone Number</label>
            <input type="tel" id="phone" placeholder="Enter phone number" name="phone_number" required />
          </div>
          <div class="input-box">
            <label for="birth-date">Birth Date</label>
            <input type="date" id="birthday" placeholder="Enter birth date" name="birthdate" required />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option" id="genders">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" value="male"/>
              <label for="check-male">Male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="female"/>
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender" value="other"/>
              <label for="check-other">Prefer not to say</label>
            </div>
          </div>
        </div>
        <!-- <div class="input-box address">
          <label>Address</label>
        
          <div class="column">
            <div class="select-box">
              <select id="address">
                <option hidden>Country</option>
                <option>Kosovo</option>
                <option>Albania</option>
                <option>Macedonia</option>
                <option>France</option>
                <option>England</option>
                <option>Germany</option>
              </select>
            </div>
  
            <input type="text" id="city" placeholder="Enter your city (optional)"/>
          </div>
          
          <input type="password" id="password" placeholder="Enter your password" required />
        </div> -->
        <button onclick="validate()">Submit</button>
      </form>
    </section>

<script src="signup.js"></script>
   
  </body>
</html>