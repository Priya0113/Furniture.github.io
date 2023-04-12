<h3 class="text-center text-success">All Payments</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-light">
            <?php
     $get_payments="Select * from user_payments";
     $result=mysqli_query($con,$get_payments);
     $row_count=mysqli_num_rows($result);
           
        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No Payments Yet</h2>";
        }else{
          echo "
          <tr>
              <th>S no</th>
              <th>Invoice Number</th>
              <th>Amount</th>
              <th>Payment mode</th>
              <th>Order Date</th>
              
          </tr>
      </thead>
      <tbody class='bg-light text-dark'>";
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
                $payment_id=$row_data['payment_id'];
                $order_id=$row_data['order_id'];
                $amount=$row_data['amount'];
                $invoice_number=$row_data['invoice_number'];
                $payment_mode=$row_data['payment_mode'];
                $date=$row_data['date'];
                $number++;?>
                <tr>
                <td><?php echo $number;?></td>
                <td><?php echo $invoice_number;?></td>
                <td><?php echo $amount;?></td>
                <td><?php echo $payment_mode;?></td>
                <td><?php echo $date;?></td>
                <!-- <td><a href='dbms.php?delete_payments=<?php echo $payment_id?>' 
            type='button' class=' text-dark' data-toggle='modal' data-target="#exampleModal">
             <i class='fa-solid fa-trash'></i></a></td> -->
               </tr> 
               <?php
            }
        }
        ?>
    
        </tbody>
    </table>

    