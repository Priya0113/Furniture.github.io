<?php  include('../admin_area/include/connect.php');
  include('../functions/common_function.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
       integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
       
</head>
<body>
    <?php
    $user_ip=getIPAddress();
    $get_user="Select * from user_table where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    ?>
    <div class="container ">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="justify-content-center align-items-center">
        <a href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-center mt-5">Cash On Delivery</h2></a>
    </div>
</div>
</body>
</html>