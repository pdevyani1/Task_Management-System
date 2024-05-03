<?php
     include('../includes/connection.php');
     if(isset($_POST['edit_task'])){
        $query = "update tasks set uid = $_POST[id],description = '$_POST[description]',start_date = '$_POST[start_date]',end_date = '$_POST[end_date]' where tid = $_GET[id]";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
        alert('Task Updated Successfully');
        window.location.href = 'admin_dashboard.php';
        </script>  
        "; 
        }
        else{
            echo "<script type='text/javascript'>
        alert('Error! Please try again');
        window.location.href = 'admin_dashboard.php';
        </script>  
        "; 
        }
     }
?>
<!DOCTYPE html>
<html lang="en">
    <style>
        textarea{
    background-color:#282828; 
    color:#b3b3b3; 
    border: 1px solid #555;
}
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETMS</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--External CSS file-->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <!--Header code starts here-->
    <div class="row" id="header">
        <div class="col-md-12">
            <h3><i class="fa fa-solid fa-list" style="padding-right:15px;"></i>Task Management System</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 m-auto" style="color:white;"><br>
            <h3 style="color:#b3b3b3;">Edit the task</h3><br>
            <?php
            
            $query = "select * from tasks where tid = $_GET[id]";
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
              ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="" required>
                </div>
                <div class="form-group">
              <label class="mb-2">Select user:</label>
              <select class="form-control mb-4" name="id" style="background-color:#282828; border: 1px solid #555; color:#b3b3b3;" required>
                <option>-Select-</option>
                <?php
                
                $query1 = "select uid,name from users";
                $query_run1 = mysqli_query($connection,$query1);
                if(mysqli_num_rows($query_run1)){
                    while($row1 = mysqli_fetch_assoc($query_run1)){
                        ?>
                        <option value="<?php echo $row1['uid'];?>"><?php echo $row1['name']; ?>

                        </option>
                        <?php 
                    }
                }
                ?>
              </select>

            </div>
            <div class="form-group">
                <label class="mb-2">Description</label>
                <textarea class="form-control mb-4" style="background-color:#282828; border: 1px solid #555; color:#b3b3b3;" rows="3" cols="50" name="description" required><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form group">
                <label class="mb-2">Start date:</label>
                <input type="date" class="form-control mb-4" name="start_date" value="<?php echo $row['start_date']; ?>" required>
            </div>
            <div class="form group">
                <label class="mb-2">End date:</label>
                <input type="date" class="form-control mb-4" name="end_date" value="<?php echo $row['end_date']; ?>" required>
            </div>
            <input type="submit" class="btn btn-success" name="edit_task" value="Update" >
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>