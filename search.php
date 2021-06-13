<!DOCTYPE html>
<html>
<?php

include 'search_form.php';
require_once 'include/common.php';
$search = $_GET['search'];
$query = "SELECT * FROM products WHERE name = '$search' OR  category ='$search'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
                                                                                
?>                                                                                
<head>
    <title>Online Shopping System</title>
     <link rel="stylesheet" href="style.css">
    <style>
    body{
    background-image: url("admin/Images/ban.jpg");  
    background-size: 85% 40%;
    }
    div.jumbotron{
    background-image: url("admin/Images/shop.jpg");
    background-size: 100% 100%;
    color: white;
}
.column {
  float: left;
  width: 100%;
  padding: 5px;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}

div.gallery {
  margin: 5px;
  float: left;
  width: 220px;
}

div.gallery img {
  width: 100%;
  height: 100%;
}

div.desc {
  padding: 5px;
  text-align: center;
}
h1{
font-size: 15px
}
    </style>
</head>
<body>
    
    <?php
    if(mysqli_num_rows($result)<1)
    { ?>
    <div class="panel panel-success col-md-6 col-md-offset-3" style="padding: 15% 0; text-align: center;"><h1 class="panel-heading">Sorry! didn't find anything.<br/> Try different keyword!</h1></div>
    <?php }
    while($row=mysqli_fetch_array($result)){?>
    <div class="col-md-2" style="margin-left:100px">
               <div class="gallery">
                  <div class="row">
                    <div class="column">
                    <div class="thumbnail">
                        <?php echo"<img src='admin/Images/".$row['image']."' class='img-thumbnail' >";                             ?>
                        <div class="desc">                     
                            <?php echo "<a href='product_detail.php?id=".$row['id']."'><h1>".$row['name']."</h1></a>"; ?>
                            <p>Price: <?php echo $row['price'] ;  ?> </p>
                        </div>
                        </div>
                      </div>
                   </div>
                    </div>
            </div>
    <?php } ?>
</body>
</html>