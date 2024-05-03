<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body>
    <h3>Create a new task</h3>
    <div class="row">
        <div class="col-md-6">
        <form action="" method="post">
            <div class="form-group">
              <label class="mb-2">Select user:</label>
              <select class="form-control mb-4" style="background-color:#282828; border: 1px solid #555; color:#b3b3b3;" name="id">
                <option>-Select-</option>
                <?php
                include('../includes/connection.php');
                $query = "select uid,name from users";
                $query_run = mysqli_query($connection,$query);
                if(mysqli_num_rows($query_run)){
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <option value="<?php echo $row['uid'];?>"><?php echo $row['name']; ?>

                        </option>
                        <?php 
                    }
                }
                ?>
              </select>
            </div>
            <div class="form group">
                <label class="mb-2">Description:</label>
                <textarea class="form-control mb-4" style="background-color:#282828; border: 1px solid #555; color:#b3b3b3;" rows="5" cols="50" name="description" placeholder="Mention the task"></textarea>
            </div>
            <div class="form group">
                <label class="mb-2">Start date:</label>
                <input type="date" class="form-control mb-4" name="start_date">
            </div>
            <div class="form group">
                <label class="mb-2">End date:</label>
                <input type="date" class="form-control mb-4" name="end_date">
            </div>
            <input type="submit" class="btn btn-success" name="create_task" value="Create">
        </form>
        </div>
    </div>
</body>
</html>