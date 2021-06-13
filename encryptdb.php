<?php

define('AES_256_CBC', 'aes-256-cbc');
$encryption_key = openssl_random_pseudo_bytes(32);
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(AES_256_CBC));
$data1 = $_POST["name_of_card_holder"];
$data2 = $_POST["card_number"];
$data3 = $_POST["cvv"];
$data4 = $_POST["expiry_month"];
$data5 = $_POST["expiry_year"];
$encrypted1 = openssl_encrypt($data1, AES_256_CBC, $encryption_key, 0, $iv);
$encrypted1 = $encrypted1 . ':' . base64_encode($iv);
$parts = explode(':', $encrypted1);
$encrypted2 = openssl_encrypt($data2, AES_256_CBC, $encryption_key, 0, $iv);
$encrypted2 = $encrypted2 . ':' . base64_encode($iv);
$parts = explode(':', $encrypted2);
$encrypted3 = openssl_encrypt($data3, AES_256_CBC, $encryption_key, 0, $iv);
$encrypted3 = $encrypted3 . ':' . base64_encode($iv);
$parts = explode(':', $encrypted3);
$encrypted4 = openssl_encrypt($data4, AES_256_CBC, $encryption_key, 0, $iv);
$encrypted4 = $encrypted4 . ':' . base64_encode($iv);
$parts = explode(':', $encrypted4);
$encrypted5 = openssl_encrypt($data5, AES_256_CBC, $encryption_key, 0, $iv);
$encrypted5 = $encrypted5 . ':' . base64_encode($iv);
$parts = explode(':', $encrypted5);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO card_details (name_of_card_holder, card_number, cvv,expiry_month,expiry_year)
VALUES ('.$encrypted1.','.$encrypted2','.$encrypted3.','.$encrypted4.','.$encrypted5.')" ;
if ($conn->query($sql) === TRUE) 
    {
         header("Location: success.php");
         exit();
} 
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
