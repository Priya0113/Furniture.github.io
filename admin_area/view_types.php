<h3 class="text-center text-success">All Types</h3>
<table class="table table-bordered mt-5">
    <thread class="bg-light">
        <tr class="text-center">
       <th>S No</th>
       <th>Type Name</th>
       <th>Edit</th>
       <th>Delete</th>
     </tr>
    </thread>
    <tbody class="bg-light text-dark">
        <?php  
        $select_cat="Select * from type";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $type_id=$row['type_id'];
            $type_name=$row['type_name'];
            $number++;
        
        ?>
        <tr>
            <td><?php echo $number;?></td>
            <td><?php echo $type_name;?></td>
            <td><a href='dbms.php?edit_type=<?php echo $type_id?>' class='text-dark'>
            <i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='dbms.php?delete_type=<?php echo $type_id?>' 
            type='button' class=' text-dark' data-toggle='modal' data-target="#exampleModal">
             <i class='fa-solid fa-trash'></i></a></td>
       
           
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./dbms.php?view_types"
        class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary"><a href='dbms.php?delete_type=<?php echo $type_id?>' 
            type='button' class=' text-light text-decoration-none'>Yes</a></button>
      </div>
    </div>
  </div>
</div>