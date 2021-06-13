
<?php
require 'include/common.php';
 $email= mysqli_real_escape_string($con, $_POST['email']);
 $password= md5($_POST['password']);

 $query="SELECT * FROM users WHERE email='$email' AND password='$password';" ;
 $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
 if(mysqli_num_rows($query_result)==0)
 {
    header('location:login.php?error=Incorrect email or password');
 }
 else {
    $row=mysqli_fetch_array($query_result);
    $_SESSION['email']= $row['email'];
    $_SESSION['user_id']=$row['id'];
    $_SESSION['name'] = $row['name'];
    header('location:profile.php');
}
/*
$mysqli = new mysqli("localhost", "root", "", "mydb");
if($mysqli->connect_error) {
  exit('Error connecting to database'); 
}
$stmt = $mysqli->prepare("SELECT * FROM users WHERE email=? AND password=?;");
$stmt->bind_param("ss",$_POST['email'],$_POST['password']);
$stmt->execute();
$stmt -> store_result();
if($stmt->num_rows == 0)
{
   $row=mysqli_fetch_array($query_result);
    $_SESSION['email']= $row['email'];
    $_SESSION['user_id']=$row['id'];
    $_SESSION['name'] = $row['name'];
    header('location:profile.php');
}
else 
{
    header('location:login.php?error=Incorrect email or password');
}
*/

?>