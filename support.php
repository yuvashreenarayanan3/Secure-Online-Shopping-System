<!DOCTYPE html>
<html>
    <head>
        <?php 
        include 'search_form.php';
        if(!isset($_SESSION['email']))
        header("location:index.php");?>
        <title>Online Shopping System</title>
       <link href="profile.css" rel="stylesheet">
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
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include 'sidebar.php';?>
    
                <div class="col-sm-9 ">
                    <div class="container-fluid">
                        <form action="support_script.php" method="POST">
                            <h1>Customer Support</h1>
                            <p style="float:right"><a href="support_current.php">View current query</a></p>
                            <p style="float:right"><a href="support_old.php">  View Old query/</a></p>
                            <h5 class="text-warning">Post your queries here we will address them as soon as possible</h5>
                            
                            
                            <div class="form-group">
                                Subject:<div  class="text-danger"><?php if(isset($_GET['error'])) echo htmlspecialchars($_GET['error']) ;?></div>
                                <input type="text" class="form-control" name="sub" rows="1" cols="74">
                            </div>
                            <div class="form-group">
                                Message:<div class="text-danger"><?php if(isset($_GET['error2'])) echo htmlspecialchars($_GET['error2']) ;?></div>
                                <textarea name="message" rows="3" cols="100"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </body>
</html>
