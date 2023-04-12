<?php  
if(isset($_GET['edit_products'])){
$edit_id=$_GET['edit_products'];
$get_data="Select * from products where productID=$edit_id";
$result=mysqli_query($con,$get_data);
$row=mysqli_fetch_assoc($result);
$product_title=$row['product_title'];
// echo $product_title;
$product_description=$row['product_description'];
$product_keyword=$row['product_keyword'];
$category_id=$row['categoryID'];
$type_id=$row['type_id'];
$product_image1=$row['product_image1'];
$product_image2=$row['product_image2'];
$product_image3=$row['product_image3'];
$product_price=$row['product_price'];
}

//fetching category and type name
$select_category="Select * from categories where categoryID=$category_id";
$result_category=mysqli_query($con,$select_category);
$row_category=mysqli_fetch_assoc($result_category);
$category_title=$row_category['Name'];
// echo $category_title;

$select_type="Select * from type where type_id=$type_id";
$result_type=mysqli_query($con,$select_type);
$row_type=mysqli_fetch_assoc($result_type);
$type_name=$row_type['type_name'];
// echo $type_name;
?>

<div class="container mt-5 mb-4">
    <h2 class="text-center text-success">Edit Products</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo $product_title?>" name="product_title" class="form-control"
            required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" value="<?php echo $product_description?>" name="product_description" class="form-control"
            required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keyword" class="form-label">Product Keyword</label>
            <input type="text" id="product_keyword" value="<?php echo $product_keyword?>" name="product_keyword" class="form-control"
            required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product Category</label>
           <select name="product_category" class="form-select">
           <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
           <?php   
           $select_category_all="Select * from categories ";
           $result_category_all=mysqli_query($con,$select_category_all);
           while($row_category_all=mysqli_fetch_assoc($result_category_all)){
             $category_title=$row_category_all['Name'];
             $category_id=$row_category_all['categoryID'];
             echo "<option value='$category_id'> $category_title</option>";
           };
         
           ?>
          </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_type" class="form-label">Product Type</label>
        <select name="product_type" class="form-select">
        <option value="<?php echo $type_name?>"><?php echo $type_name?></option>
           <?php   
           $select_type_all="Select * from type ";
           $result_type_all=mysqli_query($con,$select_type_all);
           while($row_type_all=mysqli_fetch_assoc($result_type_all)){
             $type_name=$row_type_all['type_name'];
             $type_id=$row_type_all['type_id'];
             echo "<option value='$type_id'> $type_name</option>";
           };
         
           ?>
           </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label text-center">Product Image 1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-60 m-auto"
            required="required"><img src="./product_images/<?php echo $product_image1?>" alt="" class="product_class">
        </div>
</div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label ">Product Image 2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-60 m-auto"
            required="required"><img src="./product_images/<?php echo $product_image2?>" alt="" class="product_class">
        </div>
</div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label ">Product Image 3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-60 m-auto"
            required="required"><img src="./product_images/<?php echo $product_image3?>" alt="" class="product_class">
        </div>
</div>
<div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" value="<?php echo $product_price?>" name="product_price" class="form-control"
            required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update product"
            class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<?php   
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_type=$_POST['product_type'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    if($product_title=='' or $product_description=='' or $product_keyword=='' 
    or $product_category=='' or $product_type=='' or $product_image1=='' 
    or $product_image2=='' or $product_image3=='' or $product_price==''){
        echo"<script>alert('Please fill all th fields to continue')</script>";
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        $update_product="update products set product_title='$product_title',product_description='$product_description',
        product_keyword='$product_keyword',categoryID='$product_category',type_id='$product_type',
        product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',
        product_price='$product_price',date=NOW() where productID=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('Product updated successfully)</script>";
            echo "<script>window.open('./dbms.php','_self')</script>";
        }
    }
}
?>