<?php
  include('./include/connect.php');
  if(isset($_POST['insert_type'])){
    $type_title=$_POST['type_title'];
    $select_query="Select * from type where type_name ='$type_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
      echo "<script>alert('This Type is present inside the database')</script>";
    }else{
      $insert_query="insert into `type` (type_name) values ('$type_title')";
      $result=mysqli_query($con,$insert_query);
      if($result){
        echo "<script>alert('Type has been inserted successfully')</script>";
      }
    }
  }
?>

<form action="" method="post" class="mb-2">
<div class="input-group  w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-reciept"></i></span>
  <input type="text" class="form-control" name="type_title" placeholder="Insert Type" aria-label="Username" 
  aria-describedby="basic-addon1">
</div>
<div class="input-group  w-10 mb-2 m-auto">
  
<input type="submit" class=" bg-info border-0 my-3" name="insert_type" value="Insert Type">
</div>
</form>