<!DOCTYPE html>
<html>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, 
        initial-scale=1, shrink-to-fit=no">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity=
"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
  
    <link rel="stylesheet" href=
"https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity=
"sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
         crossorigin="anonymous">
    
        <title>Online shopping system</title>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  background-image: url("Images/bg.jpg");
  background-size:cover;
}
.column {
  
  width: 50%;
  padding: 40px 10px;
}


.row {
float: center;
margin: 0 30px;}

.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
   
    margin-bottom: 20px;
  }
}
.table{
    background-color: #ffffff;
  
}
.a{
    color:#ffffff;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
   margin-top:70px;
  padding: 50px;
  text-align: center;
  background-color: #663399;
  color: #ffffff
}
</style>
        <?php 
            session_start();
            if(!isset($_SESSION['id']))
            {   header ('location:../admin.php');
                
            }
            $link = mysqli_connect("localhost","root","","mydb");
            $query = mysqli_query($link, "SELECT * FROM products ;");
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>



<div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="" alt="">
  
                    <div class="card-body">
  
                        <h3><a class="database" style="color:#f0f8ff">View or Modify Product details</a><br/></h3>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="" alt="">
  
                    <div class="card-body">
                          
                        <h3><a class="support" style="color:#f0f8ff">View Complaints</a></h3>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity=
"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous">
    </script>
  
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity=
"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous">
    </script>
  
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity=
"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous">
    </script>



        <div class="container" id="product" style="display:none">
            <div class="d-flex justify-content-center">
                
                <p class="text-info"><?php if(isset($_GET['comment'])) echo "no of rows affected = ".$_GET['comment'] ;?></p>
                
                <table class="table table-bordered text-center">
                    <thead class="bg-primary">
                   
                        <tr class="text-center">
                       
                            <td>S.No</td>
                            <td>Item Name</td>
                            <td>Price</td>
                            <td>Category</td>
                            <td>Image</td>
                            <td>Edit</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;  $id ="";
                        while($row=mysqli_fetch_array($query)){ ?>
                        <tr>
                            <td><?php echo $i ?></td> <?php $i = $i+1; ?>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo"<img src='".$row['image']."' class = 'img-responsive img-thumbnail'>" ;?></td>
                            <td><?php echo "<a href='edit.php?id=".$row['id']."'>Edit</a>"; ?></td>
                            <td><input type='checkbox' value='1' name='check' id="<?php echo $row['id'];?>"></td>
                           
                             <script type="text/javascript">
	$(document).ready(function(){
        $('#<?php echo $row['id'];?>').click(function(){
            if($(this).prop("checked") == true){
              <?php 
              $id = $id + $row['id'] + "," ;
             ?>
            }
                    else{
                        <?php $id = str_replace($row['id'],"",$id) ;
                               $id = str_replace(",,", ",", $id);
                              
                        ?>
                    }
                    });
});</script>
                        </tr>
                        <?php 
                            
                                }
                                if(isset($id))
                            {
                            $id = rtrim($id,",");
                            
                            echo "<a href='delete.php?id=".$id."'>Delete Selected Items</a>"  ;
                            }
                        ?>
                    </tbody>
                </table>
                <a href='add.php'>+ Add more rows</a>
            </div>
        </div>
        <div class="container" style="display:none;" id="support">
     <div class="d-flex justify-content-center">
                <table class="table table-bordered text-center">
                    <thead class="bg-primary">
                   
                        <tr class="text-center">
                    <tr><td>User name</td>
                    <td style="width:10%">User Email</td>
                    <td style="width:30%">Message</td>
                    <td >Subject</td>
                    <td style="width:20%">Date and Time</td></tr></thead>
                    <?php $res = mysqli_query($link, "SELECT * FROM support, users WHERE support.user_id=users.id");
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr><td>".$row['name']."</td>";
                         echo "<td>".$row['email']."</td>";
                          echo "<td>".$row['message']."</td>";
                           echo "<td>".$row['subject']."</td>";
                            echo "<td>".$row['time']."</td></tr>";
                    }
?>
                </table>
            </div>        
        </div>
        <script>
        $(".database").click(function(){
            $("#product").show();
            $("#support").hide();
        });
        $(".support").click(function(){
            $("#support").show();
            $("#product").hide();
        });
        </script>
    </body>
</html>