<!DOCTYPE html>
<html>
    <head>
    <style>
body{
    background-image: url("admin/Images/my.jpg");
    background-size: cover;
}
img {
    max-width:auto;
    height:auto;
}
</style>
        <title>Online Shopping System</title>
    </head>
    <body>
        <?php 
        error_reporting(E_ALL);
        include 'search_form.php';
        $item_id = $_GET['id'];
        
        $query = "SELECT * FROM products WHERE id='$item_id';";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $row = mysqli_fetch_array($result);
        
        ?>
       <div class="container" style="margin-left:220px">
            <div class="col-sm-6">
                <div class="row">
                    <div ><?php echo"<img src='admin/Images/".$row['image']."' class='img-thumbnail' >"; ?> </div>
                    </br>
                        <div class="col-sm-4"><?php echo "<a href='cart.php?id=".$row['id']."'><input type='submit' value='Add to cart' class='btn btn-primary btn-block'/></a>"; ?></div>

    <form action="creditcard.html" method="post">
<div class="col-sm-4"><input value="BUY NOW" type="submit" class="btn btn-primary btn-block" onclick="<?php $_SESSION['item_id']=$_GET['id'];?>"></div>

</form>   
            </div>
            </div>
            <div class="col-sm-offset-2 col-sm-4">
                <div class="row">
                    <div class="well text-center"><h3><b>Product Description</b></h3></div>
                    <div class="text-center">
                    <?php  echo "<h3><b>Category : ".$row['category']."</b></h3>";
                           echo "<h3>Product Name : ".$row['name']."</h3>";
                           echo "<h3>Price : ".$row['price']." </h3>";
                    ?>
                    </div>
                   
                  
                </div>
            </div>
        </div>
    </body>
</html>