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
  background-color: black;
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
    include 'include/common.php';
    if(!isset($_SESSION['email']))
        header("location:./index.php?error=session not set");
    
        include 'search_form.php';
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con,"SELECT * FROM USERS WHERE id = '$user_id';");
        $row = mysqli_fetch_array($query);
    ?>
        <link href="profile.css" rel="stylesheet">
        
    </head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'sidebar.php';?>
    
                <div class="col-sm-9 " >
                    <div class="content" style="background: none">
                        <div class="info"><span class="header">Personal Information</span>
                            <span onclick="myfunction(this,'a')" class="edit">Edit</span>
                        </div>
                         
                    <form action="baiscDetail.php" method="post" enctype="multipart/form-data" >
                        
                        <?php echo "<input type='text' class='inputStyle increaseWidth' placeholder=".$row['name'].">" ?>
                        <input type='submit'  class="btn btn-primary" value='Save' style="opacity: 0" id="a"><br>
                    </form>
                    
                    
                        <div class="info"><span class="header">Email Address</span><span onclick="myfunction(this,'c')" class="edit">Edit</span></div>
                    <form action="basicDetail.php" method="post">
                        <?php echo "<input type='email' class='inputStyle increaseWidth' placeholder=".$row['email'].">" ?>
                        <input type='submit' value='Save' class="btn btn-primary" id="c" style="opacity: 0"><br>
                    </form>
                    
                        <div class="info"><span class="header">Mobile Number</span><span onclick="myfunction(this,'d')" class="edit">Edit</span></div>
                    <form action="basicDetail.php" method="post" >
                        <?php echo "<input type='tel' class='inputStyle increaseWidth' placeholder=".$row['contact'].">" ?>
                        <input type='submit' id='d' value='Save' class="btn btn-primary" style="opacity: 0">
                    </form>
                        
                        <div class="info"><span class="header">Password</span><span onclick="myfunction(this,'e')" class="edit">Edit</span></div>
                    <form action="basicDetail.php" method="post" id='e' style="opacity: 0">
                        <input type="password" class="form-group" placeholder="Old password" name="Old_password">
                        <div><?php if(isset($_GET['error'])){ echo htmlspecialchars($_GET['error']); }?></div>
                        <input type="password" class="form-group" placeholder="New Password" name="New_Password">
                        <input type="password" class="form-group" placeholder="Re-type new password" name="Re_type_new_password">
                        <div><?php if(isset($_GET['error2'])){ echo htmlspecialchars($_GET['error2']); }?></div>
                        <input type="submit" value="Save" class="btn btn-primary" >
                    </form>
                    </div>
                   
                  <script>
                      
                     
                      function myfunction(id,id2){
                           edit = document.querySelector("#"+id2);
                          
                          if(edit.style.opacity === '0'){
                            edit.style.opacity = "1";  
                            
                            id.innerHTML = "Cancel";  
                             
                             edit.disabled = false;
                          }
                          else{
                              edit.style.opacity = "0";
                              id.innerHTML = "Edit";
                             
                              edit.disabled = true;
                          }
                      };
                  </script>      
                                    
                </div>
            </div>
        </div>
</body>
</html>

