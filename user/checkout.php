<?php
  include('../admin_area/include/connect.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <!-- <link rel="stylesheet" href="dbms.css"> -->
     <!-- css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
       integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <!-- font link -->
     <link rel="stylesheet" href="dbms.css">
     <style>
      .right{
    position: fixed;
    right:20px;
    display:inline-block;
    top:40px;
    font-size: 16px; 
}
.left{
    /* border:2px solid red; */
    display: inline-block;
    position: absolute; 
    left:30px ;
    top: 5px;
}
.left img{
    height:120px;
    width:160px;
    border-radius: 100%;
    border: 2px solid rgb(7, 7, 7);
     position: fixed;  
}
.mid{
    
    width: 900px;
    margin-top: 10px;
    margin-left: 270px;
    display:inline-block;
    position:fixed;
    border-radius: 60px;    
    height:80px;
    text-align:center;
    vertical-align:middle;
    line-height:0px;
    top:0px;
    background-color: rgb(253, 251, 251);
}
.mid li{
    list-style-type: none;
    display: inline-block;
    margin: 40px;
    font-size: 20px;
    font-weight: bold;
    font-family: Georgia, 'Times New Roman', Times, serif;
}
.mid li a:hover , .mid li a:active{
    color: rgb(210, 78, 199);
    text-decoration: underline;
    font-weight: bold;
    
}
.mid li a{
    text-decoration: none;
    color: rgb(10, 10, 10);
    
}
.srch1{
    width:700px;
    height:40px;
    border-radius: 60px;
    margin-top:10px;
    font-size: 20px;
    padding-left: 15px;
    background-color:black ;
}
.srch2{
 height:40px;
 border-radius: 20px;
 width: 50px;
 font-weight: bold;
}
.srch2:hover{
    background-color:skyblue;
}
.first-child{
    background-color: aliceblue;
    text-align: left;
    margin-top: 160px;
    margin-left: 15px;
}
.prim{
    background:rgb(242, 240, 240);
    border: 2px solid rgb(6, 1, 1);
    color:rgb(231, 47, 244);
    border-radius: 6px;
    margin:5px 5px;
    padding: 5px;
    cursor: pointer;
}


#logo{
    text-align: center;
    color:azure;
    background-color: rgb(3, 3, 3);
    font-family:Georgia, 'Times New Roman', Times, serif;
    font-size: 10px;
    font-weight: bold;
    position: fixed; 
    margin-top: 115px;
    margin-left: 5px; 
    border-radius: 20px;
    width: 150px;
}
.prim:hover{
    color: rgb(125, 13, 237);
    background-color:rgb(242, 245, 247);

}

.bg-light{
    margin-top: 50px;
    text-align:center;
}
.card-img-top{
    width: 100%;
    height: 200px;
    object-fit: contain;
}
.admin-img{
    width:100px;
    object-fit:contain;
}
.background{
    color:white;
    background-color:grey;
    font-size:20px;
    padding:24px;
    text-align: center;
    margin-top:50px;
    /* background-blend-mode: lighten; */

}
</style>
</head>
<body>
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
            <li><a href="Login.html">My Orders</a></li>
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
         </div></div>
</header>
<body>
  
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
<div class="col-md-12">
    <div class="row">
  <?php      
  if(!isset($_SESSION['username'])){
    include('user_login.php');
  }else{
    include('payment.php');
  }
   ?> 
</div>
</div>
          
    </div>
    




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  <footer>
            <div class="background">
                <p >Copyrights &copy; All rights reserved- made by PRIYA BHARTI</p>
            </div>
        </footer>
<!-- js -->

<!-- js -->
</body>
</html>  
</body>
</html>