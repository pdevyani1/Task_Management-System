<?php
    session_start();
include('../includes/connection.php');
if(isset($_POST['create_task'])){
    $query = "insert into tasks values(null,$_POST[id],'$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Task Created Successfully');
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--External CSS file-->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!--jQuery code-->
    <script type="text/javascript">     
      $(document).ready(function(){   
        $("#create_task").click(function(){              
          $("#right_sidebar").load("create_task.php");
        });             
      });                                        
      $(document).ready(function(){   
        $("#manage_task").click(function(){              
          $("#right_sidebar").load("manage_task.php");
        });             
      });                
      $(document).ready(function(){   
        $("#view_leave").click(function(){              
          $("#right_sidebar").load("view_leave.php");
        });             
      });                    
    </script>                     
</head>
<body>
    <!--Header code starts here-->
    <div class="row" id="header">
        <div class="col-md-12">                        
            <div class="col-md-4" style="display: inline-block;">
              <h3>Task Management System</h3>
             </div>
            <div class="col-md-6" style="display: inline-block;text-align: right">
               <b>Email:</b> <?php echo $_SESSION['email']; ?>
               <span style="margin-left: 25px;"><b>Name:</b> <?php echo $_SESSION['name']; ?></span>
        </div>
       </div>
    </div>                        
    <!--Header code ends here-->
    <div class="row" id="hero">            
        <div class="col-md-2" id="left_sidebar" style="margin-top:50px: position: sticky; top: 0;">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        <a href="admin_dashboard.php" type="button" id="logout_link"><i class="ri-dashboard-3-line"></i>&nbsp;Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a type="button" class="link" id="create_task"><i class="ri-file-add-line"></i>&nbsp;Create Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a type="button" class="link" id="manage_task"><i class="ri-file-list-2-line"></i>&nbsp;Manage Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a type="button" class="link" id="view_leave"><i class="ri-survey-line"></i>&nbsp;Leave applications</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="../logout.php" type="button" id="logout_link"><i class="ri-shut-down-line"></i>&nbsp;Logout</a>
                    </td>
                </tr>
            </table>
            </div>

            <div class="col-md-10" id="right_sidebar" style="position:relative; left:100px;">
               <center style="margin-left:-200px;"><h4 >Instructions for Admin</h4>
                <ul style="line-height: 3em;font-size: 1.2em;list-style-type: none; color:#fff;" >
                    <li>1.All employees should mark their attendance daily.</li>
                    <li>2.Everyone must complete the task assigned to them.</li>
                    <li>3.Kindly maintain decorum of the office.</li>
                    <li>4.Keep the office area neat and clean.</li>
                </ul></center>

            </div>
        
    </div>
</body>
</html>