<?php  include('./include/connect.php');
  include('../functions/common_function.php');
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
     <!-- css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
       integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> 
          
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
       crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body{
            overflow:hidden;
            background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('royal-interior.jpg');
            background-repeat: no-repeat;
            height: 100%;
            margin: 0px;
            padding:0px;
            color: white;
            background-size: cover;
           
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center mb-8 ">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_name" class="form-label">Username</label>
                        <input type="text" id="admin_name" name="admin_name" placeholder="Enter your username" required="required"
                        class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="text" id="admin_email" name="admin_email" placeholder="Enter your email" required="required"
                        class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required="required"
                        class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter to confirm" required="required"
                        class="form-control">
                    </div>
                    <div>
                     <input type="submit" class="bg-info py-2 px-3 border-0"
                     name="admin_register" value="Register">
                     <p class="small fw-bold mt-2 p-1">Don't you have an account?<a href="admin_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
   if(isset($_POST['admin_name'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];

    $select_query="Select * from  `admin_tabel` where admin_name='$admin_name' 
    or admin_email='$admin_email'";
     $result=mysqli_query($con,$select_query);
     $rows_count=mysqli_num_rows($result);
     if($rows_count>0){
        echo"<script> alert('Username or email already exits')</script>";
     }else if($admin_password!=$confirm_password){
        echo "<script>alert('Password do not match')</script>";
     }
     else{
        //insert_query
        $insert_query="insert into  `admin_tabel` (admin_name,admin_email,admin_password)
        values('$admin_name','$admin_email','$hash_password')";
        $sql_execute=mysqli_query($con,$insert_query);  
       }
       echo "<script>window.open('./dbms.php','_self')</script>";
    }?>
   