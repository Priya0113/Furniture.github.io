<?php
  include('admin_area/include/connect.php');
  include('functions/common_function.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>furniture project</title>
    <link rel="stylesheet" href="dbms.css">
     <!-- css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
       integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <!-- font link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
       crossorigin="anonymous" referrerpolicy="no-referrer" />
       <style>
         .background{
    color:white;
    background-color: grey;
    font-size:20px;
    padding:24px;
    text-align: center;
    margin-top:50px;
    /* background-blend-mode: lighten; */

}
       </style>
</head>
<header>
    <div class="left">
        <img src="logo.jpg" alt="">
        <p id="logo"><em>World with style</em>
            <br><em>FURNITURE</em>
        </p>
    </div>
    
    <div class="mid">
        <ul>
            <li><a href="dbms.php">Home</a></li>
            <li><a href="display_all.php">Collections</a></li>
            <?php
            if(!isset($_SESSION['username'])){
             echo" <li><a href='./user/user_login.php'>Login</a></li>";
            }else{
                echo"<li><a href='./user/logout.php'>Logout</a></li>";
            }
            ?>
            <?php
             if(isset($_SESSION['username'])){
              echo" <li><a href='./user/profile.php'>My Account</a></li>";
             }else{
              echo" <li><a href='./user/user_registration.php'>Register</a></li>";
             }
            ?>
            <form class="srch" action="search_product.php" method="get">
                <input class="form-control border-4" type="search" placeholder="Search" aria-label="Search"
                name="search_data">
                <!-- <button class="srch2" type="submit">Go</button></form> -->
                <input type="submit" value="Search" class="btn btn-outline-dark "
                name="search_data_product"></form>
        </ul>
    </div>
            
    <div class="right">
    <div class="nav-item">
        <button class="prim"><a class="text-decoration-none " href="contact_us.php">Contact Us</a></button>
         <button class="prim"> <a class="nav-link" href="cart.php"><i class="fa-solid
          fa-cart-shopping"></i><sup><?php
          cart_item();?></sup></a></button></div></div>
</header>
<body>
<?php
    cart();
  ?>
 <div class="first-child">
 <?php
   if(!isset($_SESSION['username'])){
    echo" <h4><a class='nav-link' href='#'>Welcome Guest</a></h4>";
  }else{
    echo"<h4><a class='nav-link' href='#'>Welcome ".$_SESSION ['username']."</a></h4>";
     }
            ?>
 
</div> 
<div class="bg-light">
    <h3 class="text-centre">The Furniture Home</h3>
    <p class="text-centre">Good Furniture,Good Home ,Good Vibes</p>
</div>
<div class="row px-1">
<div class="col-md-10">
    <h4 class="text-center text-black mt-5 text-decoration-underline">Contact Us</h4>
    <div class="text-center mt-5 text-info">
        <h5>You can contact us through 1234567890</h5>
        <h5>Either email us at admin@gmail.com</h5>
        <h5>ABC block, Admin Colony</h5>
        <h5>New Delhi ,India</h5>
        <h5>Pincode:123456</h5>
    </div>
</div>

    <div class="col-md-2 bg-white p-0 ">
        <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-white">
          <a href="#" class="nav-link text-dark"><h4>Delivery Products</h4></a></li>  

            <?php
           gettypes();
            ?>
          </ul>
        
          <ul class="navbar-nav me-auto text-center">
          <a href="#" class="nav-link text-dark text-center my-3 mb-2"><h4>Categories</h4></a></li>  
          <?php
           getcategory();
            ?>
          </ul>
        </ul>
          
    </div>
    




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
<!-- js -->
<footer>
            <div class="background">
                <p>Copyrights &copy; All rights reserved- made by PRIYA BHARTI</p>
            </div>
        </footer>
<!-- js -->
</body>
</html>