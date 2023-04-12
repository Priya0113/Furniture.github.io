<?php
  include('../admin_area/include/connect.php');
//   include('../functions/common_function.php');
  
?>
<?php
if(isset($_GET['edit_type'])){
    $edit_type=$_GET['edit_type'];
    $get_types="Select * from type where type_id=$edit_type";
    $result=mysqli_query($con,$get_types);
    $row=mysqli_fetch_assoc($result);
    $type_name=$row['type_name'];
    // echo $category_title;
}

if(isset($_POST['edit_ty'])){
    $ty_title=$_POST['type_name'];
    $update_ty_query="Update type set type_name='$ty_title' where type_id=$edit_type";
    $result_ty=mysqli_query($con,$update_ty_query);
    if($result_ty){
        echo "<script>alert('Type is been updated successfully')</script>";
        echo "<script>window.open('./dbms.php?view_types','_self')</script>";
    }
}
?>

<div class="container mt-3">
    <h2 class="text-center text-success">Edit Type</h2>
    <form action="" method="post" class="text-center">
        <div class="form-outlibe mt-4 w-50 m-auto mb-4">
<label for="type_name" class="form-label">Type Name</label>
<input type="text" name="type_name" id="type_name" class="form-control" 
required="required" value="<?php  echo $type_name;?>">
        </div>
        <input type="submit" value="Update Type" class="btn btn-info px-3 mb-3"
        name="edit_ty">
    </form>
</div>