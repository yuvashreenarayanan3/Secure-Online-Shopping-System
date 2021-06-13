
<!DOCTYPE html>
<html>
    <?php require 'search_form.php'; ;
    if(!isset($_SESSION['email']))
        header('location:login.php');
    if(!empty($_GET['id'])){
        $user_id = $_SESSION['user_id'];
       
        $item_id = $_GET['id'];
        $result = mysqli_query($con,"SELECT * FROM users_items WHERE user_id='".$_SESSION['user_id']."' AND product_id='".$item_id."';");
        if(mysqli_num_rows($result)>0)
        {
            $row = mysqli_fetch_array($result);
            $row['quantity']=$row['quantity']+1;
            mysqli_query($con,"UPDATE users_items SET quantity ='".$row['quantity']."' WHERE user_id='$user_id' AND product_id='$item_id'") or die(mysqli_error($con));
        }
        else{
        mysqli_query($con,"INSERT INTO users_items (user_id, product_id, quantity) VALUES('$user_id','$item_id','1') ;") or die(mysqli_error($con));}
    }
        ?>
    <head>
        <title>Online Shopping System</title>
         
    </head>
    <body>
        <?php 
        error_reporting(0);
        $i=1;
        $sum=0;
        $user_id = $_SESSION['user_id'];
        $query=mysqli_query($con,"SELECT * FROM users_items, products WHERE users_items.product_id=products.id AND users_items.user_id='$user_id' AND status = 'added to cart'; ") or die(mysqli_error($con));
        if(mysqli_num_rows($query)==0)
        {?>
        <div class="container-fluid">
            <div class="col-sm-offset-2 col-sm-8 verticalCenter">
                <div class="jumbotron ">
                    <center>
                        <h3>CART EMPTY!</h3>
                        <p>Start shopping now! Amazing offers and deals are waiting for you.</p>
                        <a href="index.php"><button class="btn btn-danger">SHOP NOW</button></a>
                        <p class="text-info">Go back to <a href="profile.php">profile</a></p>
                    </center>
                   
                </div>
            </div>
        </div>
        <?php }
        else{ ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Cart</li>
            </ol>
        </nav>
        </hr>
     <div class="center">
     <div class="d-flex justify-content-center">
            <div class="col-md-7  my-5 table-responsive p-5">
                <table class="table table-striped table-bordered table-hover text-center">
                    <thead class="bg-primary">
                   
                        <tr class="text-center">
                        
                            <td style="width:10%">   S.No   </td>
                            <td style="width:50%">   Item Name   </td>
                            <td style="width:30%">   Price   </td>
                            <td style="width:20%">   Quantity   </td>
                            <td style="width:20%">  </td>
                            
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php while($row=mysqli_fetch_array($query)){ ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                           <?php echo "<td><a href='cart-remove.php?id=".$row['product_id']."' class='remove-item-link'>Remove</a></td>" ; ?>
                        </tr>
                        <?php
                        $sum=$sum+$row['price']*$row['quantity'];
                        $i=$i+1;
                        $id=$row['id']+",";
                        $id = rtrim($id,",");
                        } 
                        $_SESSION['item_id']=$id;
                        echo"<tr>
                            <td></td>
                            <td>Total Amount</td>
                            <td> $sum </td>
                            <td>
                            <form action='creditcard.html' method='post'>
<input value='BUY NOW' type='submit' class='btn btn-primary'>
    </form> </td>
                        </tr> ";
                        
                            if(isset($_GET['error']))
                                echo htmlspecialchars($_GET['error']); ?>
                    </tbody>
                    <?php 
                        
                       $_COOKIE["id"]=$id;
                       echo "cookie with value ".$_COOKIE["id"];
                    ?>
                </table>
            </div>
          
        </div> 
        </div>
         <?php              
        }
        ?>
          
    </body>
</html>