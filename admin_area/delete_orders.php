<?php
if (isset($_GET['delete_orders'])){
    $delete_order=$_GET['delete_orders'];
    $delete_query="Delete from `user_order` where order_id=$delete_order";
    $result=mysqli_query($con,$delete_query);
    if($result){
        // echo "<script>alert('Order is deleted succesfully')</script>";
        echo "<script>window.open('./dbms.php?list_orders','_self')</script>";
    }
}