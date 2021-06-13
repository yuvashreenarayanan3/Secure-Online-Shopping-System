<?php

require_once 'include/common.php';
 if(!isset($_SESSION['email']))
        header("location:index.php");
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM `support` WHERE user_id ='$user_id' ORDER BY time DESC" or die(mysqli_error($con));
$result1 = mysqli_query($con, $query);
$row1 = mysqli_fetch_array($result1) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html>
    <head>
     <style>
    body{
     background-image: url("admin/Images/profile.jpg");
    background-size: cover;
    }
     div.sidebar {
  height: 100%;
  width: 360px;
  position: fixed;
  z-index: 1;
  top: 10px;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 50px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #fffff;
}

.main {
  margin-left: 160px; 
  font-size: 28px; 
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
    </style>
        <title>Online Shopping System</title>
    <?php 
        include 'search_form.php';
        
    ?>
        <link href="profile.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include 'sidebar.php';?>
    
                <div class="col-sm-9 ">
                    <div class="container-fluid">
                        <div class="col-sm-offset-1 col-sm-10">
                            <div class="well">
                                <?php if(mysqli_num_rows($result1)<1)
                                    echo "<h4 class='text-alert'>No complaints found</h4>";
                            else{
                            echo '<p>subject: '.$row1['subject'].'</p>';
                            echo '<p>message: '.$row1['message'].'</p>';
                            echo '<p>date and time: '.$row1['time'].'</p>';}
                            
                        ?>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </body>
</html>

