<!DOCTYPE html>
<html>
    <head>
        <title>Online Shopping System</title>
    <?php 
        include 'search_form.php';
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con,"SELECT * FROM users_items, products WHERE user_id = '$user_id' AND status = 'confirmed' AND users_items.product_id = products.id;");
    ?>
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
                <?php include 'sidebar.php'; ?>
                <div class="col-sm-9">
                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                    
                        <div class="col-md-7 col-sm-9">   
                                <?php echo "<a href='product_detail.php?id=".$row['id']."'><h3>".$row['name']."</h3></a>"; ?>
                                <p>Price: <?php echo $row['price'] ;?> </p>
                                <p>Date and Time of purchase: <?php echo $row['time'];?></p>
                            </div>
                     <?php } ?>    
                </div>
            </div>
        </div>
    </body>
</html>
       