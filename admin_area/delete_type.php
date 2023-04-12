<?php
if (isset($_GET['delete_type'])){
    $delete_type=$_GET['delete_type'];
    $delete_query="Delete from type where type_id=$delete_type";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Type is deleted succesfully')</script>";
        echo "<script>window.open('./dbms.php?view_types','_self')</script>";
    }
}