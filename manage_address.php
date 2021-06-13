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
    require 'search_form.php';
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con,"SELECT * FROM USERS WHERE id = '$user_id';");
        $row = mysqli_fetch_array($query);
    ?>
                        <script>
                            $(document).ready(function(){
                                $("#add").click(function(){
                                    $(".address").show()
                                })
                                $(".cancel").click(function(){
                                    $(".address").hide()
                                })
                            });
                        </script>
        <link href="profile.css" rel="stylesheet">
        
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include 'sidebar.php'; ?>
                <div class="col-sm-9" >
                    <div class="content" style="background:none">
                        <div class="info">
                            <span class="header">Manage Address</span>
                        </div>
                        <div class="box">
                            <div class="edit" id="add">+   ADD A NEW ADDRESS</div>
                        </div>
                        <div class="address" style="background:none; display:none" >
                            <span class="edit">ADD A NEW ADDRESS</span>          <span class="edit cancel" style="float:right">cancel</span>
                            <form class="forms" method="post" action="manage_script.php">
                                <div class="flex">
                                    <div class="inputs">
                                        Name<input type="text" required="" name="name" class="focus increaseWidth inputStyle " />
                                        
                                    </div>
                                    <div class="inputs">
                                        Mobile Number<input type="tel" required="" name="Mobile_No" class="focus increaseWidth inputStyle " />
                                      
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="inputs">
                                        Pincode<input type="text" required="" name="pincode" class="focus increaseWidth inputStyle " />
                                        
                                    </div>
                                    <div class="inputs">
                                        Locality<input type="text" required="" name="locality" class="focus increaseWidth inputStyle " />
                                        
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="inputs">
                                        Address<textarea name="area" class="inputStyle" required="" rows="3" cols="74"></textarea>
                                        
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="inputs">
                                        City<input type="text" required="" name="city" class="focus increaseWidth inputStyle " />
                                        
                                    </div>
                                    <div class="inputs">
                                        State<input type="text" required="" name="state" class="focus increaseWidth inputStyle " />
                                        
                                    </div>
                                </div>
                                <input type="submit" value="Add address" class="btn btn-primary">
                            </form>
                        </div>
                        <?php 
                                $result = mysqli_query($con,"SELECT * FROM address, users WHERE users.id = address.user_id AND users.id = '$user_id';");
                                $row1 = mysqli_fetch_array($result);
                                if(mysqli_num_rows($result)){?>
                                <div class="box">
                                <?php echo "<h4>".$row1['name']."   ".$row1['mobile']."</h4></br><p>".$row1['address']." ".$row1['city']." ".$row1['state']." ".$row1['pincode']."</p>";
                                }?></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
