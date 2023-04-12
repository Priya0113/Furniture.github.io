<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thread class="bg-light">
        <tr class="text-center">
       <th>S No</th>
       <th>Category Title</th>
       <th>Edit</th>
       <th>Delete</th>
     </tr>
    </thread>
    <tbody class="bg-light text-dark">
        <?php  
        $select_cat="Select * from categories";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['categoryID'];
            $category_title=$row['Name'];
            $number++;
        
        ?>
        <tr>
            <td><?php echo $number;?></td>
            <td><?php echo $category_title;?></td>
            <td><a href='dbms.php?edit_category=<?php echo $category_id?>' class='text-dark'>
            <i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='dbms.php?delete_category=<?php echo $category_id?>'  type='button'
             class=' text-dark' data-toggle='modal' data-target="#exampleModal">
            <i class='fa-solid fa-trash'></i></a></td>
       
           
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./dbms.php?view_categories"
        class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary"><a href='dbms.php?delete_category=<?php echo $category_id?>' 
            type='button' class=' text-light text-decoration-none'>Yes</a></button>
      </div>
    </div>
  </div>
</div>