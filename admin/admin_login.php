<?php
   session_start();
   include('../includes/connection.php');
   if(isset($_POST['adminLogin'])){
    $query = "select email,password,name from admin where email = '$_POST[email]' AND password = '$_POST[password]'";
    $query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
        while($row = mysqli_fetch_assoc($query_run)){
          $_SESSION['email'] = $row['email'];
          $_SESSION['name'] = $row['name'];

        }
       echo "<script type='text/javascript'>
       window.location.href = 'admin_dashboard.php';
       </script>
       ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Please enter correct details!');
        window.location.href = 'admin_login.php';
        </script>
        "; 
    }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMS  |  Admin Login</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--External CSS file-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>                                      
   <div class="row">
    <div class="col-md-3 m-auto" id="login_home_page">
      <center><h3 style="margin-bottom: 45px;">Admin Login</h3></center>
      <form action="" method="post">
        <div class="form-group mb-4">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
        </div>
        <div class="form-group mb-4">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>
        <div class="form-group mb-4">
            <input type="submit" style="background-color: #a688fa;  border:none; color:#000" name="adminLogin" value="Login" class="btn btn-warning">
        </div>
      </form>
      <a href="../index.php" class="btn btn-danger" style="background-color:#ff3f80;">Go to home</a>
    </div>
   </div>
</body>
</html>