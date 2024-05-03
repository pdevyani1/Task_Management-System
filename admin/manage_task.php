<?php
    include('../includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <style>
    td button a{
      color:#fff;
    }
    td button a:hover{
      color:#fff;
    }
    tr th{
      padding:5px 0px;
    }
  </style>
<body>
  <center><h3>All assigned tasks</h3></center><br>
  <table class="table" style="background-color: #282828; color:#b3b3b3; width:100%; border-radius:6px;">
    <tr>
        <th>S.No</th>
        <th>Task Assigned</th>
        <th>Description</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
       <?php
          $sno = 1;
          $query = "select * from tasks";
          $query_run = mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($query_run)){
            ?>
        <tr>
            <td><?php echo $sno; ?></td>
            <?php
            $query1 = "select name from users where uid = $row[uid] ";
            $query_run1 = mysqli_query($connection,$query1);
            while($row1 = mysqli_fetch_assoc($query_run1)){
               ?>
               <td><?php echo $row1['name']; ?></td>
               <?php
            }
            ?>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['start_date']; ?></td>
            <td><?php echo $row['end_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><button class="btn btn-primary btn-sm"><a href="edit_task.php?id=<?php echo $row['tid']; ?>">Edit</a></button>&nbsp; | &nbsp; <button class="btn btn-danger btn-sm"><a href="delete_task.php?id=<?php echo $row['tid']; ?>">Delete</a></button> </td>
        </tr>
             <?php
             $sno = $sno + 1;
          }
       ?>
  </table>  
</body>
</html>