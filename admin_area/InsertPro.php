<?php
  include('./include/connect.php');
  if(isset($_POST['insert_product'])){
   $product_title=$_POST['product_title'];
   $product_description=$_POST['product_description'];
   $product_keyword=$_POST['product_keyword'];
   $product_category=$_POST['product_category'];
   $product_type=$_POST['product_type'];
   $product_price=$_POST['product_price'];
   $product_status="true";

   $product_image1=$_FILES['product_image1']['name'];
   $product_image2=$_FILES['product_image2']['name'];
   $product_image3=$_FILES['product_image3']['name'];

   $temp_image1=$_FILES['product_image1']['tmp_name'];
   $temp_image2=$_FILES['product_image2']['tmp_name'];
   $temp_image3=$_FILES['product_image3']['tmp_name'];

   if($product_title=='' or $product_description=='' or $product_keyword=='' or
   $product_category=='' or $product_type=='' or $product_price=='' or
   $product_image1=='' or $product_image2=='' or $product_image3==''){
    echo "<script>alert('Please fill all the availabe fields')</script>";
    exit();
   }else{
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");

    $insert_products="insert into products(product_title,product_description,
    product_keyword,categoryID,type_id,product_image1,product_image2,product_image3,
    product_price,date,status) values ('$product_title','$product_description','$product_keyword',
    '$product_category','$product_type','$product_image1','$product_image2','$product_image3','$product_price',
    NOW(),'$product_status')";
    $result_query=mysqli_query($con,$insert_products);
    if($result_query){
      echo"<script>alert('Successfully inserted the products')</script>";
      echo"<script>window.open('dbms.php','_self')</script>";
    }
   }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert products</title>
  <link rel="stylesheet" href="dbms.css">
     <!-- css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
       integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <!-- font link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
       crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
  <div class="container mt-3">
    <h1 class="text-center">Insert Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_title" class="form-label">Products title</label>
        <input type="text" name="product_title" id="product_title" class="form-control"
        placeholder="Enter product title" autocomplete="off"
        required="required">
      </div>
      <!-- desc -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_description" class="form-label">Products description</label>
        <input type="text" name="product_description" id="product_description" class="form-control"
        placeholder="Enter product description" autocomplete="off"
        required="required">
      </div>
      <!-- keyword -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_keyword" class="form-label">Product keyword</label>
        <input type="text" name="product_keyword" id="product_keyword" class="form-control"
        placeholder="Enter product keyword" autocomplete="off"
        required="required">
        <!-- category -->
        <div class="form-outline mb-4 w-100 mt-4">
        <select name="product_category" id="" class="form-select">
          <option value="">Select a category</option>
          <?php
          $select_query="Select * from `categories`";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $Name=$row['Name'];
            $category_id=$row['categoryID'];
            echo"<option value='$category_id'>$Name</option>";
          }
          ?>
        </select>
      </div>  
      <div class="form-outline mb-4 w-100 mt-4">
        <select name="product_type" id="" class="form-select">
          <option value="">Select a type</option>
          <?php
          $select_query="Select * from `type`";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $type_name=$row['type_name'];
            $type_id=$row['type_id'];
            echo"<option value='$type_id'>$type_name</option>";
          }
          ?>
        </select>
      </div>
      <!-- img -->
      <div class="form-outline mb-4 w-100 ">
        <label for="product_image" class="form-label">Product image1</label>
        <input type="file" name="product_image1" id="product_image1" class="form-control"
        required="required">
</div> 

<div class="form-outline mb-4 w-100 ">
        <label for="product_image" class="form-label">Product image 2</label>
        <input type="file" name="product_image2" id="product_image2" class="form-control"
        required="required">
</div> 

<div class="form-outline mb-4 w-100 ">
        <label for="product_image" class="form-label">Product image 3</label>
        <input type="file" name="product_image3" id="product_image3" class="form-control"
        required="required">
</div> 
<div class="form-outline mb-4 w-100 m-auto">
        <label for="product_price" class="form-label">Products price</label>
        <input type="text" name="product_price" id="product_price" class="form-control"
        placeholder="Enter product price" autocomplete="off"
        required="required">
      </div>
      <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="insert products">
      </div>

    </form>
  </div>

  
</body>
</html>