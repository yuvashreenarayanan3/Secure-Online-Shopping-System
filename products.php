<!DOCTYPE html>
<html>
    <head>
         <?php
include 'include\common.php';
?>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Shopping System</title>
    <link rel="stylesheet" href="style.css">
<style>
body{
    background-image: url("admin/Images/ban.jpg");
    background-size: 85% 10%;
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
    <div class="container" style="margin-top:65px">
         <!--jumbutron start-->
        <div class="jumbotron text-center">
            <h1>Welcome!</h1>
            <p>We have wide range of products for you.No need to hunt around,we have all in one place</p>
        </div>
        <!--jumbutron ends-->
        <!--breadcrumb start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
                <li class="breadcrumb-item active" aria-current="page">Watches</li>
            </ol>
        </nav>
        <!--breadcrumb end-->
   
        <?php include 'search_form.php';?>
             <div class='container'>
            <?php                    
            require_once 'include/Check-if-added.php';  
            $query=mysqli_query($con, "SELECT * FROM products WHERE category='watches' ; ") ;
        
        while ($row = mysqli_fetch_array($query)) { ?>
        
        

            <div class="col-md-3">
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