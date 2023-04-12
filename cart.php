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
    <title>Cart Details</title>
    <link rel="stylesheet" href="dbms.css">
     <!-- css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
       integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <!-- font link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
       crossorigin="anonymous" referrerpolicy="no-referrer" />
       <style>
        .cart_img{
    height:100px;
    width: 100px;
    object-fit:contain;
}
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
            
        </ul>
    </div>
    
    <div class="right">
    <div class="nav-item">
        <button class="prim"><a class="text-decoration-none " href="contact_us.php">Contact Us</a></button>
        </div></div>
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

<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered">
    <tbody>
        <?php
        global $con; 
        $ip=getIPAddress();
        $total_price=0;
        $cart_query="Select * from cart_details where ip_address='$ip'";
        $result=mysqli_query($con,$cart_query);
        $result_count=mysqli_num_rows($result);
        if($result_count>0){
            echo "<thread>
            <tr>
                <th>Product Title</th>
                <th>Product Images</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th colspan='2'>Operations</th>
            </tr>
        </thread>";
        while($row=mysqli_fetch_assoc($result)){
          $product_id=$row['productID'];
          $select_products="Select * from products where productID='$product_id'";
          $result_products=mysqli_query($con,$select_products);
          while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $price_table=$row_product_price['product_price'];
            $product_title=$row_product_price['product_title'];
            $product_image1=$row_product_price['product_image1'];
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
        
        ?>
        <tr>
            <td> <?php echo $product_title?></td>
            <td><img src="<?php echo $product_image1?>" alt="" class="cart_img"></td>
            <td><input type="text" name="qunty"  class="form-input w-50 "></td>
            <?php
                global $con;
               $ip=getIPAddress();
               if(isset($_POST['update_cart'])){
                $quantities=$_POST['qunty'];
                $update_cart="update `cart_details` set quantity=$quantities where ip_address='$ip'";
                $result_products_quantity=mysqli_query($con,$update_cart);
                $total_price=$total_price*$quantities;
            }
            ?>   
            <td><?php echo $price_table?>/-</td>
            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
            <td>
                <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                <input type="submit" value="Remove Item" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
            </td>
        </tr>
        <?php }}}
        else{
            echo"<h2 class='text-center text-danger'>Cart is Empty</h2>";
        }
        ?>
    </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-5">
        <?php    
        $ip=getIPAddress();
        $cart_query="Select * from cart_details where ip_address='$ip'";
        $result=mysqli_query($con,$cart_query);
        $result_count=mysqli_num_rows($result);
        if($result_count>0){
          echo  "<h4 class='px-3'>Subtotal:<strong class='text-info'> $total_price/-</strong></h4>
          <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' 
          name='continue_shopping'>
            <button class='bg-secondary p-3 py-2 border-0'><a href='./user/checkout.php' class='text-light text-decoration-none'>
                Checkout</a></button>";
        }else{
           echo"   <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' 
           name='continue_shopping'>";
        }
        if(isset($_POST['continue_shopping'])){
            echo"<script>window.open('dbms.php','_self')</script>";
        }
        ?>
           
        </div>
        
    </div>
</div>
</form>
<!-- function to remove -->
<?php
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="Delete from cart_details where productID =$remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}
echo $remove_item=remove_cart_item();
?>
    




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