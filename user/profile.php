<?php
  include('../admin_area/include/connect.php');
  include('../functions/common_function.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>furniture project</title>
    <link rel="stylesheet" href="../dbms.css">
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
    background-color:grey;
    font-size:20px;
    padding:24px;
    text-align: center;
    margin-top:10px;
    /* background-blend-mode: lighten; */

}
       </style>
</head>
<header>
    <div class="left">
        <img src="../logo.jpg" alt="">
        <p id="logo"><em>World with style</em>
            <br><em>FURNITURE</em>
        </p>
    </div>
    
    <div class="mid">
        <ul>
            <li><a href="../dbms.php">Home</a></li>
            <li><a href="../display_all.php">Collections</a></li>
            <?php
            if(!isset($_SESSION['username'])){
             echo" <li><a href='user_login.php'>Login</a></li>";
            }else{
                echo"<li><a href='logout.php'>Logout</a></li>";
            }
            ?>
            <li><a href="profile.php">My Account</a></li>
            <form class="srch" action="../search_product.php" method="get">
                <input class="form-control border-4" type="search" placeholder="Search" aria-label="Search"
                name="search_data">
                <!-- <button class="srch2" type="submit">Go</button></form> -->
                <input type="submit" value="Search" class="btn btn-outline-dark "
                name="search_data_product"></form>
        </ul>
    </div>
    
   
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
<div class="row p-0 my-3">
    <div class="col-md-2 p-0">
        <ul class="navbar-nav bg-light text-center">
            <li class="nav-item bg-light">
                <a class="nav-link text-purple" href="#"><h4>Your Profile</h4></a>
            </li>
            <li class="nav-item bg-light">
                <a class="nav-link text-dark" href="profile.php">Pending Order</a>
            </li>
            <li class="nav-item bg-light">
                <a class="nav-link text-dark" href="profile.php?my_orders">My orders</a>
            </li>
            <li class="nav-item bg-light">
                <a class="nav-link text-dark" href="profile.php?delete_account">Delete Account</a>
            </li>
            <li class="nav-item bg-light">
                <a class="nav-link text-dark" href="profile.php?edit_account">Edit Account</a>
            </li>
            <li class="nav-item bg-light">
                <a class="nav-link text-dark" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10">
        <?php get_order_details(); 
        if(isset($_GET['edit_account'])){
            include('edit_account.php');
        }
        if(isset($_GET['my_orders'])){
            include('user_orders.php');
        }
        if(isset($_GET['delete_account'])){
            include('delete_account.php');
        }
        ?>
    </div>
    </div>
    
    




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  <footer>
            <div class="background">
                <p>Copyrights &copy; All rights reserved- made by PRIYA BHARTI</p>
            </div>
        </footer>
<!-- js -->
</body>
</html>