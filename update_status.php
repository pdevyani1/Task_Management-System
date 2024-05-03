<?php
    session_start();
     include('includes/connection.php');
     if(isset($_POST['update'])){
        $query = "update tasks set status = '$_POST[status]' where tid = $_GET[id]";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
        alert('Status Updated Successfully');
        window.location.href = 'user_dashboard.php';
        </script>  
        "; 
        }
        else{
            echo "<script type='text/javascript'>
        alert('Error! Please try again');
        window.location.href = 'user_dashboard.php';
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
    <title>Update</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!--External CSS file-->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!----===== Iconscout CSS ===== -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
<nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">CodingLab</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="user_dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="#" id="manage_task">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Update Task</span>
                </a></li>
                <li><a href="#" id="apply_leave">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Apply Leave</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Like</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Comment</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-user"></i>
                <span><b>Name:</b> <?php echo $_SESSION['name']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Email:</b> <?php echo $_SESSION['email']; ?></span>
                
                
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="lform">
                <div class="col-md-4 m-auto" style="color:white;"><br>
                <center><h2>Update the task</h2></center><br>
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
              <select class="form-control" name="status">
               <option>-Select-</option>
               <option>In-Progress</option>
               <option>Completed</option>
              </select>
             
            </div><br>
            <input type="submit" class="btn btn-success" name="update" value="Update" >
            </form>
            <?php
            }
            ?>
        </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>