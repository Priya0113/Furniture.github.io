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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../dbms.css">
    <!-- css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
       integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> 
          
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
       crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .db-1{
        margin-top:150px;
    }
    .my-3{
    margin-left:35px;
    border-radius:10px;
}
    .product_class{
   object-fit:contain;
   width:20%;
    }

    .background{
    color:white;
    background-color:grey;
    font-size:20px;
    padding:24px;
    text-align: center;
    margin-top:250px;
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
    <div class="right text-right py-4 text-success">
    <?php
   if(!isset($_SESSION['admin_name'])){
    echo" <h4><a class='nav-link' href='#'>Welcome Guest</a></h4>";
  }else{
    echo"<h4><a class='nav-link' href='#'>Welcome ".$_SESSION ['admin_name']."</a></h4>";
     }
            ?>
    </div>
</header>
<body>
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>
    <div class="db-1">
    <div class="row">
        <div class="col-md-12 bg-secondary d-flex align-items-center">
            <div class="p-3">
                <a href="#"><img src="user.jpg" alt="" class="admin-img"></a>
                <?php
         if(!isset($_SESSION['admin_name'])){
         echo" <h6><a class='nav-link text-info' href='#'>Admin Name</a></h6>";
         }else{
          echo"<h6><a class='nav-link text-info' href='#'>".$_SESSION ['admin_name']."</a></h6>";
          }
            ?>
            </div>
            <div class="button text-center my-2 d-flex bg-info ">
             <button class="my-3"><a href="InsertPro.php" class="nav-link text-dark my-1">Insert Products</button>
             <button class="my-3"><a href="dbms.php?view_products" class="nav-link text-dark my-1">View Products</a></button >
             <button class="my-3"><a href="dbms.php?InsertCat" class="nav-link text-dark my-1">Insert Category</a></button>
             <button class="my-3"><a href="dbms.php?view_categories" class="nav-link text-dark my-1">View Category</a></button >
             <button class="my-3"><a href="dbms.php?Insert_type" class="nav-link text-dark my-1">Insert Type</a></button>
             <button class="my-3"><a href="dbms.php?view_types" class="nav-link text-dark my-1">View Type</a></button>
             <button class="my-3"><a href="dbms.php?list_orders" class="nav-link text-dark my-1">All Orders</a></button>
             <button class="my-3"><a href="dbms.php?list_payments" class="nav-link text-dark my-1">All Payments</a></button>
             <button class="my-3"><a href="dbms.php?list_users" class="nav-link text-dark my-1">List User's</a></button>
           <button class="my-3"> <?php
            if(!isset($_SESSION['admin_name'])){
             echo"<a href='admin_login.php' class='nav-link text-dark my-1k'>Login </a>";
            }else{
                echo"<a href='admin_logout.php' class='nav-link text-dark my-1'>Logout </a>";
            }
            ?>
            </button>
            
        </div>
        </div>
    </div>
</div>
  
<div class="container my-5">
    <?php 
       if(isset($_GET['InsertCat'])){
        include('InsertCat.php');
       }
       if(isset($_GET['Insert_type'])){
        include('Insert_type.php');
       }
       if(isset($_GET['view_products'])){
        include('view_products.php');
       }
       if(isset($_GET['edit_products'])){
        include('edit_products.php');
       }
       if(isset($_GET['delete_product'])){
        include('delete_product.php');
       }
       if(isset($_GET['view_categories'])){
        include('view_categories.php');
       }
       if(isset($_GET['view_types'])){
        include('view_types.php');
       }
       if(isset($_GET['edit_category'])){
        include('edit_category.php');
       }
       if(isset($_GET['edit_type'])){
        include('edit_type.php');
       }
       if(isset($_GET['delete_category'])){
        include('delete_category.php');
       }
       if(isset($_GET['delete_type'])){
        include('delete_type.php');
       }
       if(isset($_GET['list_orders'])){
        include('list_orders.php');
       }
       if(isset($_GET['delete_orders'])){
        include('delete_orders.php');
       }
       if(isset($_GET['list_payments'])){
        include('list_payments.php');
       }
       if(isset($_GET['list_users'])){
        include('list_users.php');
       }
    
    ?>
</div>
   
<!-- jss llink -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<footer>
            <div class="background">
                <p >Copyrights &copy; All rights reserved- made by PRIYA BHARTI</p>
            </div>
        </footer>
<!-- js -->
</body>
</html>