<?php
  //  include('../admin_area/include/connect.php');

function getproducts(){
    global $con;
    if(!isset($_GET['category'])){
        if(!isset($_GET['type'])){
  $select_query="Select * from products order by rand() LIMIT 0,6";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['productID'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['categoryID'];
    $type_id=$row['type_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
    <a href='dbms.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?productID=$product_id' 
    class='btn btn-secondary'>view More</a>
  </div>
</div> </div>";
  }
}
}
}

function get_all_products(){
    global $con;
    if(!isset($_GET['category'])){
        if(!isset($_GET['type'])){
  $select_query="Select * from products order by rand()";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['productID'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['categoryID'];
    $type_id=$row['type_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
    <a href='dbms.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?productID=$product_id' 
    class='btn btn-secondary'>view More</a>
  </div>
</div> </div>";
  }
}
} 
}
//getunq

function getuniquecategories(){
    global $con;
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
  $select_query="Select * from products where categoryID=$category_id";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>NO STOCK for this category</h2>";
  }
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['productID'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['categoryID'];
    $type_id=$row['type_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
    <a href='dbms.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?productID=$product_id' 
    class='btn btn-secondary'>view More</a>
  </div>
</div> </div>";
  }
}
}
//types

function getunique_type(){
    global $con;
    if(isset($_GET['type'])){
        $type_id=$_GET['type'];
  $select_query="Select * from products where type_id=$type_id";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>NO STOCK for this Type</h2>";
  }
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['productID'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['categoryID'];
    $type_id=$row['type_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
    <a href='dbms.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?productID=$product_id' 
    class='btn btn-secondary'>view More</a>
  </div>
</div> </div>";
  }
}
}
//dis types
function gettypes(){
    global $con;
    $select_type="Select * from type";
    $result_type=mysqli_query($con,$select_type);
    while($row_data=mysqli_fetch_assoc($result_type)){
      $type_name=$row_data['type_name'];
      $type_id=$row_data['type_id'];
      echo "<li class='nav-item'>
      <a href='dbms.php?type=$type_id' class='nav-link text-dark'>$type_name</a>
      </li>";
    }
}

//dis cate
function getcategory(){
    global $con;
    $select_categories="Select * from categories ";
    $result_categories=mysqli_query($con,$select_categories);
    while($row_data=mysqli_fetch_assoc( $result_categories)){
      $category_name=$row_data['Name'];
      $category_id=$row_data['categoryID'];
      echo "<li class='nav-item'>
      <a href='dbms.php?category=$category_id' class='nav-link text-dark'>$category_name</a>
      </li>";
    }
}
//get products
function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
  $search_query="Select * from products where product_keyword like '%$search_data_value%'";
  $result_query=mysqli_query($con,$search_query);
  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>No Results match</h2>";
  }
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['productID'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['categoryID'];
    $type_id=$row['type_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
    <a href='dbms.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?productID=$product_id' 
    class='btn btn-secondary'>view More</a>
  </div>
</div>         
 </div>";
  }
}
}

function  view_details(){
    global $con;
    if(isset($_GET['productID'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['type'])){
            $product_id=$_GET['productID'];
  $select_query="Select * from products where productID=$product_id";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['productID'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    $category_id=$row['categoryID'];
    $type_id=$row['type_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
    <a href='dbms.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='dbms.php'class='btn btn-secondary'>Go Home</a>
  </div>
</div> </div>
<div class='col-md-8'>
            
            <div class='row '>
           <div class='col-md-12'>
               <h4 class='text-center text-info mb-16 p-3'>Related
                 Products</h4>
          </div>
          <div class='col-md-6 card'>
          <img src='./admin_area/product_images/$product_image2' class='card-img-top' 
          alt='$product_title'>
          <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: $product_price/-</p>
          <a href='dbms.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
          <a href='dbms.php'class='btn btn-secondary'>Go Home</a>
        </div>
          </div>
          <div class='col-md-6 card '>
          <img src='./admin_area/product_images/$product_image3' class='card-img-top' 
          alt='$product_title'>
          <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: $product_price/-</p>
          <a href='dbms.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
          <a href='dbms.php'class='btn btn-secondary'>Go Home</a>
        </div>
          </div>
            </div>
        </div>
";
  }
}
}
}
}
//get ip
function getIPAddress(){ 
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip;  

    //cart function
    function cart(){
    if(isset($_GET['add_to_cart'])){
    global $con;
    $ip=getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from cart_details where
    ip_address='$ip' and productID=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
    echo "<script>alert('This item is already present inside the cart')</script>";
    echo"<script>window.open('dbms.php','_self')</script>";
  }else{
    $insert_query="insert into cart_details (productID,ip_address,
    quantity) values ($get_product_id,'$ip',0)";
    $result_query=mysqli_query($con,$insert_query);
    echo "<script>alert('This item is added to cart')</script>";
    echo"<script>window.open('dbms.php','_self')</script>";
  }
   }
    }

  function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip=getIPAddress();
        $select_query="Select * from cart_details where
        ip_address='$ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }else{
            global $con;
            $ip=getIPAddress();
            $select_query="Select * from cart_details where
            ip_address='$ip'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
      }
      echo $count_cart_items;
       } 

       //total price
       function total_cart_price(){
        global $con;
        $ip=getIPAddress();
        $total_price=0;
        $cart_query="Select * from cart_details where ip_address='$ip'";
        $result=mysqli_query($con,$cart_query);
        while($row=mysqli_fetch_assoc($result)){
          $product_id=$row['productID'];
          $select_products="Select * from products where productID='$product_id'";
          $result_products=mysqli_query($con,$select_products);
          while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
          }
        }
          echo $total_price;
        
       }

       function get_order_details(){
        global $con;
        $username=$_SESSION['username'];
        $get_details="Select * from user_table where username='$username'";
        $result_query=mysqli_query($con,$get_details);
        while($row_query=mysqli_fetch_assoc($result_query)){
          $user_id=$row_query['user_id'];
          if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
              if(!isset($_GET['delete_account'])){
                 $get_orders="Select * from user_order where user_id=$user_id and order_status='pending'";
                 $result_order_query=mysqli_query($con,$get_orders);
                 $row_count=mysqli_num_rows($result_order_query);
                 if($row_count>0){
                  echo"<h3 class='text-center text-success my-5'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                  <p class='text-center'><a href='profile.php?my_orders'>Order Details</a><p>";
                 }else{
                  echo"<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>
                  <p class='text-center'><a href='../dbms.php' class='text-dark'>Explore Products</a><p>";
                 }
          }
        }
       }
      }
    }
    
    
?>