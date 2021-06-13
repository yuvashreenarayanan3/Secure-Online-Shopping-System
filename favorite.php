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
  background-color: #black;
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
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con,"SELECT * FROM favorite, products WHERE user_id = '$user_id' AND favorite.user_id = products.id;");
    ?>
        <link href="profile.css" rel="stylesheet">
        
        
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include 'sidebar.php'; ?>
                <div class="col-sm-9">
                    
                    <?php 
                         if(mysqli_fetch_array($query)>0) {                   
                    while ($row = mysqli_fetch_array($query)) { ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <?php print"<img src=\"{$row['image']}\" />"; ?>
                            <div class="caption">   
                                <?php echo "<a href='product_detail.php?id=".$row['id']."'><h1>".$row['name']."</h1></a>"; ?>
                                <p>Price: <?php echo $row['price'] ;?> </p>
                                
                            </div>
                        </div>
                    </div> <?php }
                         } else{
                             echo "
                             <div class='panel panel-warning col-md-8 col-md-offset-2' style='padding: 15% 0; text-align: center; background:none'><p class='panel-heading h3'>Your favorite list is empty! You can start marking products as favorite just by clicking <span class='glyphicon glyphicon-heart-empty'></span><br/><a href='index.php' class='text-success h5'>Click here to continue shopping</a></div>
                             ";
                         }
?>  
                    
                    </div>
                   
            </div>
        </div>
    </body>
</html>
       