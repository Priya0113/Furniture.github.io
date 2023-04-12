<?php  include('./include/connect.php');
  include('../functions/common_function.php');
  @session_start();
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
        <h2 class="text-center mb-5">Admin Login</h2>
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
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required="required"
                        class="form-control">
                    </div>
                   
                    <div>
                     <input type="submit" class="bg-info py-2 px-3 border-0"
                     name="admin_login" value="Login">
                     <p class="small fw-bold mt-2 p-1">Do you already have an account?<a href="admin_registration.php" class="text-danger"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['admin_login'])){
    $admin_name=$_POST['admin_name'];
    $admin_password=$_POST['admin_password'];
    
    $select_query="Select * from admin_tabel where admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    if($row_count>0){
        $_SESSION['admin_name']=$admin_name;
        if(password_verify($admin_password,$row_data['admin_password']))
            {
                $_SESSION['admin_name']=$admin_name;
                // echo"<script>alert('Login Successful')</script";
                echo "<script>window.open('./dbms.php','_self')</script>";
            }else{
                echo"<script>alert('Invalid Crendentials')</script";
            }
        }
    }

        ?>