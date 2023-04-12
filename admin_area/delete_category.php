<?php
if (isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    $delete_query="Delete from categories where categoryID=$delete_category";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Category is deleted succesfully')</script>";
        echo "<script>window.open('./dbms.php?view_category','_self')</script>";
    }
}