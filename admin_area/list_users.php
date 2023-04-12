<h3 class="text-center text-success">All Users</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-light">
            <?php
     $get_users="Select * from user_table";
     $result=mysqli_query($con,$get_users);
     $row_count=mysqli_num_rows($result);
           
        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No Users Yet</h2>";
        }else{
          echo "
          <tr>
              <th>S no</th>
              <th>Username</th>
              <th>User Email</th>
              <th>User Address</th>
              <th>User Mobile</th>
              
          </tr>
      </thead>
      <tbody class='bg-light text-dark'>";
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
                $user_id=$row_data['user_id'];
                $username=$row_data['username'];
                $user_email=$row_data['user_email'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
                $number++;?>
                <tr>
                <td><?php echo $number;?></td>
                <td><?php echo $username;?></td>
                <td><?php echo $user_email;?></td>
                <td><?php echo $user_address;?></td>
                <td><?php echo $user_mobile;?></td>
                <!-- <td><a href='dbms.php?delete_user=<?php echo $user_id?>' 
                type='button' class=' text-dark' data-toggle='modal' data-target='#exampleModal'>
             <i class='fa-solid fa-trash'></i></a></td> -->
               </tr> 
               <?php
            }
        }
        ?>
    
        </tbody>
    </table>

  