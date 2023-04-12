<?php
if (isset($_GET['delete_user'])){
    $delete_users=$_GET['delete_user'];
    $delete_query="Delete from user_table where user_id=$delete_users";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Order is deleted succesfully')</script>";
        echo "<script>window.open('./dbms.php?list_users','_self')</script>";
    }
}