<!DOCTYPE html>
<html>
    <head>
    <style>
    body{
    background-image: url("admin/Images/banner.jpg");
    background-size: 100% 100%;
}
 div.jumbotron{
    background-image: url("admin/Images/shop.jpg");
    background-size: 100% 100%;
    color: white;
}

</style>
  
 <link rel="stylesheet" href="index.css">
         <?php
include 'include\common.php';
?>
        <title>Online shopping system</title>
    </head>
    <body>
        <?php include 'search_form.php';
              ?>
       <div class="container">
            <div class="jumbotron" style="text-align: center; margin-top:55px; ">
                <h1>Welcome to our Store !</h1>
                <h3> We have the best Watches, Clothes, Shoes and Headphones for you. No need to hunt around  We have all in one place.</h3>
            </div>
        </div>
      
    <!--menu highlights start-->
 <div class="container pt-3">
        <div class="row text-center ">
            <div class="col-6 col-md-3 py-3">
                <a href="watches.php#watches"> 
                <img src="admin/Image/watch.jpg" class="img-thumbnail " alt="" style="border-radius:0.5rem">
                    <div class="h3 pt-3 font-weight-bolder">
                      Watches
                   </div>
                 </a>
             </div>
            <div class="col-6 col-md-3 py-3" id="clothes"  >
                <a href="clothes.php#clothes"  >
                  <img src="admin/Image/clothing.jpg" class="img-thumbnail " alt="" style="border-radius:0.5rem" >
                     <div class="h3 pt-3 font-weight-bolder">
                        Clothes
                     </div>
                  </a>
             </div>
            <div class="col-6 col-md-3 py-3" id="shoes" >
                <a href="shoes.php#shoes">
                 <img src="admin/Image/shoe.jpg" class="img-thumbnail" alt="" style="border-radius:0.5rem">
                <div class="h3 pt-3 font-weight-bolder">
                    Shoes
                 </div>
             </a>
             </div>
            <div class="col-6 col-md-3 py-3" id="headphones" >
                <a href="headphones.php#headphones">
                 <img src="admin/Image/headphones.jpg" class="img-thumbnail" alt="" style="border-radius:0.5rem">
                 <div class="h3 pt-3 font-weight-bolder">
                    Headphones
                 </div>
              </div>
            </a>
        </div>
    </div>

    



</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function() {

if(window.location.href.indexOf('#login') != -1) {
  $('#login').modal('show');
}

});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
    
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>

                            
        
  
</html>